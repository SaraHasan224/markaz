<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB,
    App\EventLog,
    App\User;
use App\TraitsFolder\CommonTrait;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Events\UserWasCreated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use App\Data\Repositories\UserRepository;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator,Illuminate\Validation\Rule, Session,Image, Storage, Carbon\Carbon;
class LoginController extends Controller
{
    
    use SendsPasswordResetEmails;
    use CommonTrait;
    public function __construct(UserRepository $user) { 
        $this->_repository = $user;
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
    }
    public function signIn(Request $request){
        $input = $request->only('email', 'password','language','login_time', 'udid');
        $rules = [
            'email' => 'required|exists:users,email',
            'password' => 'required',
           ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['error' => [ 'code' => $code, 'messages' => $validator->messages()->all() ] ];
        }else{
            $user = $this->_repository->login($input);
            if($user)
            {
                if($user->role_id == 4){
                    $code = 200;
                    $output = ['code' => $code,'user'=>$user];
                    //event(new UserWasCreated($user->id));
                }else{
                    $code = 400;
                    $output = ['error'=>['code' => $code,'message' => ['Invalid role']]];
                }
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['Invalid email or password']]];
            }
        }
        return response()->json($output, $code);
    }

    public function login(Request $request){

        
        $request->session()->forget('user_id');
        $request->session()->forget('role_name');
        $request->session()->forget('store_id');
            return view('user.signin');
    } 
    
    public function loggedIn(Request $request){
        
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $role = DB::table('roles')->whereId($getuser->role_id)->first();
        $data['logged_user'] = $getuser;
        $user_role = $role->name;
        $data['logged_user_role'] = $user_role;
        $request->session()->put('role_name', $user_role);
        $request->session()->put('store_id', $getuser->store_id);

        if(empty($getuser)) 
            return view('user.signin');
        else
            return view('index',$data);
    } 
    
    public function dashboard(Request $request,$user_id = ''){
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['role'] = session()->get('role_name');
        return view('index',$data);
    } 
    
    public function signInWeb(Request $request){
        $input = $request->only('email', 'password','language','login_time', 'udid');
        $rules = [
            'email' => 'required|exists:users,email',
            'password' => 'required',
           ];
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $code = 406;
            $output = ['error' => [ 'code' => $code, 'messages' => $validator->messages()->all() ] ];
        }else{
            $user = $this->_repository->loginWeb($input);

        if($user){
                $code = 200;
                $request->session()->put('user_id', $user->id);
                $request->session()->save();
                EventLog::create([
                    'component' => 'Users',
                    'component_name' => $user->name,
                    'component_image' => $user->profile_pic,
                    'operation' => 'Logged In',
                    'user_id'   =>$user->id,
                ]);
                $output = ['code' => $code,'user'=>$user];
                event(new UserWasCreated($user->id));
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['Incorrect username or password. Please try again.']]];
            }   
        }
        return response()->json($output, $code);
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->forget('user_id');
        $request->session()->forget('store_id');
        $request->session()->forget('role_name');
        $request->session()->regenerate();
        return redirect('/');
    }
}
