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
                        <?php if(Session::get('role_name') == 'Store Admin' && $store != ''): ?>  
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                        Photos & Videos
                                    </a>
                                </li>
                        <?php endif; ?>
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
                                            <h3 class="m-form__section">1. Company Information</h3>
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
                                        <label for="example-text-input" class="col-2 col-form-label">Role</label>
                                        <div class="col-7">
                                            <div> <img src="<?php echo e(asset('/images/user')); ?>/<?php echo e($logged_user->profile_pic); ?>" style="width:20%; height:50%;"  /> </div>
                                            <input class="form-control m-input m-input--solid" type="hidden"  name="profile_pic" value="<?php echo e($logged_user->profile_pic); ?>">
                                            <input class="form-control m-input m-input--solid" type="file"  name="profile_picture">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Role</label>
                                        <div class="col-7">
                                            <input class="form-control m-input m-input--solid" type="text" value="<?php echo e($role->name); ?>" readonly>
                                        </div>
                                    </div>
                        <?php if(Session::get('role_name') == 'Store Admin' && $store != ''): ?>  
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company" value="<?php echo e(!empty($store) ? $store->name : ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Address</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company_address" value="<?php echo e(!empty($store) ? $store->address : ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Telephone</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company_telephone" value="<?php echo e(!empty($store) ? $store->telephone : ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Website</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company_website" value="<?php echo e(!empty($store) ? $store->websitelink : ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Contact Email Address</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company_email" value="<?php echo e(!empty($store) ? $store->emailaddress : ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Information</label>
                                        <div class="col-7">
                                        <textarea class="form-control" id="m_clipboard_3" name="company_info" rows="6"><?php echo e(!empty($store) ? $store->desciption : ''); ?></textarea>
                                        </div>
                                    </div>       
                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">2. Social Links</h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Facebook</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="fb_link" value="<?php echo e(!empty($social) ? $social->facebook_link : ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Twitter</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="tw_link" value="<?php echo e(!empty($social) ? $social->twitter_link : ''); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Instagram</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text"  name="insta_link" value="<?php echo e(!empty($social) ? $social->insta_link : ''); ?>">
                                        </div>
                                    </div>
                                    <?php endif; ?>  
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
                        <div class="tab-pane " id="m_user_profile_tab_2">
                          
                            <div style="margin-top:100px;">
                            </div>
                                            
                            <div class="col-lg-12">

								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="flaticon-statistics"></i>
												</span>
												<h3 class="m-portlet__head-text">
													<b>About Company</b>
												</h3>
												<h2 class="m-portlet__head-label m-portlet__head-label--info">
													<span>General Information</span>
												</h2>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<?php echo e(!empty($store) ? $store->desciption : ''); ?>

                                        <br/>
                                        <br/>
                                        <b><h5>Location: </h5></b>
										<?php echo e(!empty($store) ? $store->address : ''); ?>

                                       
									</div>
								</div>

								<!--end::Portlet-->


								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h2 class="m-portlet__head-label m-portlet__head-label--primary">
													<span>Contact Information</span>
												</h2>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										 <!--end::Portlet-->
                                        <b><h5>Tel: </h5></b>
                                        <?php echo e(!empty($store) ? $store->telephone : ''); ?>

                                        <!--end::Portlet-->
                                        <br/>
                                        <br/>
                                        <b><h5>Website: </h5></b>
                                        <?php echo e(!empty($store) ? $store->websitelink : ''); ?>

                                        <!--end::Portlet-->
                                        <br/>
                                        <br/>
                                        <b><h5>Email Address: </h5></b>
                                        <?php echo e(!empty($store) ? $store->emailaddress : ''); ?>

                                        <!--end::Portlet-->
									</div>
								</div>

								<!--end::Portlet-->
							</div>
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