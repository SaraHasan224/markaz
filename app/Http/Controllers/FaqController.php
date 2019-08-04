<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\EventLog,
    App\Faq,
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
        if($store_id != null)
        {
            $data['store_id'] = $store_id;
            $data['role'] = session()->get('role_name');
            $data['store'] = Store::where('id',$store_id)->first();
            $data['stores'] = Store::where('user_id',$user_id)->get();
            $data['questions'] = Faq::where('store_id',$store_id)->get();
            return view('faq.view',$data);
        }else{
            $data['questions'] = [];
            $data['store'] = [];
            $data['role'] = session()->get('role_name');
            $data['store_id'] = '';
            $data['stores'] = Store::where('user_id',$user_id)->get();
            $data['questions'] = Faq::where('store_id',0)->get();
            return view('faq.view',$data);
            // return view('faq.error',$data);
        }
    }
    
    public function add($store_id = null)
    {
        $user_id = request()->session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
        $data['logged_user'] = $getuser;
        if($store_id == null)
        {
            $data['store'] = '';
        }else{
            $data['store'] = Store::where('id',$store_id)->first();
        }
        return view('faq.add-faqs',$data);
    }
    
    public function manage($store_id = null)
    {
        $user_id = request()->session()->get('user_id');
        $getuser = User::where('id',$user_id)->with('permissions')->with('roles')->first();
        $data['logged_user'] = $getuser;
        $data['title'] = 'Frequently Asked Questions';
        if($store_id == null)
        {
            // return view('faq.error');
            $data['store'] = [];
            $data['role'] = session()->get('role_name');
            $data['store_id'] = '';
            $data['stores'] = Store::where('user_id',$user_id)->get();
            return view('faq.view-all',$data);
        }else{
            $data['store'] = Store::where('id',$store_id)->first();
            $data['role'] = session()->get('role_name');
            $data['store_id'] = $store_id;
            $data['stores'] = Store::where('user_id',$user_id)->get();
            return view('faq.view-all',$data);
        }
    }
    
    public function createFaq(Request $request){
        $input = $request->only('title', 'description','store_id');
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'store_id' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $faq = new Faq;
            $faq->title = $request->title;
            $faq->description = $request->description;
            $faq->store_id = ($request->store_id == '') ? 0 : $request->store_id;
            $faq->save();


            EventLog::create([
                'component' => 'FAQ : '.$request->title,
//                    'component_name' => ,
                'operation' => 'added',
                'user_id'   =>session()->get('user_id'),
            ]);
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


            EventLog::create([
                'component' => 'FAQ : '.$faq->title,
                'operation' => 'edited',
                'user_id'   =>session()->get('user_id'),
            ]);
            if($faq){
                $faq->title = $request->input('title');
                $faq->description = $request->input('description');
                $faq->store_id = $request->input('store_id');
                $faq->save();
            }
            if($faq){
                $code = 200;

                EventLog::create([
                    'component' => 'FAQ : '.$request->input('title'),
                    'operation' => 'edited successfully',
                    'user_id'   =>session()->get('user_id'),
                ]);
                $output = ['code' => $code,'message'=>"Faq has been updated!!"];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while updating faq.']]];
            }
         }
        return response()->json($output, $code);
    }
    public function FAQStatusUpdate(Request $request,$store_id = null){
        $input = $request->only('id','status');
        $rules = [
            'id' => 'required',
            'status' => 'required'
        ]; 
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $status = ($request->status == 1)  ? 0 : 1;
            $faq = Faq::where('id',$request->id)->first();
            if($faq){
                EventLog::create([
                    'component' => 'FAQ : '.$faq->title,
                    'operation' => 'status updated',
                    'user_id'   =>session()->get('user_id'),
                ]);
                $faq->update(['status' => $status]);
                $code = 200;
                $output = ['code' => $code,'faq'=>"Faq status Updated!!"];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while deleting faq.']]];
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
            $faq = Faq::find($request->id)->first();
            EventLog::create([
                'component' => 'FAQ : '.$faq->title,
//                    'component_name' => ,
                'operation' => 'deleted',
                'user_id'   =>session()->get('user_id'),
            ]);
            $faq->delete();
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