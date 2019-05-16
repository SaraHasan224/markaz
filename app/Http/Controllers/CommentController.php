<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PromotionComment;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use App\Data\Repositories\CommentRepository;
use Validator,Illuminate\Validation\Rule, Image, Storage, Carbon\Carbon;

class CommentController extends Controller
{
    public function __construct(CommentRepository $commentRepo) {
        $this->_repository = $commentRepo;
    
    }

    public function addCommentToPromotion(Request $request){
        $input = $request->only('user_id', 'promotion_id','comment');
        $rules = [
            'promotion_id' => 'required',
            'user_id' => 'required',
            'comment'=>'required',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $repsonse = $this->_repository->addComment($input);
            if($repsonse){
                $code = 200;
                $output = ['code' => $code,'response'=>$repsonse];
                
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while adding comment.']]];
            }
        }

        return response()->json($output,$code);

    }

    public function getCommentsByPromotionId(Request $request){
        $input = $request->only('promotion_id');
        $rules = [
            'promotion_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $code = 200;
            $output = $this->_repository->getCommentsOfPromotion($input);
           
        }
        return response()->json($output,$code);
    }
}
