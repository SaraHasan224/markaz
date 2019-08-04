<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB,
    App\Store,
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

use Authenticatable, Authorizable, CanResetPassword, HasRoles;

class RegisterController extends Controller
{

    use SendsPasswordResetEmails;
    use CommonTrait;
    public function __construct(UserRepository $user) { 
        $this->_repository = $user;
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
    }

    public function signUp(Request $request){
        $input = $request->only('email', 'password','name', 'phone_number');
        $rules = [
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'name' => 'required',
            'phone_number'=>'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $input['access_token'] = Str::random(60);
            $input['role_id'] = 4;
           $repsonse = $this->_repository->registerUser($input);
            if($repsonse){
                EventLog::create([
                    'component' => 'User : '.$repsonse->name,
//                    'component_name' => ,
                    'component_image' => $repsonse->profile_pic,
                    'operation' => 'registered',
                    'user_id'   =>$repsonse->id,
                ]);
                $code = 200;
                $output = ['code' => $code,'user'=>$repsonse];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while Registration.']]];
            }
         }
        return response()->json($output, $code);
    }

    public function signUpWeb(Request $request){
        $input = $request->only('email', 'password','name', 'phone_number','position','organization');
        $rules = [
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'name' => 'required',
            'phone_number'=>'required',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $input['access_token'] = Str::random(60);
            $input['role_id'] = 2;
            $repsonse = $this->_repository->registerStore($input);
            if($repsonse){
                EventLog::create([
                    'component' => 'User : '.$repsonse->name,
//                    'component_name' => ,
                    'component_image' => $repsonse->profile_pic,
                    'operation' => 'registered',
                    'user_id'   =>$repsonse->id,
                ]);
                //Assign role to user
                $user = User::find($repsonse->id); 
                if($repsonse->role_id == 1)
                {
                    $permission = Permission::get();
                    $role = Role::where('id',1)->first();
                    foreach($permission as $permit)
                    {
                        $user->givePermissionTo($permit->name);
                    }
                    // $user->assignRole('Admin');
                }
                else if($repsonse->role_id == 2)
                {
                    $permission = Permission::whereNotIn('id',[4,9,14,19,24,29,34])->get();
                    $role = Role::where('id',2)->first();
                    foreach($permission as $permit)
                    { 
                        $user->givePermissionTo($permit->name);
                    }
                    // $user->assignRole($role);
                    
                }

                
                $code = 200;
                $request->session()->put('user_id', $repsonse->id);
                $request->session()->save();
                $output = ['code' => $code,'user'=>$repsonse];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while Registration.']]];
            }
            
         }
        return response()->json($output, $code);
    }
}
