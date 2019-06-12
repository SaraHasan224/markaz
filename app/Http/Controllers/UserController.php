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

    public function getProfile(){
        $user = JWTAuth::parseToken()->ToUser();
        return response()->json(['user'=>$user]);
    }

    /* Sara's work starts here */

    /* Web Panel User CRUD */

    //      Manage User CRUD Starts Here    //
    public function getusers($store_id = ''){
        $data['title'] = "Manage Users";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->with('permissions')->first();
        $data['role'] = session()->get('role_name');
        $data['logged_user'] = $getuser;
        $data['store_id'] = $store_id;
        
        $role = DB::table('roles')->where('name',session()->get('role_name'))->first();
        if($role->id == 1){
            $data['roles'] = DB::table('roles')->get();
        }else if($role->id == 2){
            $data['roles'] = DB::table('roles')->whereIn('id',[2,3])->orderBy('id','DESC')->get();
        }
        return view('users.view-all',$data);
    }
    public function createUsers(Request $request,$store_id = '')
    {
        $data['title'] = "User";
        $data['table_id'] = "create_user";
        $data['sub_title'] = "Create User";
        $data['user'] = '';
        $user_id = session()->get('user_id');
        $role = DB::table('roles')->where('name',session()->get('role_name'))->first();

        if($store_id != '')
        {
            $getuser = User::where('id',$user_id)->where('store_id',$store_id)->first();
        }else{
            $getuser = User::where('id',$user_id)->first();
        }
        $data['logged_user'] = $getuser;
        $data['store_id'] = $store_id;
        if($role->id == 1){
            $data['roles'] = DB::table('roles')->get();
        }else if($role->id == 2){
            $data['roles'] = DB::table('roles')->whereIn('id',[2,3])->orderBy('id','DESC')->get();
        }
        return view('users.create-users',$data);
    }
    public function addUsers(Request $request,$store_id = ''){
        $input = $request->only('email', 'password','name', 'phone_number','profile_pic','role_id');
        $rules = [
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'profile_pic' => 'mimes:jpeg,png,jpg',
            'role_id' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $input['access_token'] = Str::random(60);
            $input['store_id'] = $store_id;
            
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
    public function viewUsers(Request $request,$store_id = '')
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
            $user['role_id'] = $findUser->role_id;
            $user['profile_pic'] = $findUser->profile_pic;
            $user['user_image'] = asset('/images/user').'/'.$findUser->profile_pic;
            $output = ['success'=>['code' => $code,'message' => $user]];
            return response()->json($output, $code);
        }
    }
    public function editUsers(Request $request,$store_id = '')
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('email','name','phone_number','id','position','profile_pic','edit_image_path','edit_role_id');
            $rules = [
                'id' => 'required',
                'email' => 'required',
                'name' => 'required',
                'phone_number' => 'required',
                'edit_role_id' => 'required'
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
                        "phone_number" => $request->phone_number,
                        "profile_pic" =>  $user_image,
                        'role_id' => $request->edit_role_id
                    ]);
                    // $user = User::find($repsonse->id);
                    
                    //Ask kashaf to tell how to update permissions assigned to a user
                    // if($request->role_id == 1)
                    // {
                    //     $permission = Permission::get();
                    //     foreach($permission as $permit)
                    //     {
                    //         $user->givePermissionTo($permit->name);
                    //     }
                    //     $user->assignRole('Admin');
                    // }
                    // else if($request->role_id == 2)
                    // {
                    //     $permission = Permission::whereNotIn('id',[4,9,14,19,24,29,34])->get();
                    //     foreach($permission as $permit)
                    //     { 
                    //         $user->givePermissionTo($permit->name);
                    //     }
                    //     $user->assignRole('Store Admin');
                    // }
                    // else if($repsonse->role_id == 3)
                    // {
                    //     $permission = Permission::whereNotIn('id',[1,2,3,4,5,7,8,9,12,13,14,16,17,18,19,20,22,23,24,27,28,29,33,34])->get();
                    //     foreach($permission as $permit)
                    //     {
                    //         $user->givePermissionTo($permit->name);
                    //     }
                    //     $user->assignRole('Store Franchise');
                    // }
                    $code = 200;
                    $output = ['success'=>['code' => $code,'message' => 'User Updated Successfully.']];
                }
            return response()->json($output, $code);
        }
    } 
    public function deleteUsers(Request $request,$store_id = '')
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
                $user = User::where('id',$request->id)->where('store_id',$store_id)->first();
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
        $store = Store::where('id',$getuser->store_id)->first();
        $data['media'] = DB::table('promotions')
                    ->leftJoin('promotion_media', 'promotions.id', '=', 'promotion_media.promotion_id')
                    ->where('promotions.store_id',$getuser->store_id)
                    ->select('promotion_media.media_id')
                    ->get();
        $social = ($store != '') ? StoreSocialMedia::where('store_id',$store->id)->first() : '';
        $data['social'] = !empty($social) ? $social : '';
        $data['logged_user'] = $getuser;
        return view('user.client_profile',$data);
    }
    public function postUserProfile(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->all();
            User::where('id',$request->user_id)->update([
                'name' => $request->name,
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

    public function getTimeline($store_id = '',$timeline = '')
    {
        $data['title'] = 'Timeline';
        $user_id = request()->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;

        if($timeline == 'today')
        {
            $data['user'] = Store::where('id',$store_id)->whereDate('created_at', Carbon::today())->first();
            $data['store'] = Store::where('id',$store_id)->whereDate('created_at', Carbon::today())->first();
            $data['follower'] = Follower::where('store_id',$store_id)->whereDate('created_at', Carbon::today())->get();
            $data['promotion'] = Promotion::where('store_id',$store_id)->whereDate('created_at', Carbon::today())->with('comments')->get();
            $data['support'] = Support::where('store_id',$store_id)->whereDate('created_at', Carbon::today())->get();
        }
        elseif($timeline == 'yestarday'){
            $data['store'] = Store::where('id',$store_id)->whereDate('created_at', Carbon::today())->first();
            $data['follower'] = Follower::where('store_id',$store_id)->whereDate('created_at', Carbon::today())->get();
            $data['promotion'] = Promotion::where('store_id',$store_id)->whereDate('created_at', Carbon::today())->with('comments')->get();
            $data['support'] = Support::where('store_id',$store_id)->whereDate('created_at', Carbon::today())->get();
        }
        return view('user.timeline',$data); 
    }
    
     
    // Manage Store Timeline Ends Here //
    
    public function getActivity($store_id = ''){ 
        $data['title'] = "Activity";
        $data['sub_title'] = "Recent Activities";
        $date = date("Y/m/d");

        $data['store'] = Store::where('id',$store_id)->whereDate('created_at', Carbon::today())->first();
        $data['follower'] = Follower::where('store_id',$store_id)->whereDate('created_at', Carbon::today())->get();
        $data['promotion'] = Promotion::where('store_id',$store_id)->with('comments')->whereDate('created_at', Carbon::today())->get();
        $data['support'] = Support::where('store_id',$store_id)->whereDate('created_at', Carbon::today())->get();

        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('user.activity',$data);
    }
    /* Sara's work ends here */
}
