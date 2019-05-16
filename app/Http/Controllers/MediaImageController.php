<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MediaImages;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use App\Data\Repositories\MediaImageRepository;
use Validator,Illuminate\Validation\Rule, Image, Storage, Carbon\Carbon;

class MediaImageController extends Controller
{
    public function __construct(MediaImageRepository $MediaImage) {
        $this->_repository = $MediaImage;
    }


    public function uploadImage(Request $request){
        $input = $request->only('image');

        $rules = [ 
             'image'     =>  'required',
             'image' => 'mimes:jpeg,jpeg,png'
            ];

            $messages = [ ];
           
            $validator = Validator::make( $input, $rules, $messages);
    
            if ($validator->fails()) {
                $code = 406;
                $output = ['error'=>['code'=>$code,'messages'=>$validator->messages()->all()]];

            } else{
               $file_name = $input['image']->store(config('app.files.promotion.folder_name'));
              $input['image'] = $input['image']->hashName();
    

            $repsonse = $this->_repository->uploadImage($input);
                if($repsonse) {

                    $code = 200;
                    $output = ['response'=>['code' => $code,'messages' => ['Image is uploaded successfully.'], 'data' => $repsonse]];

                } else {
                    $code = 400;
                    $output = ['error'=>['code' => $code,'message' => ['An error occurred while uploading image.']]];
                }


            }
            return response()->json($output, $code);
            
    }


}
