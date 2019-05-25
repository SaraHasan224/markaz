<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion,
    App\PromotionCategories,
    App\PromotionTags,
    App\User;
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
        
    //      Promotion Categories Starts //

    public function getCategories(){
        $data['title'] = "Promotion Categories";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('promotions.promotion-categories',$data);
    }
    public function addCategories(Request $request){
        if($request->isMethod('post'))
        {
            $input = $request->only('category');
            $rules = [ 
                'category' => 'required',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = $validator->messages()->all();
            }else{
                $category = new PromotionCategories;
                $category->title = $request->category;
                $category->status = 1;
                $category->save();
                $code = 200;
                $output = 'Category Added Successfully';
            }
            return response()->json($output, $code);
        }
    }
    public function editCategories(Request $request){
        if($request->isMethod('post'))
        {
            $input = $request->only('category','id');
            $rules = [ 
                'category' => 'required',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = ['code' => $code, 'error' => $validator->messages()->all()];
            }else{
                PromotionCategories::where('id',$request->id)->update([
                    'title' => $request->category,
                ]);
                $code = 200;
                $output = ['code' => $code, 'success' => 'Category Edited Successfully'];
            }
            return response()->json($output, $code);
        }
    }
    public function deleteCategories(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('id');
            $rules = [
                'id' => 'required',
               ];
            $validator = Validator::make($input, $rules);

            PromotionCategories::where('id',$request->id)->delete();
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => 'Promotion Categories Deleted Successfully.']];
            return response()->json($output, $code);
        } 
    }

    //      Promotion Categories Ends   //

    //      Promotion Tags Starts   //

    public function getTags(){
        $data['title'] = "Promotion Tags";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('promotions.promotion-tags',$data);
    }
    public function addTags(Request $request){
        if($request->isMethod('post'))
        {
            $input = $request->only('tag');
            $rules = [ 
                'tag' => 'required',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = $validator->messages()->all();
            }else{
                $tag = new PromotionTags;
                $tag->title = $request->tag;
                $tag->status = 1;
                $tag->save();
                $code = 200;
                $output = 'Tags Added Successfully';
            }
            return response()->json($output, $code);
        }
    }
    public function editTags(Request $request){
        if($request->isMethod('post'))
        {
            $input = $request->only('tag','id');
            $rules = [ 
                'tag' => 'required',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = ['code' => $code, 'error' => $validator->messages()->all()];
            }else{
                PromotionTags::where('id',$request->id)->update([
                    'title' => $request->tag,
                ]);
                $code = 200;
                $output = ['code' => $code, 'success' => 'Tags Edited Successfully'];
            }
            return response()->json($output, $code);
        }
    }
    public function deleteTags(Request $request)
    {
        if($request->isMethod('post'))
        {
            $input = $request->only('id');
            $rules = [
                'id' => 'required',
               ];
            $validator = Validator::make($input, $rules);

            PromotionTags::where('id',$request->id)->delete();
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => 'Promotion Tags Deleted Successfully.']];
            return response()->json($output, $code);
        } 
    }

    //      Promotion Tags Ends //

    //  Promotion Starts   //
    public function getpromotions(){
        $data['title'] = "Promotions";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['pro_cat'] = PromotionCategories::where('status',1)->get();
        $data['pro_tags'] = PromotionTags::where('status',1)->get();
        return view('promotions.view-all',$data);
    }

    public function createPromotion(Request $request){ 
        $data['title'] = "Create Promotion";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        if($request->isMethod('post'))
        { 
            $input = $request->all();
            // $rules = [ 
            //     'title' => 'required',
            //     'description' => 'required',
            //     'time' => 'required',
            //     'address' => 'required',
            //     'location' => 'required',
            //     'longitude' => 'required',
            //     'latitude' => 'required',
            //     'billing_card_name' => 'required',
            //     'billing_card_number' => 'required',
            //     'billing_card_exp_month' => 'required',
            //     'billing_card_exp_year' => 'required',
            //     'billing_card_cvv' => 'required',
            // ];
            // $validator = Validator::make($input, $rules);
            // if ($validator->fails()) {
            //     $code = 406;
            //     $output = ['code' => $code, 'messages' => $validator->messages()->all()];
            // }else{
                $repsonse = $this->_repository->createPromotion($input);
                if($repsonse){
                    $input['promotion_id'] = $repsonse->id;
                    // $this->_promotion_image_repo->assignMedia($input);
                    $code = 200;
                    $output = ['code' => $code,'promotion'=>$repsonse];
                    event(new PromotionWasCreated($repsonse->id));
                }else{
                    $code = 400;
                    $output = ['error'=>['code' => $code,'message' => ['An error occurred while creating promotion.']]];
                }
            // }
            return response()->json($output, $code);
        }
        return view('promotions.create-promotion',$data);
    }

    public function viewpromotions(){
        $data['title'] = "Edit Promotions";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        return view('promotions.view-promotion',$data);
    }

    
    /* Sara's work ends here */
}
