<?php $__env->startSection('styles'); ?>
<style>
			input[type=number]::-webkit-inner-spin-button, 
			input[type=number]::-webkit-outer-spin-button { 
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			margin: 0; 
			}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator"><?php echo e($title); ?></h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="<?php echo e(url('/')); ?>" class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="<?php echo e(url('users')); ?>" class="m-nav__link">
                            <span class="m-nav__link-text"><?php echo e($title); ?></span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript:void(0);" class="m-nav__link">
                            <span class="m-nav__link-text"><?php echo e($sub_title); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">

                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    <?php echo e($sub_title); ?>

                                </h3>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="<?php echo e($table_id); ?>" method="POST"  enctype="multipart/form-data">
                        <div class="m-portlet__body">
                        <div id="result" style="padding: 10px;"></div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Username:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" name="name" class="form-control m-input" placeholder="Enter username" value="<?php echo e(($user) ? $user->name : ''); ?>">
                                    </div>
                                    <span class="m-form__help">Enter user name</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Email Address:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="email" name="email" class="form-control m-input" value="<?php echo e(($user) ? $user->email : ''); ?>"
                                            placeholder="Enter email-address">
                                    </div>
                                        <span class="m-form__help">Enter email-address</span>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> m-form__group row">
                                <div class="col-lg-6">
                                    <label>Password:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="password" name="password" class="form-control m-input"
                                            placeholder="Enter password">
                                    </div>
                                    <span class="m-form__help">Enter password</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Contact Number:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="number" name="phone_number" class="form-control m-input" value="<?php echo e(($user) ? $user->phone_number : ''); ?>"
                                            placeholder="Enter contact number">
                                    </div>
                                    <span class="m-form__help">Enter contact number</span>
                                </div>
                            </div> 
                            <div class="form-group<?php echo e($errors->has('role_id') ? ' has-error' : ''); ?> m-form__group row">
                                <div class="col-lg-6">
                                    <label>Assign Role:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <select class="form-control m-input m-input--square" id="role_id" name="role_id">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
    											<option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
                                    </div>
                                    <span class="m-form__help">Assign role to user</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Profile Picture:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="file" name="profile_pic" class="form-control m-input" accept="image/png, image/jpeg, image/jpg, image/pneg">
                                    </div>
                                    <span class="m-form__help">Select a profile  picture</span>
                                </div>
                            </div> 
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="<?php echo e(url('users')); ?>" class="btn btn-secondary">Cancel</a>
                                    </div>
                                    <div class="col-lg-6 m--align-right">
                                        <button type="submit" class="btn btn-primary <?php echo e($table_id); ?>">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?> 
<script>
    var base_url = "<?php url() ?>";
    // console.log(base_url+'/user/signinweb');
    $('.create_user').click(function(event){	 
        event.preventDefault();
        var formData = new FormData($('#create_user')[0]);
        // console.log(formData);
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
                        },
                        name: {
                            required: !0,
                        },
                        phone_number: {
                            required: !0,
                        },
                        role_id: {
                            required: !0,
                        }
                    }
                }), l.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0),
                $.ajax({
					type: "POST",
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData:false,
                    cache:false,
					headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					},
                    url: base_url+'/add-user', 
    		        data: formData,
					success: function (response) {
                        console.log(response);
						if(response.code == 200)
						{
                            a.removeClass("m-loader m-loader--right m-loader--light");
                            document.getElementById("create_user").reset();
                            $('#result').append('<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="flaticon-danger"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>User Created Successfully.</div>')
                            setTimeout(function() {
                                window.location.reload();
							}, 2e3);
							}
					},
					error: function (response) {
                        // console.log(response.responseJSON.messages);
                        a.removeClass("m-loader m-loader--right m-loader--light");
                        response.responseJSON.messages.forEach(function (msg) {
                            $('#result').append('<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="flaticon-danger"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+msg+'.</div>')
							});
                            setTimeout(function() {
                                window.location.reload();
							}, 2e3);
					}
				}));
   	});


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>