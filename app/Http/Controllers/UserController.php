<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB,
    App\Follower,
    App\User,
    App\Store,
    App\Support,
    App\StoreSocialMedia,
    App\Promotion,
    App\PromotionComment,
    App\PromotionMedia;
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

class UserController extends Controller
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
        if($user->role_id == 4){
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
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        if(empty($getuser)) 
            return view('user.signin');
        else
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
        $input = $request->only('email', 'password','name', 'phone_number','position');
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
            $input['role_id'] = 2;
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

    //      Manage User CRUD Starts Here    //
    public function getusers(){
        $data['title'] = "Manage Users";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->with('permissions')->with('roles')->first();
        $data['role'] = $getuser->roles[0]->name;
        $data['logged_user'] = $getuser;
        return view('users.view-all',$data);
    }
    public function createUsers(Request $request)
    {
        $data['title'] = "User";
        $data['table_id'] = "create_user";
        $data['sub_title'] = "Create User";
        $data['user'] = '';
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('users.create-users',$data);
    }
    public function addUsers(Request $request){
        $input = $request->only('email', 'password','name', 'phone_number','profile_pic');
        $rules = [
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'profile_pic' => 'mimes:jpeg,png,jpg',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $input['access_token'] = Str::random(60);
            $input['role_id'] = 3;
            
            if($request->hasFile('profile_pic'))
            {
                $img_tmp = Input::file('profile_pic');
                if($img_tmp->isValid())
                {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $user_image = rand(111,99999).".".$extension;
                    $image_path = public_path('/images/user').'/'.$user_image;
                    Image::make($img_tmp)->save($image_path);          
                }         
                $input['profile_pic'] = $user_image;
            }
            $repsonse = $this->_repository->addUserProfile($input);
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
    public function viewUsers(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('id');
            $findUser = User::whereId($request->id)->first();
            $code = 200;
            $user = [];
            $user['id'] = $findUser->id;
            $user['email'] = $findUser->email;
            $user['name'] = $findUser->name;
            $user['phone_number'] = $findUser->phone_number;
            $user['position'] = $findUser->position;
            $user['profile_pic'] = $findUser->profile_pic;
            $user['user_image'] = asset('/images/user').'/'.$findUser->profile_pic;
            $output = ['success'=>['code' => $code,'message' => $user]];
            return response()->json($output, $code);
        }
    }
    public function editUsers(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('email','name','phone_number','id','position','profile_pic','edit_image_path');
            $rules = [
                'id' => 'required',
                'email' => 'required',
                'name' => 'required',
                'position' => 'required',
                'phone_number' => 'required',
                'profile_pic' => 'required|mimes:jpeg,png,jpg',
               ];
               $validator = Validator::make($input, $rules);
               if ($validator->fails()) {
                   $code = 406;
                   $output = ['code' => $code, 'messages' => $validator->messages()->all()];
               }else{
                    if($request->hasFile('profile_pic'))
                    {
                        $img_tmp = Input::file('profile_pic');
                        if($img_tmp->isValid())
                        {
                            $extension = $img_tmp->getClientOriginalExtension();
                            $user_image = rand(111,99999).".".$extension;
                            $image_path = public_path('/images/user').'/'.$user_image;
                            Image::make($img_tmp)->save($image_path);          
                        }         
                    }
                    $user_image = !empty($user_image) ? $user_image : $request->edit_image_path;
                    User::where('id',$request->id)->update([
                        "name" => $request->name,
                        "email" => $request->email,
                        "position" => $request->position,
                        "phone_number" => $request->phone_number,
                        "profile_pic" =>  $user_image,
                    ]);
                    $code = 200;
                    $output = ['success'=>['code' => $code,'message' => 'User Updated Successfully.']];
                }
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

            if ($validator->fails()) {
                $code = 406;
                $output = ['code' => $code, 'messages' => $validator->messages()->all()];
            }else{
                $user = User::where('id',$request->id)->first();
                Follower::where('user_id',$request->id)->delete();
                Store::where('user_id',$request->id)->delete();
                $image_path = 'images/user/';
                if(file_exists($image_path.$user->profile_pic) && $user->profile_pic != 'user_default.png')
                {
                    unlink(public_path($image_path.$user->profile_pic));
                }
                // $user_id = session()->get('user_id');
                // if($user_id == $user->id){
                //     $code = 400;
                //     $request->session()->flush();
                //     $request->session()->forget('user_id');
                //     $request->session()->regenerate();
                //     $user->delete();
                //     return redirect('/');
                // }else{
                    $code = 200;
                    $user->delete();
                // }
                $code = 200;
                $output = ['success'=>['code' => $code,'message' => 'User Deleted Successfully.']];
            }
            return response()->json($output, $code);
        } 
    }

    //      Manage User CRUD Ends Here      //


    //      Manage User Profile Starts Here    //
    public function getUserProfile(Request $request,$id = '')
    {
        $user_id = $request->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $store = Store::where('user_id',$id)->first();
        $data['media'] = DB::table('promotions')
                    ->leftJoin('promotion_media', 'promotions.id', '=', 'promotion_media.promotion_id')
                    ->where('promotions.store_id',$store->id)
                    ->select('promotion_media.media_id')
                    ->get();
        $social = ($store != '') ? StoreSocialMedia::where('store_id',$store->id)->first() : '';
        $data['social'] = !empty($social) ? $social : '';
        $data['logged_user'] = $getuser;
        $data['store'] = !empty($store) ? $store : '';
        return view('user.client_profile',$data);
    }
    public function postUserProfile(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->all();
            User::where('id',$request->user_id)->update([
                'name' => $request->name,
                'position' => $request->position
            ]);
            $store_updated = Store::where('user_id',$request->user_id)->update([
                'name' => $request->company,
                'address' => $request->company_address,
                'telephone' => $request->company_telephone,
                'websitelink' => $request->company_website, 
                'emailaddress' => $request->company_email,
                'desciption' => $request->company_info, 
            ]); 
            StoreSocialMedia::where('store_id',$store_updated)->update([
                'facebook_link' => $request->fb_link,
                'twitter_link' => $request->tw_link,
                'insta_link' => $request->insta_link
            ]);
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => 'Profile Updated Successfully.']];
            return response()->json($output, $code);
        }
    }
   
    //      Manage User Profile Ends Here    //



    //      Manage Support Starts Here    //
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
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('home.support',$data); 
    }
    //      Manage Support Ends Here    //

    
    //      Manage Follower Starts Here    //

    public function getfollowers($id = null){
        $data['title'] = "Followers";
        $data['id'] = $id;
        $data['table_id'] = 'followed_stores';
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('home.followers',$data);
    }
    public function getunfollowers($id = null){
        $data['title'] = "Unfollowers";
        $data['id'] = $id;
        $data['table_id'] = 'blocked_stores';
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('home.followers',$data);
    }
    //      Manage Follower Ends Here    //
    

    // Manage Store Timeline Starts Here //

    public function getTimeline($store_id = '')
    {
        $data['title'] = 'Timeline';
        $user_id = request()->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['store'] = Store::where('id',$store_id)->first();
        $data['store'] = Store::where('id',$store_id)->first();
        $data['follower'] = Follower::where('store_id',$store_id)->get();
        $promotion = Promotion::where('store_id',$store_id)->with('comments')->get();
        $data['promotion'] = $promotion;
        $data['support'] = Support::where('store_id',$store_id)->get();

        return view('user.timeline',$data);
    }
    
    
    // Manage Store Timeline Ends Here //
    
    public function getActivity(){
        $data['title'] = "Categories";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('user.activity',$data);
    }
    /* Sara's work ends here */
}
