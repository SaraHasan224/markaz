<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories,
    App\EventLog,
    App\MediaImage,
    App\Promotion,
    App\Tags,
    App\PromotionCategories,
    App\PromotionComment,
    App\PromotionMedia,
    App\PromotionTags,
    App\Store,
    App\DeviceToken,
    App\User;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str; 
use App\Data\Repositories\PromotionRepository;
use App\Data\Repositories\PromotionMediaRepository;
use Illuminate\Support\Facades\Input;
use Validator,Illuminate\Validation\Rule, DB,Image, Storage, Carbon\Carbon;
use App\Events\PromotionWasCreated;
use App\Events\UserWasNotified;

class PromotionController extends Controller
{
    public function __construct(PromotionRepository $promotion,PromotionMediaRepository $promotionImageRepo) {
        $this->_repository = $promotion;
        $this->_promotion_image_repo = $promotionImageRepo;
    }

    //API work starts here
    public function create(Request $request){
        $input = $request->only('title', 'description','store_id','media_ids');
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'store_id' => 'required',
            'media_ids' =>'array',
        ];
        $validator = Validator::make($input, $rules); 
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
           $repsonse = $this->_repository->createPromotion($input);
            if($repsonse){
                $input['promotion_id'] = $repsonse->id; 
                 $this->_promotion_image_repo->assignMedia($input);
                $code = 200;
                $output = ['code' => $code,'promotion'=>$repsonse];
                event(new PromotionWasCreated($repsonse->id));
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while creating promotion.']]];
            }
         }
        return response()->json($output, $code);
    }
    public function all(Request $request) {
            $input = $request->only('pagination','keyword','limit','store_id');
               $pagination = false;
                if($input['pagination']) {
                    $pagination = true;
                }
                $limit = 10;
                if(!empty($input['limit'])){
                  $limit = $input['limit'];
                }
                $code = 200;$output = 
                $this->_repository->getAllPromotion( $input);
            // all good so return the token
            return response()->json($output, $code);
    }
    
    //API work ends here

    /* Sara's work starts here */
   
    //  Promotion Starts   //
    public function getpromotions($store_id = ''){
        $data['title'] = "Promotions";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['role'] = session()->get('role_name');
        $data['logged_user'] = $getuser;
        $data['store_id'] = $store_id;
        return view('promotions.view-all',$data);
    }

    public function createPromotion(Request $request){ 
        $data['title'] = "Create Promotion";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['tags'] = Tags::get();
        $role = session()->get('role_name');
        if($role == 'Admin'){
            $data['stores'] = Store::get();
        }else{
            $data['stores'] = Store::where('user_id',$user_id)->get();
        }
        $data['logged_user'] = $getuser;
        if($request->isMethod('post'))
        { 
            $input = $request->all();
            // dd($input);
            $media_ids = [];
            if($request->hasFile('image'))
            {
                foreach($input['image'] as $value=> $file)
                {
                    if($file->isValid())
                    {
                        $extension = $file->getClientOriginalExtension();
                        $image = rand(111,99999).".".$extension;
                        $image_path = public_path('/images/promotion_media').'/'.$image;
                        Image::make($file)->save($image_path);
                        $media = new MediaImage;
                        $media->image = $image;
                        $media->save();
                        array_push($media_ids,$media->id);
                    } 
                }
            }
            if($request->hasFile('images'))
            { 
                $img_tmp = Input::file('images');
                if($img_tmp->isValid())
                {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $image = rand(111,99999).".".$extension;
                    $image_path = public_path('/images/promotion').'/'.$image;
                    Image::make($img_tmp)->save($image_path);          
                }         
            }
            $input['images'] = $image;
            $repsonse = $this->_repository->createPromotion($input);
            if($repsonse){

                EventLog::create([
                    'component' => 'Promotion : '.$request->title,
                    'component_image' => $image,
                    'operation' => 'added',
                    'user_id'   =>session()->get('user_id'),
                ]);
                $input['promotion_id'] = $repsonse->id;
                $input['media_ids'] = $media_ids;
                $this->_promotion_image_repo->assignMedia($input);
                $code = 200;
                $output = ['code' => $code,'promotion'=>$repsonse];
                event(new PromotionWasCreated($repsonse->id));
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while creating promotion.']]];
            }
            return response()->json($output, $code);
        }
        return view('promotions.create-promotion',$data);
    }

    public function deletePromotion(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('id');
            $rules = [
                'id' => 'required',
               ];
            $validator = Validator::make($input, $rules);
            $promotion = Promotion::where('id',$request->id)->first();

            EventLog::create([
                'component' => 'Promotion : '.$promotion->title,
//                    'component_name' => ,
                'operation' => 'deleted',
                'user_id'   =>session()->get('user_id'),
            ]);
            $promotion->delete();
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => 'Promotion Deleted Successfully.']];
            return response()->json($output, $code);
        } 
    }
    public function editpromotions($id = ''){
        $data['title'] = "Edit Promotions";
        $data['sub_title'] = "Promotions";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;

        $data['tags'] = Tags::get();

        $data['promotion'] = Promotion::where('id',$id)->first();
        $promotion_media = DB::table('promotions')->where('promotions.id',$id)
                    ->leftJoin('promotion_media', 'promotions.id', '=', 'promotion_media.promotion_id')
                    ->select('promotion_media.media_id')
                    ->get();
        $media_id = [];
        foreach($promotion_media as  $media){array_push($media_id,$media->media_id);}
        $data['promotion_media'] = MediaImage::whereIn('id',$media_id)->get();
        $data['promotion_comments'] = PromotionComment::where('promotion_id',$id)->get(); 
        return view('promotions.view-promotion',$data);

    }

    public function editpromotion(Request $request,$id = '')
    {
        if($request->isMethod('post'))
        {
            $input = $request->all();
            if(!empty($request->time))
            {
                $time = explode(" / ",$request->time);
                Promotion::where('id',$id)->update([
                    'title'       => $request->title,
                    'description' => $request->description,
                    'start_time'  => Carbon::parse($time[0])->format('Y-m-d  H:i:s'), 
                    'end_time'    => Carbon::parse($time[1])->format('Y-m-d  H:i:s'),
                ]);

                EventLog::create([
                    'component' => 'Promotion : '.$request->title,
//                    'component_name' => ,
                    'operation' => 'eddited',
                    'user_id'   =>session()->get('user_id'),
                ]);
            }
            if(!empty($request->location))
            { 
                Promotion::where('id',$id)->update([
                    'location'    => $request->location,
                    'longitude'   => $request->longitude,
                    'latitude'    => $request->latitude,
                ]);
            }
                $code = 200;
                $output = ['code' => $code,'promotion'=>'Promotion Updated Successfully'];
           
            return response()->json($output, $code);
        }
    }


    public function viewpromotions($id = ''){
        $promotion = Promotion::where('id',$id)->first();
        $promotion_tags = Tags::where('id',$promotion->tag_id)->first();
        $code = 200;
        $output = ['success'=>['code' => $code,'promotion_tags' => $promotion_tags,'promotion'=>$promotion ]];
        return response()->json($output, $code);
    }

    /* Sara's work ends here */
    
    /**
     * Usman Work for API
    */
    public function getNewPromotions(){

        $code = 200;
        $output = $this->_repository->getNewPromotion();
        return response()->json($output, $code);


        

}

    public function sendNotification(Request $request){
        $input = $request->only('lat', 'long','user_id');
        $send =  DB::select('SELECT
            id as id_l,location,latitude, longitude,store_id, ((
                6371 * acos (
                cos ( radians(latitude) )
                * cos( radians('.$input['lat'].') )
                * cos( radians( '.$input['long'].') - radians(longitude) )
                + sin ( radians(latitude) )
                * sin( radians( '.$input['lat'].'  ) )
              )
            ) * 1000) AS distance
          FROM promotions
          HAVING distance < (SELECT radius from promotions WHERE promotions.id = id_l)
          ORDER BY distance');

          if(count($send)>0){
              foreach($send as $promotion){
                $user = User::where('id',$input['user_id'])->first();
                $token = DeviceToken::where('user_id',$user->id)->first();
                $store = Store::where('id',$promotion->store_id)->first();
                $promotion_data = Promotion::where('id',$promotion->id_l)->first();
                $notification_data['user'] = $user ;
                $notification_data['promotion']=$promotion_data;
                $notification_data['access_token']= $token;
                $notification_data['store'] = $store;
                event(new UserWasNotified($notification_data));
              }
        
          }

        
         
        return response()->json(200);
    }

}
