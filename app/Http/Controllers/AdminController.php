<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Events\UserWasCreated;
use Illuminate\Support\Str;
use App\Data\Repositories\UserRepository;
use Validator,Illuminate\Validation\Rule, Image, Storage, Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(UserRepository $user) {
        $this->_repository = $user;
    }

    public function getProfile(){
        $user = JWTAuth::parseToken()->ToUser();
        return response()->json(['user'=>$user]);
    }
}
