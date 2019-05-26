<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store,
    App\StoreSocialMedia,
    App\User;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use App\Data\Repositories\StoreRepository;
use Validator,Illuminate\Validation\Rule, Image, Storage, Carbon\Carbon;

class StoreController extends Controller
{
    public function __construct(StoreRepository $store) {
        $this->_repository = $store;
    }


    public function create(Request $request){
        $input = $request->only('name', 'address','latitude', 'longitude','user_id');
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'user_id' => 'required',

        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
           $repsonse = $this->_repository->createStore($input);
            if($repsonse){
                $code = 200;
                $output = ['code' => $code,'store'=>$repsonse];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while creating store.']]];
            }
         }
        return response()->json($output, $code);
    }



    public function all(Request $request) {
        $input = $request->only('pagination','keyword','limit','user_id');
           $pagination = false;
            if($input['pagination']) {
                $pagination = true;
            }
            $limit = 10;
            if(!empty($input['limit'])){
              $limit = $input['limit'];
            }
            $code = 200;
        	$output = $this->_repository->findByAll($pagination, $limit, $input,false,true,true);
        // all good so return the token
        return response()->json($output, $code);
    }

    /* Sara's work starts here */
    
    // Manage stores starts here 

    public function getstore(){
        $data['title'] = "Manage Stores";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('store.view-all',$data);
    }
    public function createstore(Request $request){
        $data['title'] = "Create Store";
        $data['user_id'] = $request->session()->get('user_id');
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('store.create-store',$data);
    }
    public function poststore(Request $request){
        $input = $request->only('name', 'address','user_id','website','contact_email','description','latitude', 'longitude','contact_number','fb_link','tw_link','insta_link');
        $rules = [  
            'name' => 'required|unique:stores,name',
            'address' => 'required',
            'user_id' => 'required', 
            'website' => 'required',
            'contact_email' => 'required',
            'description' => 'required',
            'address' => 'required',
            'contact_number' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $store = new Store;
            $store->name = $request->name;
            $store->address = $request->address;
            $store->user_id = $request->user_id;
            $store->websitelink = $request->website;
            $store->emailaddress = $request->contact_email;
            $store->desciption = $request->description;
            $store->telephone = $request->contact_number;
            $store->save();
            $social = new StoreSocialMedia;
            $social->store_id = $store->id;
            $social->facebook_link = $request->fb_link;
            $social->twitter_link = $request->tw_link;
            $social->insta_link = $request->insta_link;
            $social->save();
            
            $output = "Store created successfully";
            $code = 200;
         }
         return response()->json($output, $code);
    }
    public function editstore(Request $request,$id){
        $data['store'] = Store::where('id',$id)->first();
        $data['title'] = "Edit Store - ".$data['store']->name;
        $data['user'] = Auth::user();
        if($request->isMethod('post'))
        {
            $input = $request->only('name', 'address','user_id','latitude', 'longitude','contact_number');
            $rules = [ 
                'name' => 'required',
                'address' => 'required',
                'user_id' => 'required',
                'contact_number' => 'required'
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = ['code' => $code, 'messages' => $validator->messages()->all()];
            }else{
                Store::whereId($id)->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'user_id' => $request->user_id,
                ]);
                User::whereId($request->user_id)->update([
                    'phone_number' => $request->contact_number,
                ]);
                $output = "Store updated successfully";
                $code = 200;
            }
            return response()->json($output, $code);
        }
        return view('store.edit-store',$data);
    }
    public function getspecificstore(){
        $data['title'] = "Stores";
        return view('store.view-all',$data);
    }

    // Manage stores ends here 

    /* Sara's work ends here */

 



}
