<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB,
    App\Follower,
    App\EventLog,
    App\Promotion,
    App\PromotionRating,
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
        // else
            // return view('index',$data);
            // return redirect('dashboard');
    } 
    
    public function dashboard(Request $request,$user_id = ''){
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $role = DB::table('roles')->whereId($getuser->role_id)->first();
        $data['logged_user'] = $getuser;
        $user_role = $role->name;
        $data['logged_user_role'] = $user_role;
        $request->session()->put('role_name', $user_role);
        $request->session()->put('store_id', $getuser->store_id);

        $data['role'] = $user_role;
        $data['store_id'] = '';
        
        $data['follow_title'] = "Follower Statistics";
        $data['views_heading'] = ($user_role == 'Admin') ? "Appication Downloads" : "Store Views";
        $data['rate_heading'] = ($user_role == 'Admin') ? "System" : "Store";
        $data['follower_head'] = ($user_role == 'Admin') ? "Stores" : "Followers";
        if($user_role == "Store Admin")
        {
            $stores = Store::where('user_id',$user_id)->get();
            $store_id = []; $store_views = [];
            foreach($stores as  $store){array_push($store_id,$store->id);array_push($store_views,$store->views);}

            $followed = Follower::whereIn('store_id',$store_id)->where('status',1)->with('hasuser')->get();
            $users = User::where('role_id',4)->get();
            $data['follow_stats'] = count($followed)/count($users)*100;

            $promotion =  Promotion::orderBy('id','DESC')->whereIn('store_id',$store_id)->get();
            $promotion_id = [];
            foreach($promotion as $pro){
                array_push($promotion_id,$pro->id);   
            }
            //Promotion Ratings
            $pro_rate = DB::table('promotion_rating')->whereIn('promotion_id',$promotion_id)->get();
            $promotion_id = []; $rating = [];
            foreach($pro_rate as $rate){ 
                array_push($promotion_id,$rate->promotion_id); 
                array_push($rating,$rate->rating); 
            }
            $average_rating = array_sum($rating)/count($rating);
            $data['promotion_stats'] = $average_rating/count($promotion_id);
            $data['follow_stats'] = count($followed)/count($users);
            $data['follow_statistics'] = count($followed)/count($users)*100;
            $data['recent_promotions'] = $promotion;
            $data['follower_data'] = $followed;
            $data['store_views'] = array_sum($store_views);
        }
        else if($user_role == 'Admin')
        {
            $followed = Follower::where('status',1)->get();
            $users = User::where('role_id',4)->get();
            $data['follow_stats'] = count($followed)/count($users)*100;

            //Promotion Ratings
            $pro_rate = DB::table('promotion_rating')->groupBy('promotion_id')
                        ->selectRaw('avg(rating) as rating, promotion_id')
                        ->get();
            $promotion_id = []; $rating = [];
            foreach($pro_rate as $rate){ 
                array_push($promotion_id,$rate->promotion_id); 
                array_push($rating,$rate->rating); 
            }
            $average_rating = array_sum($rating)/count($rating);
            $data['promotion_stats'] = $average_rating/count($promotion_id);
            $data['follow_stats'] = count($followed)/count($users);
            $data['follow_statistics'] = count($followed)/count($users)*100;
            $data['recent_promotions']  =  Promotion::orderBy('id','DESC')->limit(10)->get();

            $store = Store::orderBy('id','DESC')->get();
            $data['follower_data'] = $store;

            $store_views = [];
            foreach($stores as  $store){array_push($store_views,$store->views);}
            $data['store_views'] = array_sum($store_views);
        }
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
                // event(new UserWasCreated($user->id));
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
