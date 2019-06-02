<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Faq,
    App\Store,
    App\User;
use Validator,Illuminate\Validation\Rule, Session,Image, Storage, Carbon\Carbon;
class FaqController extends Controller
{
    public function view($store_id = null)
    {
        $user_id = request()->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['store'] = Store::where('id',$store_id)->first();
        $data['questions'] = Faq::where('store_id',$store_id)->get();
        return view('faq.view',$data);
    }
    
    public function add($store_id = null)
    {
        $user_id = request()->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['store'] = Store::where('id',1)->first();
        return view('faq.add-faqs',$data);
    }
    
    public function manage($store_id = null)
    {
        $user_id = request()->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        $data['store'] = Store::where('id',$store_id)->first();
        $data['title'] = 'Frequently Asked Questions';
        return view('faq.view-all',$data);
    }
    
    public function createFaq(Request $request){
        $input = $request->only('title', 'description','store_id','user_id');
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'store_id' => 'required',
            'user_id' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $faq = new Faq;
            $faq->title = $request->title;
            $faq->description = $request->description;
            $faq->store_id = $request->store_id;
            $faq->user_id = $request->user_id;
            $faq->save();
            if($faq){
                $code = 200;
                $output = ['code' => $code,'faq'=>"Faq has been saved!!"];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while creating faq.']]];
            }
         }
        return response()->json($output, $code);
    }
    public function getSpecificQuestion(Request $request,$id = null){
        if($request->isMethod('post'))
        {
            $findQuestion = Faq::whereId($id)->first();
            $code = 200;
            $output = ['success'=>['code' => $code,'message' => $findQuestion]];
            return response()->json($output, $code);
        }
    }
    public function updateFaq(Request $request){
        $input = $request->only('id','title', 'description','store_id');
        $rules = [
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'store_id' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $faq = Faq::find($request->input('id'));
            
            if($faq){
                $faq->title = $request->input('title');
                $faq->description = $request->input('description');
                $faq->store_id = $request->input('store_id');
                $faq->save();
            }
            if($faq){
                $code = 200;
                $output = ['code' => $code,'message'=>"Faq has been updated!!"];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while updating faq.']]];
            }
         }
        return response()->json($output, $code);
    }
    public function deleteFaq(Request $request,$store_id = null){
        $input = $request->only('id');
        $rules = [
            'id' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $faq = Faq::find($request->id)->delete();
            if($faq){
                $code = 200;
                $output = ['code' => $code,'faq'=>"Faq has been deleted!!"];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while deleting faq.']]];
            }
         }
        return response()->json($output, $code);
    }
    function getAllFaqs(){
        $faqs = Faq::all();
        return response()->json($faqs);
    }
}