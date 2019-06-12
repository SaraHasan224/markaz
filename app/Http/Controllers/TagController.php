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

class TagController extends Controller
{
          
    //      Promotion Tags Starts   //

    public function getTags($store_id = ''){
        $data['title'] = "Tags";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();

        $data['role'] = session()->get('role_name');
        $data['store_id'] = $store_id;

        $data['logged_user'] = $getuser;
        return view('promotions.promotion-tags',$data);
    }
    public function addTags(Request $request,$store_id = ''){
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
                $tag->store_id = $store_id;
                $tag->status = 1;
                $tag->save();
                $code = 200;
                $output = 'Tags Added Successfully';
            }
            return response()->json($output, $code);
        }
    }
    public function editTags(Request $request,$store_id = ''){
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
    public function deleteTags(Request $request,$store_id = '')
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

}
