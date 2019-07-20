<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;
use App\Data\Repositories\FollowerRepository;
use Validator,Illuminate\Validation\Rule, Image, Storage, Carbon\Carbon;

class FollowerController extends Controller
{
    public function __construct(FollowerRepository $followerRepo) {
        $this->_repository = $followerRepo;
    
    }

    public function becomeFollower(Request $request){
        $input = $request->only('store_id', 'user_id');
        $rules = [
            'store_id' => 'required',
            'user_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
         
           $repsonse = $this->_repository->becomeFollower($input);
            if($repsonse){
                $code = 200;
                $output = ['code' => $code,'response'=>'You become the follower'];
                
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while becoming follower.']]];
            }
            
         }
        return response()->json($output, $code);
    }

    public function unFollow(Request $request){
        $input = $request->only('store_id', 'user_id');
        $rules = [
            'store_id' => 'required',
            'user_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
           $repsonse = $this->_repository->unFollow($input);
            if($repsonse){
                $code = 200;
                $output = ['code' => $code,'response'=>'You have unfollowed this store'];
                
            }else{
                $code = 400;
                $output = ['error'=>['code' => $code,'message' => ['An error occurred while unfollowing.']]];
            }
            
         }
        return response()->json($output, $code);
    }


    public function findFollowerOfStore(Request $request){
        $input = $request->only('store_id');
        $rules = [
            'store_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $code = 200;
            $output = $this->_repository->getFollowerOfStore($input);
           
        }
        return response()->json($output,$code);

    }


    public function findFollowerOfUser(Request $request){
        $input = $request->only('user_id');
        $rules = [
            'user_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $code = 200;
            $output = $this->_repository->getFollowerOfUser($input);
           
        }
        return response()->json($output,$code);

    }
}
