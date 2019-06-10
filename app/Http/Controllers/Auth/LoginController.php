<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Speciality;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public $maxAttempts = 5;
    public $decayMinutes = 3;

    public function showLoginForm()
    {

        $data['page_title'] = "Login / Sign Up";
        $data['basic'] = "";
        $data['breadcrumb`'] = "";
        return view('auth.login',$data); 
    }
    protected function guard()
    {
        return Auth::guard();
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        session()->flash('message','Logged Out Successfully.');
        session()->flash('type','success');
        return redirect('/');
    }
     public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //  if(!session()->has('url.intended'))
            //  {
            //     Session::put('url.intended',URL::previous());
            //     return Redirect::to(Session::get('url.intended'));
            //  }
            dd('here');
                return redirect()->url('dashboard');
        }  
        elseif(!(Auth::attempt(['email' => $request->email, 'password' => $request->password]))) {
            $this->incrementLoginAttempts($request);
            Session::flash('type', 'info');
            session()->flash('message', 'The email address or password that you\'ve entered is incorrect.');
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
    protected function sendFailedLoginResponse()
    {
        return redirect('/login');
    }
}
