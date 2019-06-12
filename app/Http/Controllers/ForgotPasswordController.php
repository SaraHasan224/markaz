<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB,
    App\User;
use App\TraitsFolder\CommonTrait;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Events\UserWasCreated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use App\Data\Repositories\UserRepository;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator,Illuminate\Validation\Rule, Session,Image, Storage, Carbon\Carbon;


class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;
    use CommonTrait;
    public function __construct(UserRepository $user) { 
        $this->_repository = $user;
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->first();
    }

    public function forgotpwd(Request $request){
        $input = $request->only('email');
        $rules = [
            'email' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = ['code' => $code, 'messages' => $validator->messages()->all()];
        }else{
            $us = User::whereEmail($request->email)->count();
            if ($us == 0)
            {
                $code = 400;
                $repsonse = "We can't find a user with this email-address";
                // $output = ['code' => $code,'user'=>$repsonse];
                $output = ['error'=>['code' => $code,'message' => ['We can\'t find a user with this email-address']]];
            }else{
                $user1 = User::whereEmail($request->email)->first();
                $route = 'password.reset';
                $code = 200;
                $repsonse = "Password Reset Link Send Your E-mail";
                $output = ['success'=>['code' => $code,'message' => ['Password Reset Link Send Your E-mail']]];
            }               
        }
        return response()->json($output, $code);
        
    }

}
