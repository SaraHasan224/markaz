<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Speciality;
use App\Category;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showResetForm(Request $request, $token = null)
    {
        $data['page_title'] = "Reset Password";
        $speciality  = Speciality::all();
        $data['page_bradcrum'] = "";
        $category = Category::orderBy('id','desc')->get();
        $data['category'] = $category;
        $data['speciality'] =  $speciality;
        return view('auth.passwords.reset',$data)->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
