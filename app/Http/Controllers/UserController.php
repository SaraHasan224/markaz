<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use App\TraitsFolder\CommonTrait;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Events\UserWasCreated;
use Illuminate\Support\Str;
use App\Data\Repositories\UserRepository;
use Validator,Illuminate\Validation\Rule, Session,Image, Storage, Carbon\Carbon;

class UserController extends Controller
{

    use SendsPasswordResetEmails;
    use CommonTrait;
    public function __construct(UserRepository $user) {
        $this->_repository = $user;
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
           $repsonse = $this->_repository->registerUser($input);
            if($repsonse){
                $code = 200;
                $output = ['code' => $code,'user'=>$repsonse];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while Registration.']]];
            }
            
         }
        return response()->json($output, $code);
        
       
      
       
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
        if($user){
                $code = 200;
                $output = ['code' => $code,'user'=>$user];
                //event(new UserWasCreated($user->id));
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['Invalid email or password']]];
            }
          
        }

        return response()->json($output, $code);


    }
    public function getProfile(){
        $user = JWTAuth::parseToken()->ToUser();
        return response()->json(['user'=>$user]);
    }


    /* Sara's work starts here */

    /* SignIn, SignUp and logout for web panel starts here  */
    public function login(Request $request){
        $request->session()->forget('user_id');
            return view('user.signin');
    } 
    public function loggedIn(Request $request){
            return view('index');
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
                $output = ['code' => $code,'user'=>$user];
                event(new UserWasCreated($user->id));
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['Incorrect username or password. Please try again.']]];
            }   
        }
        return response()->json($output, $code);
    }
    public function signUpWeb(Request $request){
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
           $repsonse = $this->_repository->registerUser($input);
            if($repsonse){
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
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->forget('user_id');
        $request->session()->regenerate();
        return redirect('/');
    }
    public function forgotpwd(Request $request){
        $input = $request->only('email');
        $rules = [
            'email' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $us = User::whereEmail($request->email)->count();
            if ($us == 0)
            {
                $code = 400;
                $repsonse = "We can't find a user with this email-address";
                // $output = ['code' => $code,'user'=>$repsonse];
                $output = ['error'=>['code' => $code,'message' => ['We can\'t find a user with this email-address']]];
            }else{
                $user1 = User::whereEmail($request->email)->first();
                $route = 'password.reset';
                $code = 200;
                $repsonse = "Password Reset Link Send Your E-mail";
                $output = ['success'=>['code' => $code,'message' => ['Password Reset Link Send Your E-mail']]];
            }               
        }
        return response()->json($output, $code);
        
    }

    /* SignIn, SignUp and logout for web panel ends here  */

    /* Web Panel User CRUD */
    public function createUsers(Request $request)
    {
        $data['title'] = "User";
        $data['table_id'] = "create_user";
        $data['sub_title'] = "Create User";
        $data['user'] = '';
        return view('users.create-users',$data);
    }
    public function viewUsers(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('id');
            $rules = [
                'id' => 'required',
               ];
            $validator = Validator::make($input, $rules);

            $findUser = User::whereId($request->id)->first();
            $code = 200;
            $user = [];
            $user['id'] = $findUser->id;
            $user['email'] = $findUser->email;
            $user['name'] = $findUser->name;
            $user['phone_number'] = $findUser->phone_number;
            $user['profile_pic'] = $findUser->profile_pic;
            $output = ['success'=>['code' => $code,'message' => $user]];
            return response()->json($output, $code);
        }
    }
    public function editUsers(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('email','name','phone_number','id');
            $rules = [
                'id' => 'required',
                'email' => 'required',
                'name' => 'required',
                'phone_number' => 'required|number',
               ];
            $validator = Validator::make($input, $rules);

            User::where('id',$request->id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
            ]);
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => 'User Updated Successfully.']];
            return response()->json($output, $code);
        }
    } 
    public function deleteUsers(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('id');
            $rules = [
                'id' => 'required',
               ];
            $validator = Validator::make($input, $rules);

            User::where('id',$request->id)->delete();
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => 'User Deleted Successfully.']];
            return response()->json($output, $code);
        } 
    }




    /* Users funtion starts here  */ 
    public function getusers(){
        $data['title'] = "View All Users";
        return view('users.view-all',$data);
    }

    /* Support funtion starts here  */  
    public function support(Request $request){
        if($request->isMethod("post"))
        {
            $input = $request->all();
            $rules = [
                'response' => 'required',
                'id' => 'required',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->messages()->all()]);
            }else{
                Support::where('id',$request->id)->update([
                    "status" => 1,
                    "response" => $request->response
                ]);
                $support = Support::where('id',$request->id)->first();
                Mail::to($support->email)->send(new SupportEmail($support->response)); 
                return response()->json(['success'=>'Response submitted.']);
            }
        }
        $data['title'] = "Customer Support";
        return view('home.support',$data); 
    }
    /* Support funtion ends here  */ 

    /* Follower funtion starts here  */  
    public function getfollowers($id = null){
        $data['title'] = "Followers";
        $data['id'] = $id;
        $data['table_id'] = 'followed_stores';
        return view('home.followers',$data);
    }
    public function getunfollowers($id = null){
        $data['title'] = "Unfollowers";
        $data['id'] = $id;
        $data['table_id'] = 'blocked_stores';
        return view('home.followers',$data);
    }
    /* Follower funtion ends here  */ 
    /* Sara's work ends here */
}
