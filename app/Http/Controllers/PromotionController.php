<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use App\Data\Repositories\PromotionRepository;
use App\Data\Repositories\PromotionMediaRepository;
use Validator,Illuminate\Validation\Rule, Image, Storage, Carbon\Carbon;
use App\Events\PromotionWasCreated;

class PromotionController extends Controller
{
    public function __construct(PromotionRepository $promotion,PromotionMediaRepository $promotionImageRepo) {
        $this->_repository = $promotion;
        $this->_promotion_image_repo = $promotionImageRepo;
    }

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


    
    /* Sara's work starts here */
        
    /* View All Promotions funtion starts here  */ 
    public function getpromotions(){
        $data['title'] = "View All Promotions";
        return view('promotions.view-all',$data);
    }
    /* View All Promotions funtion ends here  */
    /* Create Promotions funtion starts here  */ 
    public function createpromotion(Request $request){ 
        $data['title'] = "Create Promotion";
        if($request->isMethod('post'))
        { 
            $input = $request->only('name', 'address','user_id','latitude', 'longitude','contact_number');
            $rules = [ 
                'name' => 'required|unique:stores,name',
                'address' => 'required',
                'user_id' => 'required|unique:stores,user_id',
                'contact_number' => 'required|unique:users,contact_number'
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = ['code' => $code, 'messages' => $validator->messages()->all()];
            }else{
                Store::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'user_id' => $request->user_id,
                ]);
                User::whereId($request->user_id)->update([
                    'phone_number' => $request->contact_number,
                ]);
                $output = "Store created successfully";
                $code = 200;
            }
            return response()->json($output, $code);
        }
        return view('promotions.create-promotion',$data);
    }
    /* Create Promotions funtion ends here  */
    /* View Single Promotion funtion starts here  */ 
    public function viewpromotions(){
        $data['title'] = "Edit Promotions";
        return view('promotions.view-promotion',$data);
    }
    /* View Single Promotion funtion ends here  */

    
    /* Sara's work ends here */
}
