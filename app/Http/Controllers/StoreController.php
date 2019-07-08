<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories,
    App\Store,
    App\EventLog,
    App\StoreSocialMedia,
    App\User,
    App\Support;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use App\Data\Repositories\StoreRepository;
use Illuminate\Support\Facades\Input;
use Validator,Illuminate\Validation\Rule,Image, Storage, Carbon\Carbon;

class StoreController extends Controller
{
    public function __construct(StoreRepository $store) {
        $this->_repository = $store;
    }
    // API work starts here

    public function create(Request $request){
        $input = $request->only('name', 'address','latitude', 'longitude','website','emailaddress','description','telephone','tagline','user_id','category_id','cover','image');
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'emailaddress'=>'required',
            'tagline'=>'required',
            'telephone'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'image'     =>  'required',
             'image' => 'mimes:jpeg,jpeg,png',
             'cover'     =>  'required',
             'cover' => 'mimes:jpeg,jpeg,png',
             'user_id'=>'required',
             'category_id'=>'required'

             
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $input['image']->store(config('app.files.store.folder_name'));
            $input['cover']->store(config('app.files.store.folder_name'));
            $input['image'] = $input['image']->hashName();
            $input['cover'] = $input['cover']->hashName();
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
        $input = $request->only('pagination','keyword','limit','user_id','category_id');
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
    public function addSupport(Request $request){
        $input = $request->only('first_name', 'last_name','store_id','subject', 'email','description');
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'store_id' => 'required|exists:stores,id',
            'subject' => 'required',
            'email' => 'required',
            'description' => 'required',
           ];
           
        
        $validator = Validator::make($input, $rules);
        $validator->setAttributeNames([
            'store_id.exists' => 'Store doesn\'t exists',
            'store_id.required' => 'Store Id is required',
        ]);
        
        if ($validator->fails()) {
            $code = 406;
            $output = ['error' => [ 'code' => $code, 'messages' => $validator->messages()->all() ] ];
        }else{
            $support = new Support;
            $support->first_name = $request->first_name;
            $support->last_name = $request->last_name;
            $support->store_id = $request->store_id;
            $support->subject = $request->subject;
            $support->email = $request->email;
            $support->description = $request->description;
            $support->save();
        if($support){
                $code = 200;
                $output = ['code' => $code,'support'=>$support];
            }
        }
        return response()->json($output, $code);
    }

    //API work ends here









    /* Sara's work starts here */
    
    // Manage stores starts here 
    public function getstoreid(Request $request){
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $store = Store::where('id',$request->store_id)->first();
            return response()->json($store);
        }
    }
    public function getstore(){
        $data['title'] = "Manage Stores";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['role'] = session()->get('role_name');
        $data['logged_user'] = $getuser;
        $data['user_id'] = $user_id;
        return view('store.view-all',$data);
    }
    public function createstore(Request $request){
        $data['title'] = "Create Store";
        $data['user_id'] = $request->session()->get('user_id');
        $user_id = session()->get('user_id');
        $data['role'] = session()->get('role_name');
        $data['categories'] = Categories::all();
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('store.create-store',$data);
    }
    public function poststore(Request $request){
        $input = $request->only('name','cover','image','category_id','tagline','address','user_id','website','contact_email','description','latitude', 'longitude','contact_number','fb_link','tw_link','insta_link');
        $rules = [  
            'name' => 'required|unique:stores,name',
            'cover' => 'required',
            'image' => 'required',
            'address' => 'required',
            'user_id' => 'required', 
            'website' => 'required',
            'contact_email' => 'required',
            'description' => 'required',
            'tagline' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'category_id' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            if($request->hasFile('cover'))
            { 
                $img_tmp = Input::file('cover');
                if($img_tmp->isValid())
                {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $cover = rand(111,99999).".".$extension;
                    $image_path = public_path('/images/store/cover').'/'.$cover;
                    Image::make($img_tmp)->save($image_path);          
                }         
            }
            if($request->hasFile('image'))
            { 
                $img_tmp = Input::file('image');
                if($img_tmp->isValid())
                {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $image = rand(111,99999).".".$extension;
                    $image_path = public_path('/images/store/logo').'/'.$image;
                    Image::make($img_tmp)->save($image_path);          
                }         
            }
            $store = new Store;
            $store->name = $request->name;
            $store->category_id = $request->category_id;
            $store->image = $image;
            $store->cover = $cover;
            $store->address = $request->address;
            $store->user_id = $request->user_id;
            $store->website = $request->website;
            $store->emailaddress = $request->contact_email;
            $store->description = $request->description;
            $store->tagline = $request->tagline;
            $store->longitude = $request->longitude;
            $store->latitude = $request->latitude;
            $store->telephone = $request->contact_number;
            $store->save();
            $social = new StoreSocialMedia;
            $social->store_id = $store->id; 
            $social->facebook_link = $request->fb_link;
            $social->twitter_link = $request->tw_link;
            $social->insta_link = $request->insta_link;
            $social->save();
            EventLog::create([
                'component' => 'Store',
                'component_name' => $request->name,
                'operation' => 'Added',
                'user_id'   => session()->get('user_id')
            ]);
            $output = "Store created successfully";
            $code = 200;
         }
         return response()->json($output, $code);
    }
    public function editstore(Request $request,$id){
        $data['store'] = Store::where('id',$id)->with('hassocialmedia')->first();
        $data['title'] = "Edit Store - ".$data['store']->name;
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['categories'] = Categories::all();
        $data['logged_user'] = $getuser;
        $data['user_id'] = $user_id; 
        if($request->isMethod('post'))
        {
            $input = $request->all();
            $rules = [  
                'name' => 'required',
                'address' => 'required',
                'website' => 'required',
                'contact_email' => 'required',
                'tagline' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'contact_number' => 'required'
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = ['code' => $code, 'messages' => $validator->messages()->all()];
            }else{
                
                if($request->hasFile('image'))
                {
                    $img_tmp = Input::file('image');
                    if($img_tmp->isValid())
                    {
                        $extension = $img_tmp->getClientOriginalExtension();
                        $image = rand(111,99999).".".$extension;
                        $image_path = public_path('/images/store/logo').'/'.$image;
                        Image::make($img_tmp)->save($image_path);          
                    }         
                }
                $image = !empty($image) ? $image : $request->p_image;
                if($request->hasFile('cover'))
                {
                    $img_tmp = Input::file('cover');
                    if($img_tmp->isValid())
                    {
                        $extension = $img_tmp->getClientOriginalExtension();
                        $cover = rand(111,99999).".".$extension;
                        $image_path = public_path('/images/store/cover').'/'.$cover;
                        Image::make($img_tmp)->save($image_path);          
                    }         
                }
                $cover = !empty($cover) ? $cover : $request->p_cover;
                Store::whereId($id)->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'telephone' => $request->contact_number,
                    'website' => $request->website,
                    'emailaddress' => $request->contact_email,
                    'tagline' => $request->tagline,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'cover' => $cover,
                    'image' => $image,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);
                EventLog::create([
                    'component' => 'Store',
                    'component_name' => $request->name,
                    'operation' => 'Updated',
                    'user_id'   => session()->get('user_id'),
                    'store_id'  => $id
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
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['role'] = session()->get('role_name');
        return view('store.view-all',$data);
    }

    public function updateStoreStatus(Request $request)
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
                $code = 200;
                $store = Store::where('id',$request->id)->first();
                EventLog::create([
                    'component' => 'Store',
                    'component_name' => $store->name,
                    'operation' => 'Status Updated',
                    'user_id'   => session()->get('user_id'),
                ]);
                $storecode = 200;
                $status = ($store->status == 1) ? 0 : 1;
                $store->update(['status' => $status]);
                $output = ['code' => $code,'message' => 'Store Updated Successfully.'];
            }
            return response()->json($output, $code);
        } 
    }

    public function deleteStore(Request $request)
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
                $code = 200;
                $store = Store::where('id',$request->id)->first();
                EventLog::create([
                    'component' => 'Store',
                    'component_name' => $store->name,
                    'operation' => 'Deleted',
                    'user_id'   => session()->get('user_id'),
                ]);
                $storecode = 200;
                $store->delete();
                $output = ['code' => $code,'message' => 'Store Deleted Successfully.'];
            }
            return response()->json($output, $code);
        } 
    }
    // Manage stores ends here 

    /* Sara's work ends here */

    /**
     * Usman work for Api
     */
    public function getNewStores(){

        $code = 200;
        $output = $this->_repository->getNewStores();
        return response()->json($outout,$code);
        // return $stores = Store::orderBy('id', 'desc')->take(10)->get();
   }
}
