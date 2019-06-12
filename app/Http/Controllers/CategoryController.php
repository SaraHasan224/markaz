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

class CategoryController extends Controller
{
     
    //      Promotion Categories Starts //

    public function getCategories($store_id = ''){
        $data['title'] = "Categories";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['role'] = session()->get('role_name');
        $data['logged_user'] = $getuser;
        $data['store_id'] = $store_id;
        return view('promotions.promotion-categories',$data);
    }
    public function addCategories(Request $request,$store_id = ''){
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
                $category->store_id = $store_id;
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

}
