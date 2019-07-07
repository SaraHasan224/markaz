<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Markaz -Get Notify</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: { 
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				}, 
				active: function() {
					sessionStorage.fonts = true;
				}
			});
			
		</script>
		<style>
			input[type=number]::-webkit-inner-spin-button, 
			input[type=number]::-webkit-outer-spin-button { 
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			margin: 0; 
			}
		</style>
		<!--end::Web font -->

		<!--begin::Base Styles -->
		<link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
		<link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url(assets/app/media/img//bg/bg-2.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="assets/app/media/img//logos/logo-1.png">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">Sign In To Admin</h3>
							</div>
							<form class="m-login__form m-form" id="signin_form" merhod="POST">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Enter your email address" name="email" autocomplete="on">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Enter password" name="password">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<label class="m-checkbox  m-checkbox--light">
											<input type="checkbox" name="remember"> Remember me
											<span></span>
										</label>
									</div>
									<div class="col m--align-right m-login__form-right">
										<a href="javascript:;" id="m_login__forget_password" class="m-link">Forget Password ?</a>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Sign In</button>
								</div>
							</form>
						</div>
						<div class="m-login__signup">
							<div class="m-login__head">
								<h3 class="m-login__title">Sign Up</h3>
								<div class="m-login__desc">Enter your details to create your account:</div>
							</div>
							<form class="m-login__form m-form" id="signup_form" method="POST">
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} m-form__group">
									<input class="form-control m-input" type="text" placeholder="Enter your name" name="signup_name" value="{{ old('name') }}">
									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
                                	@endif
								</div>
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-form__group">
									<input class="form-control m-input" type="email" placeholder="Enter your email address" name="signup_email" autocomplete="off" value="{{ old('email') }}">
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-form__group">
									<input class="form-control m-input" type="password" placeholder="Enter your password" name="signup_password">
									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }} m-form__group">
									<input class="form-control m-input signup_phone_number" type="number" placeholder="Enter your phone number" name="signup_phone_number">
									@if ($errors->has('phone_number'))
										<span class="help-block">
											<strong>{{ $errors->first('phone_number') }}</strong>
										</span>
									@endif
								</div>
								<!-- <div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="rpassword">
								</div> -->
								<div class="row form-group m-form__group m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--light">
											<input type="checkbox" name="signup_agree">I Agree the
											<a href="#" class="m-link m-link--focus">terms and conditions</a>.
											<span></span>
										</label>
										<span class="m-form__help"></span>
									</div>
								</div>
								
								<div class="m-login__form-action">
									<button id="m_login__signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Sign Up</button>&nbsp;&nbsp;
									<button id="m_login__signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">Cancel</button>
								</div>
							</form>
						</div>
						<div class="m-login__forget-password">
								<div class="m-login__head">
									<h3 class="m-login__title">Forgotten Password ?</h3>
									<div class="m-login__desc">Enter your email to reset your password:</div>
								</div>
								<form class="m-login__form m-form" method="POST">
									<div class="form-group{{ $errors->has('reset_email') ? ' has-error' : '' }} m-form__group">
										<input class="form-control m-input" type="email" placeholder="Email" name="reset_email" id="m_email" value="{{ old('reset_email') }}" autofocus>
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
									<div class="m-login__form-action">
										<button id="forgot_pwd" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
										<button id="m_login__forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">Cancel</button>
									</div>
								</form>
							</div>
						<div class="m-login__account">
							<span class="m-login__account-msg">
								Don't have an account yet ?
							</span>&nbsp;&nbsp;
							<a href="javascript:;" id="m_login__signup" class="m-link m-link--light m-login__account-link">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->

		<!--begin::Base Scripts -->
		<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

		<script src="{{asset('assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>
		<!--end::Base Scripts -->

		<!--begin::Page Snippets -->
		<!--end::Page Snippets -->
	
		<!-- BEGIN API CONNECTIVITY -->
		<script>
            var base_url = "<?php url() ?>";
			var e = $("#m_login"),
			i = function(e, i, a) {
				var l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
				e.find(".alert").remove(), l.prependTo(e), mUtil.animateClass(l[0], "fadeIn animated"), l.find("span").html(a)
			},
			a = function() {
				e.removeClass("m-login--forget-password"), e.removeClass("m-login--signup"), e.addClass("m-login--signin"), mUtil.animateClass(e.find(".m-login__signin")[0], "flipInX animated")
			},
			l = function() {
				$("#m_login__forget_password").click(function(i) {
					i.preventDefault(), e.removeClass("m-login--signin"), e.removeClass("m-login--signup"), e.addClass("m-login--forget-password"), mUtil.animateClass(e.find(".m-login__forget-password")[0], "flipInX animated")
				}), $("#m_login__forget_password_cancel").click(function(e) {
					e.preventDefault(), a()
				}), $("#m_login__signup").click(function(i) {
					i.preventDefault(), e.removeClass("m-login--forget-password"), e.removeClass("m-login--signin"), e.addClass("m-login--signup"), mUtil.animateClass(e.find(".m-login__signup")[0], "flipInX animated")
				}), $("#m_login__signup_cancel").click(function(e) {
					e.preventDefault(), a()
				})
			};
		$('#signin_submit').click(function(event){
				event.preventDefault();
				var a = $(this),
                    l = $(this).closest("form");
                l.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        },
                        password: {
                            required: !0,
                        }
                    }
                }), l.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), 
                $.ajax({
					type: "POST",
					headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: base_url+'/user/signinweb',
					data: $("#signin_form").serialize(),
					success: function (response) {
							console.log();
						if(response.code == 200)
						{
							if(response.user.role_id == 1)
							{
								setTimeout(function() {
									a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1);
									i(l, "success", "Admin Logged In Successfully.")
								}, 2e3)
								setTimeout(function(){
									window.location.href = base_url+'/admin/dashboard';
								}, 5000);
							}else if(response.user.role_id == 2)
							{
								setTimeout(function() {
									a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1);
									i(l, "success", "Admin Logged In Successfully.")
								}, 2e3)
								setTimeout(function(){
									window.location.href = base_url+'/dashboard/'+response.user.id;
								}, 5000);
							}else{
								setTimeout(function() {
									a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1);
									i(l, "success", "You don't have defined access.")
								}, 2e3)
							}
						}
						
					},
					error: function (response) {
						if(response.responseJSON.error.code == '406')
						{
							console.log(response.responseJSON.error.messages);
							response.responseJSON.error.messages.forEach(function (msg) {
								console.log(msg);
								setTimeout(function() {
									a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), 
									i(l, "danger", msg)
								}, 2e3)
							})
						}
						else if(response.responseJSON.error != '')
						{
							setTimeout(function() {
                                a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), 
                                i(l, "danger", response.responseJSON.error.message)
                            }, 2e3)
						}

					}
				}))
		}),
		
		$('#m_login__signup_submit').click(function(event){
				event.preventDefault();
				var a = $(this),
					l = $(this).closest("form");
					
					var name = $("input[name=signup_name]").val();
					var organization = $("input[name=signup_organization]").val();
					var email = $("input[name=signup_email]").val();
					var password = $("input[name=signup_password]").val();
					var phone_number = $("input[name=signup_phone_number]").val();
					var base_url = "<?php url() ?>";
                l.validate({
                    rules: {
                        signup_name: {
                            required: !0,
                        },
						signup_organization: {
                            required: !0,
						},
                        signup_email: {
                            required: !0,
                            email: !0
                        },
                        signup_password: {
                            required: !0,
                        },
                        signup_phone_number: {
                            required: !0,
                        },
                        signup_agree: {
                            required: !0,
                        }
                    }
                }), l.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), 
                $.ajax({
					type: "POST",
					headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
						// "Content-Type": "application/json",
						// "X-Requested-With": "XMLHttpRequest"
					},
					url: base_url+'/user/signupweb',
					data: {
						name:name,
						email:email,
						password:password,
						phone_number:phone_number,
						organization: organization
					},
					success: function (response) {
						// console.log(response);
						if(response.code == 200)
						{
							setTimeout(function() {
								a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1);
								i(l, "success", "Logged In Successfully.")
							}, 2e3)
							setTimeout(function(){
								window.location.href = base_url+'/dashboard';
							}, 5000);
						}
					},
					error: function (response) {
						console.log(response.responseJSON.error);
						if(response.responseJSON.error == 406)
						{
							console.log(response.responseJSON.error.message);
							setTimeout(function() {
                                a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), 
                                i(l, "danger", response.responseJSON.error.message)
                            }, 2e3)
						}
						if(response.responseJSON.error != '')
						{
							setTimeout(function() {
                                a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), 
                                i(l, "danger", response.responseJSON.error.message)
                            }, 2e3)
						}
						if(response.responseJSON.code != '')
						{
							response.responseJSON.messages.forEach(function (msg) {
								setTimeout(function() {
									a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), 
									i(l, "danger", msg)
								}, 2e3)
							})
						}
					}
				}))
		}),
		
		$('#forgot_pwd').click(function(event){
				event.preventDefault();
				console.log(base_url+'/forgot-pwd');
				var a = $(this),
					l = $(this).closest("form");
					
					var reset_email = $("input[name=reset_email]").val();
                l.validate({
                    rules: {
                        reset_email: {
                            required: !0,
                            email: !0
                        }
                    }
                }), l.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), 
                $.ajax({
					type: "POST",
					headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
						// "Content-Type": "application/json",
						// "X-Requested-With": "XMLHttpRequest"
					},
					url: base_url+'/forgot-pwd',
					data: {
						email:reset_email,
					},
					success: function (response) {
						console.log(response.success.message);
							response.success.message.forEach(function (msg) {
								setTimeout(function() {
									a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), 
									i(l, "success", msg)
								}, 2e3)
							});
					},
					error: function (response) {
						console.log(response.responseJSON.error);
						if(response.responseJSON.error != '')
						{
							setTimeout(function() {
                                a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), 
                                i(l, "danger", response.responseJSON.error.message)
                            }, 2e3);
						}
						if(response.responseJSON.code != '')
						{
							response.responseJSON.messages.forEach(function (msg) {
								setTimeout(function() {
									a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), 
									i(l, "danger", response.responseJSON.messages)
								}, 2e3)
							});
						}
					}
				}))
		})
		</script>
		
	</body>

	<!-- end::Body -->
</html>