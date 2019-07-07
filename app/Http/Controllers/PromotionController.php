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
    App\User;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str; 
use App\Data\Repositories\PromotionRepository;
use App\Data\Repositories\PromotionMediaRepository;
use Illuminate\Support\Facades\Input;
use Validator,Illuminate\Validation\Rule, Image, Storage, Carbon\Carbon;
use App\Events\PromotionWasCreated;

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
                $code = 200;
                $output = $this->_repository->findByAll($pagination, $limit, $input,false,true,true);
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
        $data['stores'] = Store::where('user_id',$user_id)->get();
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
                    'component' => 'Promotions',
                    'component_name' => $repsonse->title,
                    'operation' => 'Added',
                    'user_id'   => session()->get('user_id'),
                    'store_id'  => $request->store_id,
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
                'component' => 'Promotions',
                'component_name' => $promotion->title,
                'operation' => 'Deleted',
                'user_id'   => session()->get('user_id'),
                'store_id'  => session()->get('store_id'),
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

        $data['categories'] = Categories::where('status',1)->get();
        $data['tags'] = Tags::where('status',1)->get();

        $data['promotion'] = Promotion::where('id',$id)->first();
        $data['promotion_media'] = PromotionMedia::where('promotion_id',$id)->get(); 
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
                    'component' => 'Promotions',
                    'component_name' => $request->title,
                    'operation' => 'Updated',
                    'user_id'   => session()->get('user_id'),
                    'store_id'  => session()->get('store_id'),
                ]);
                if(!empty($request->category))
                {
                    // dd($request->category);
                    foreach($request->category as $key => $category)
                    {
                        PromotionCategories::updateOrInsert(                        
                            [
                                'title' => $category,
                            ],
                            [
                                'promotion_id' => $id
                            ]
                        );
                    }
                }
                if(!empty($request->tags))
                {
                    foreach($request->tags as $tag)
                    {
                        PromotionTags::updateOrInsert(
                            [
                                'title' => $tag,
                            ], 
                            [
                                'promotion_id' => $id
                            ]
                        );
                    }
                }
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
        $promotion_categories = PromotionCategories::where('promotion_id',$id)->get();
        $promotion_tags = PromotionTags::where('promotion_id',$id)->get();
        $promotion = Promotion::where('id',$id)->first();
        $code = 200;
        $output = ['success'=>['code' => $code,'promotion_categories' => $promotion_categories,'promotion_tags' => $promotion_tags,'promotion'=>$promotion ]];
        return response()->json($output, $code);
    }

    /* Sara's work ends here */
    
    /**
     * Usman Work for API
    */
    public function getNewpPromotions(){
        return $promotion = Promotion::orderBy('id', 'desc')->take(1)->get();
   }
}
