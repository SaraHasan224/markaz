
@extends('content.includes.signin_header')

@section('content')
<!-- Top Header Secure Shopping ---->
<!--- Sign in Sign Up Page -->
<div class="signin-page">
  <div class="container-fluid ">
    <div class="container">
      <div class="row sign-frm-row">
        <div class="col-md-4 col-sm-12 col-xs-12"><a href="{{route('home')}}"><img src="{{asset('assets/content/images/logo.png')}}"></a></div>
        <div class="col-md-8 col-sm-12 col-xs-12 signin-form">                            
        <form class="main-form full" action="{{ route('login') }}" method="POST" >{!! csrf_field() !!}

            <div class="row">
              <div class="form-group col-md-5 col-sm-12  col-xs-12">
                <input type="email" class="form-control" id="login-email" placeholder="Enter Email Address" name="email" >
              </div>
              <div class="form-group col-md-5 col-sm-12 col-xs-12">
                <input type="password" class="form-control" id="login-pass" placeholder="Enter Password" name="password"> 
              </div>
              

              <div class="col-md-2">
                <button type="submit" class="btn btn-default submit_login">Submit</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5  col-xs-4 col-sm-5">
                <div class="checkbox forget-password-link">
                  <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember_me" class="checkbox">
                  Remember me</label>
                </div>
              </div>
              <div class="col-md-5 col-xs-6 col-sm-5 forget-password-link"> 
                <a title="Forgot Password" class="forgot-password mtb-20" href="{{ route('password.request') }}" >Forgot your password?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container signup-cnt">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-12 signup-content">
          <p> By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more. </p>
        </div> 
        <div class="col-md-6 col-xs-12 col-sm-12 sign-up-form">
          <h2>Create an account</h2>

          <form class="main-form full" action="{{ route('register') }}" method="post">{!! csrf_field() !!}
            <div class="row">
              <div class="form-group col-md-6 col-xs-6 col-sm-6">
                <input type="text" class="form-control" id="fname" name="first_name" value="{{ old('first_name') }}" required placeholder="First Name"> 
              </div>
              <div class="form-group col-md-6 col-xs-6 col-sm-6">
                <input type="text" class="form-control" id="lname" name="last_name" value="{{ old('last_name') }}" required placeholder="Last Name">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12 col-xs-12 col-sm-12">
                <input type="text" class="form-control" id="address" name="email" value="{{ old('email') }}" required placeholder="Email Address">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-xs-6 col-sm-6">
                <input type="password" class="form-control" id="pwd" name="password" required placeholder="Enter your Password">
              </div>
              <div class="form-group col-md-6 col-xs-6 col-sm-6">
                <input type="password" class="form-control" id="pwd" name="password_confirmation" required placeholder="Re-enter your Password">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="checkbox">
                  <label>
                  <input type="checkbox" name="remember" required class="checkbox">
                  I Agree To All <a href="{{ route('terms-condition') }}" class="link">Terms & Condition</a> and <a class="link" href="{{ route('secure-shopping') }}">Privacy Policy</a> 
                  </label>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-default">Sign Up</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container signin-copyright">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p>Copyright &copy; {!! $basic->copy_text !!} The TroutFitter  | All Rights Reserved | Powered by <a href="https://clickysoft.com/">ClickySoft.</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
