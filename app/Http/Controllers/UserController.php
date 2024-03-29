<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB,
    App\EventLog,
    App\Follower,
    App\MediaImage,
    App\User,
    App\Store,
    App\Support,
    App\StoreSocialMedia,
    App\Promotion,
    App\PromotionComment,
    App\PromotionMedia;

use App\Mail\SupportEmail;
use Illuminate\Support\Facades\Mail;
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
    public function getusers(){
        $data['title'] = "Manage Users";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->with('permissions')->first();
        $data['logged_user'] = $getuser;        
        $role = DB::table('roles')->where('name',session()->get('role_name'))->first();
        if($role->id == 1){
            $data['roles'] = DB::table('roles')->get();
        }else if($role->id == 2){
            $data['roles'] = DB::table('roles')->whereIn('id',[2,3])->orderBy('id','DESC')->get();
        }
        $data['role'] = $role->name;
        return view('users.view-all',$data);
    }
    public function createUsers(Request $request)
    {
        $data['title'] = "User";
        $data['table_id'] = "create_user";
        $data['sub_title'] = "Create User";
        $data['user'] = '';
        $role = DB::table('roles')->where('name',session()->get('role_name'))->first();
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->with('permissions')->first();
        $data['logged_user'] = $getuser;
        if($role->id == 1){
            $data['roles'] = DB::table('roles')->get();
        }else if($role->id == 2){
            $data['roles'] = DB::table('roles')->whereIn('id',[2,3])->orderBy('id','DESC')->get();
        }
        $data['role'] = $role->name;
        return view('users.create-users',$data);
    }
    public function addUsers(Request $request){
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
            EventLog::create([
                'component' => 'User : '.$repsonse->name,
//                    'component_name' => ,
                'component_image' => $repsonse->profile_pic,
                'operation' => 'added by',
                'user_id'   =>session()->get('user_id'),
            ]);
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
                    $user = User::where('id',$request->id)->update([
                                "name" => $request->name,
                                "email" => $request->email,
                                "phone_number" => $request->phone_number,
                                "profile_pic" =>  $user_image,
                                'role_id' => $request->edit_role_id
                            ]);
                   EventLog::create([
                       'component' => 'User : '.$request->name,
//                    'component_name' => ,
                       'component_image' => $user_image,
                       'operation' => 'edited',
                       'user_id'   =>session()->get('user_id'),
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

                EventLog::create([
                    'component' => 'User : '.$user->name,
//                    'component_name' => ,
                    'component_image' => $user->profile_pic,
                    'operation' => 'deleted',
                    'user_id'   =>session()->get('user_id'),
                ]);
                $code = 200;
                $user->delete();
                $output = ['success'=>['code' => $code,'message' => 'User Deleted Successfully.']];
            }
            return response()->json($output, $code);
        } 
    }

    //      Manage User CRUD Ends Here      //


    //      Manage User Profile Starts Here    //
    public function getUserProfile(Request $request,$store_id = '')
    {
        $user_id = $request->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['role'] = session()->get('role_name');
        if($data['role'] != 'Admin')
        {
            $stores = Store::where('user_id',$getuser->id)->get();
            $ids = [];
            foreach($stores as $store){ array_push($ids,$store->id);}
            $logs = EventLog::get();
        }else{
            $stores = Store::get();
            $ids = [];
            foreach($stores as $store){ array_push($ids,$store->id);}
            $logs = EventLog::get();
        }
        $media = DB::table('promotions')
                ->leftJoin('promotion_media', 'promotions.id', '=', 'promotion_media.promotion_id')
                ->whereIn('promotions.store_id',$ids)
                ->select('promotion_media.media_id')
                ->get();
        $data['stores'] = !empty($stores) ? $stores : '';
        $data['media'] = !empty($media) ? $media : '';
        $data['logs'] = !empty($logs) ? $logs : '';
        $data['logged_user'] = $getuser;
        $data['store_id'] = $store_id;
        return view('user.client_profile',$data);
    }
    public function getMedia(Request $request,$store_id = '')
    {
        $user_id = $request->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['role'] = session()->get('role_name');
        if($data['role'] == 'Admin')
        {
            $stores = Store::get();
            $ids = [];
        }else{
            $stores = Store::where('user_id',$user_id)->where('id',$store_id)->first();
            $ids = [];
        }
        if($store_id != '')
        {
//            $logs = EventLog::where('store_id',$store_id)->get();
            $medias = DB::table('promotions')
                    ->leftJoin('promotion_media', 'promotions.id', '=', 'promotion_media.promotion_id')
                    ->where('promotions.store_id',$store_id)
                    ->select('promotion_media.media_id')
                    ->get();
            $media_id = [];
            foreach($medias as  $media){array_push($media_id,$media->media_id);}
            $pro_media = MediaImage::whereIn('id',$media_id)->get();
        }else{
            $logs = EventLog::get();
            $medias = DB::table('promotions')
                    ->leftJoin('promotion_media', 'promotions.id', '=', 'promotion_media.promotion_id')
                    ->select('promotion_media.media_id')
                    ->get();
            $media_id = [];
            foreach($medias as  $media){array_push($media_id,$media->media_id);}
            $pro_media = MediaImage::whereIn('id',$media_id)->get();
        }
        // dd($pro_media);
        $data['stores'] = !empty($stores) ? $stores : '';
        $data['media'] = !empty($media) ? $pro_media : '';
        $data['logs'] = !empty($logs) ? $logs : '';
        $data['logged_user'] = $getuser;
        $data['store_id'] = $store_id;
//        dd($data);
        return view('user.media',$data);
    }
    public function getLogs(Request $request,$store_id = '')
    {
        $user_id = $request->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $stores = Store::where('user_id',$user_id)->get();
        $ids = [];
            $logs = EventLog::get();
            $medias = DB::table('promotions')
                    ->leftJoin('promotion_media', 'promotions.id', '=', 'promotion_media.promotion_id')
                    ->select('promotion_media.media_id')
                    ->get();
            $media_id = [];
            foreach($medias as  $media){array_push($media_id,$media->media_id);}
            $pro_media = MediaImage::whereIn('id',$media_id)->get();

        $data['stores'] = !empty($stores) ? $stores : [];
        $data['media'] = !empty($media) ? $pro_media : [];
        $data['logs'] = !empty($logs) ? $logs : [];
        $data['logged_user'] = $getuser;
        $data['store_id'] = $store_id;
        $data['role'] = session()->get('role_name');
        return view('user.system_logs',$data);
    }
    public function postUserProfile(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->all();
            $rules = [
                'email' => 'required|unique:users,email',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 200;
                $output = ['success'=>['code' => $code,'message' => $validator->messages()->all()]];
            }else {
                if($request->hasFile('profile_picture'))
                {
                    $img_tmp = Input::file('profile_picture');
                    if($img_tmp->isValid())
                    {
                        $extension = $img_tmp->getClientOriginalExtension();
                        $user_image = rand(111,99999).".".$extension;
                        $image_path = public_path('/images/user').'/'.$user_image;
                        Image::make($img_tmp)->save($image_path);
                    }
                }
                $user_image = !empty($user_image) ? $user_image : $request->profile_pic;
                $user =  User::where('id',$request->user_id)->first();
                EventLog::create([
                    'component' => 'User : '.$user->name,
//                    'component_name' => ,
                    'component_image' => $user->profile_pic,
                    'operation' => 'updated',
                    'user_id'   =>session()->get('user_id'),
                ]);
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'profile_pic' =>  $user_image
                ]);
                $code = 200;
                $output = ['success'=>['code' => $code,'message' => 'Profile Updated Successfully.']];
            }
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
                $support = Support::where('id',$request->id)->first();
                Mail::to($support->email)->send(new SupportEmail($support->response));
                Support::where('id',$request->id)->update([
                    "status" => 1,
                    "response" => $request->response
                ]);
                return response()->json(['success'=>'Response submitted.']);
            }
        }
        $data['title'] = "Customer Support";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['stores'] = Store::where('user_id',$user_id)->get();
        $data['role'] = session()->get('role_name');
        $data['store_id'] = '';
        return view('home.support',$data); 
    }



    public function storeSupport(Request $request,$store_id = ''){
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
        $data['stores'] = Store::where('user_id',$user_id)->get();
        $data['logged_user'] = $getuser;
        $data['store_id'] = $store_id;
        $data['role'] = session()->get('role_name');
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
        $data['follow'] = 'Followed At';
        $data['role'] = session()->get('role_name');
        return view('home.followers',$data);
    }
    public function getunfollowers($id = null){
        $data['title'] = "Unfollowers";
        $data['id'] = $id;
        $data['table_id'] = 'blocked_stores';
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['role'] = session()->get('role_name');
        $data['follow'] = 'Unfollowed At';
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
        $data['role'] = session()->get('role_name');
        $stores = Store::where('user_id',$user_id)->get();
        $data['stores'] = $stores;
        $data['store_id'] = $store_id;
        // foreach($stores as $store){ array_push($store_id,$store->id);}
        $data['store'] = Store::where('user_id',$user_id)->first();
        if($store_id != '')
        {
            $now = Carbon::now();
//            $data['store'] = Store::where('user_id',$user_id)->first();
            $data['store'] = Store::where('id',$store_id)->where('created_at','>' ,$now->subMonth()->toDateTimeString())->first();
            $data['follower'] = Follower::where('store_id',$store_id)->where('status',1)->where('created_at','>' ,$now->subMonth()->toDateTimeString())->with('hasuser')->get();
            $data['blocked'] = Follower::where('store_id',$store_id)->where('status',0)->where('created_at','>' ,$now->subMonth()->toDateTimeString())->with('hasuser')->get();
            $data['promotions'] = Promotion::where('store_id',$store_id)->where('created_at','>' ,$now->subMonth()->toDateTimeString())->with('comments')->get();
            $data['support'] = Support::where('store_id',$store_id)->where('created_at','>' ,$now->subMonth()->toDateTimeString())->get();
//             dd($data);
        }
//         dd($data);
        return view('user.timeline',$data); 
    }
    
     
    // Manage Store Timeline Ends Here //
    /* Sara's work ends here */
}
