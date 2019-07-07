<?php $__env->startSection('profile'); ?>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        Update Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right" id="profile" method="POST"  enctype="multipart/form-data">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default result" role="alert">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">1. Admin Profile</h3>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="result"></div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="name" value="<?php echo e($logged_user->name); ?>">
                                            <input class="form-control m-input" type="hidden" name="user_id" value="<?php echo e($logged_user->id); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                        <div class="col-7">
                                            <input class="form-control m-input m-input--solid" type="text" value="<?php echo e($logged_user->email); ?>" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Phone Number</label>
                                        <div class="col-7">
                                            <input class="form-control m-input m-input--solid" type="text" value="<?php echo e($logged_user->phone_number); ?>" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Profile Image</label>
                                        <div class="col-7">
                                            <div> <img src="<?php echo e(asset('/images/user')); ?>/<?php echo e($logged_user->profile_pic); ?>" style="width:20%; height:50%;"  /> </div>
                                            <input class="form-control m-input m-input--solid" type="hidden"  name="profile_pic" value="<?php echo e($logged_user->profile_pic); ?>">
                                            <input class="form-control m-input m-input--solid" type="file"  name="profile_picture">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Role</label>
                                        <div class="col-7">
                                            <input class="form-control m-input m-input--solid" type="text" value="<?php echo e($role); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-7">
                                                <button type="submit" class="btn btn-accent m-btn m-btn--air">Save changes</button>&nbsp;&nbsp;
                                                <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_3">
                            <div class="masonry-wrapper">
                                <div class="masonry">
                                <?php if($media != ''): ?>
                                    <?php $__currentLoopData = $media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($m->media_id)): ?>
                                        <div class="masonry-item">
                                            <img src="<?php echo e(asset('images/promotion_media/'.$m->media_id)); ?>" alt="Dummy Image"
                                                class="masonry-content">
                                        </div>
                                    <?php else: ?>
                                        No image added to account
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>