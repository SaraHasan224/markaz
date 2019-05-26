<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use Validator,Illuminate\Validation\Rule, Session,Image, Storage, Carbon\Carbon;

class FaqController extends Controller
{
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
            $faq->title = $request->input('title');
            $faq->description = $request->input('description');
            $faq->store_id = $request->input('store_id');
    
            
    
           $repsonse = $faq->save();
            if($repsonse){
                $code = 200;
                $output = ['code' => $code,'faq'=>"Faq has been saved!!"];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while creating faq.']]];
            }
         }
        return response()->json($output, $code);
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
                $output = ['code' => $code,'faq'=>"Faq has been updated!!"];
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while updating faq.']]];
            }
         }
        return response()->json($output, $code);
    }


    public function deleteFaq(Request $request){
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
                $faq->delete();
            }

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
