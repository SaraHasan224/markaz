<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories,
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
                $category = new Categories;
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
                Categories::where('id',$request->id)->update([
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

            Categories::where('id',$request->id)->delete();
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
                $tag = new Tags;
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
                Tags::where('id',$request->id)->update([
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

            Tags::where('id',$request->id)->delete();
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
        return view('promotions.view-all',$data);
    }

    public function createPromotion(Request $request){ 
        $data['title'] = "Create Promotion";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['getstore'] = Store::where('id',1)->first();
        $data['logged_user'] = $getuser;
        $data['pro_cat'] = Categories::where('status',1)->get();
        $data['pro_tags'] = Tags::where('status',1)->get();
        if($request->isMethod('post'))
        { 
            $input = $request->all();
            $repsonse = $this->_repository->createPromotion($input);
            if($repsonse){
                foreach($request->category as $category)
                {
                    $cat = new PromotionCategories;
                    $cat->title = $category;
                    $cat->promotion_id = $repsonse->id;
                    $cat->save();
                }
                foreach($request->tags as $tag)
                {
                    $cat = new PromotionTags;
                    $cat->title = $tag;
                    $cat->promotion_id = $repsonse->id;
                    $cat->save();
                }
                $input['promotion_id'] = $repsonse->id;
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

            Promotion::where('id',$request->id)->delete();
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => 'Promotion Deleted Successfully.']];
            return response()->json($output, $code);
        } 
    }
    public function editpromotions($id = ''){
        $data['title'] = "Edit Promotions";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['promotion'] = Promotion::where('id',$id)->first();
        $data['promotion_media'] = PromotionMedia::where('promotion_id',$id)->get(); 
        $data['promotion_comments'] = PromotionComment::where('promotion_id',$id)->get(); 
        return view('promotions.view-promotion',$data);
    }

    
    /* Sara's work ends here */
}
