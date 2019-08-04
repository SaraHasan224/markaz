<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories,
    App\EventLog,
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
use App\Data\Repositories\CategoryRepository;

class CategoryController extends Controller
{
     

    public function __construct(CategoryRepository $category) {
        $this->_repository = $category;
    }

    //      Promotion Categories Starts //

    public function getCategories(){
        $data['title'] = "Categories";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['role'] = session()->get('role_name');
        $data['logged_user'] = $getuser;
        return view('categories.categories',$data);
    }
    public function addCategories(Request $request,$store_id = ''){
        if($request->isMethod('post'))
        {
            $input = $request->only('category','category_image');
            $rules = [ 
                'category' => 'required',
                'category_image' => 'required'
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = $validator->messages()->all();
            }else{
                if($request->hasFile('category_image'))
                { 
                    $img_tmp = Input::file('category_image');
                    if($img_tmp->isValid())
                    {
                        $extension = $img_tmp->getClientOriginalExtension();
                        $cat_image = rand(111,99999).".".$extension;
                        $image_path = public_path('/images/category').'/'.$cat_image;
                        Image::make($img_tmp)->save($image_path);          
                    }         
                }
                EventLog::create([
                    'component' => 'Category : '.$request->category,
//                    'component_name' => ,
                    'component_image' => $cat_image,
                    'operation' => 'added',
                    'user_id' => session()->get('user_id'),
                ]);
                $category = new Categories;
                $category->title = $request->category;
                $category->image = $cat_image;
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
            $input = $request->only('category','id','category_image','cat_image');
            $rules = [ 
                'category' => 'required',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $code = 406;
                $output = ['code' => $code, 'error' => $validator->messages()->all()];
            }
            else{
                $image_path = '';
                $cat_image = '';
                if($request->hasFile('category_image'))
                { 
                    $img_tmp = Input::file('category_image');
                    if($img_tmp->isValid())
                    {
                        $extension = $img_tmp->getClientOriginalExtension();
                        $cat_image = rand(111,99999).".".$extension;
                        $image_path = public_path('images/category').'/'.$cat_image;
                        Image::make($img_tmp)->save($image_path);          
                    }         
                }
                $category = Categories::where('id',$request->id)->first();
                EventLog::create([
                    'component' => 'Category : '.$category->title,
                    'component_image' =>$category->image,
                    'operation' => 'edited',
                    'user_id' => session()->get('user_id'),
                ]);
                $category->update([
                    'title' => $request->category,
                    'image' => ($cat_image != '') ? $cat_image : $request->cat_image
                ]);
                EventLog::create([
                    'component' => 'Category : '.$request->category,
                    'component_image' => ($cat_image != '') ? $cat_image : $request->cat_image,
                    'operation' => 'edited successfully',
                    'user_id' => session()->get('user_id'),
                ]);
            }
                $code = 200;
                $output = ['code' => $code, 'success' => 'Category Edited Successfully'];
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

            $category = Categories::where('id',$request->id)->first();
            EventLog::create([
                'component' => 'Category : '.$category->title,
//                    'component_name' => ,
                'component_image' => $category->image,
                'operation' => 'deleted',
                'user_id' => session()->get('user_id'),
            ]);
            $category->delete();
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => 'Category Deleted Successfully.']];
            return response()->json($output, $code);
        } 
    }
    

    //      Promotion Categories Ends   //

    /**
     * Usman work for app
    */

    /**
      * Get All Cateogry
    */

      public function all(Request $request) {
        $input = $request->only('pagination','keyword','limit');
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

}