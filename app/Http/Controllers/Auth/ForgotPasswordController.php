<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\TraitsFolder\CommonTrait;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Speciality;
use App\Category;
class ForgotPasswordController extends Controller
{
    use CommonTrait;
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showLinkRequestForm()
    {
        $data['page_title'] = "Password Reset";
        $speciality  = Speciality::all();
        $data['page_bradcrum'] = "";
        $category = Category::orderBy('id','desc')->get();
        $data['category'] = $category;
        $data['speciality'] =  $speciality;

        return view('auth.passwords.email',$data);
    }
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $us = User::whereEmail($request->email)->count();
        if ($us == 0)
        {
            session()->flash('message','We can\'t find a user with that e-mail address.');
            session()->flash('type','danger');
            return redirect()->back();
        }else{
            $user1 = User::whereEmail($request->email)->first();
            $route = 'password.reset';
            $this->userPasswordReset($user1->email,$user1->first_name,$route);
            session()->flash('message','Password Reset Link Send Your E-mail');
            session()->flash('type','success');
            return redirect()->back();
        }

    }
}
