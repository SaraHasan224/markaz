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
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right" id="profile" method="POST">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default" role="alert">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">1. Company Information</h3>
                                        </div>
                                        <div id="result"></div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="name" value="<?php echo e($logged_user->name); ?>">
                                            <input class="form-control m-input" type="hidden" name="user_id" value="<?php echo e($logged_user->id); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Role</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="position" value="<?php echo e($logged_user->position); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company" value="<?php $store != '' ? $store->name : '' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Address</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company_address" value="<?php $store != '' ? $store->address : '' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Telephone</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company_telephone" value="<?php $store != '' ? $store->telephone : '' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Website</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company_website" value="<?php $store != '' ? $store->websitelink     : '' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Contact Email Address</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="company_email" value="<?php $store != '' ? $store->emailaddress : '' ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Information</label>
                                        <div class="col-7">
                                        <textarea class="form-control" id="m_clipboard_3" name="company_info" rows="6"><?php $store != '' ? $store->desciption : '' ?></textarea>
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
                                            <input class="form-control m-input" type="text" name="fb_link" value="<?php empty($social) ? 'Enter facebook link' : $social->facebook_link ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Twitter</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="tw_link" value="<?php empty($social) ? 'Enter twitter link' : $social->twitter_link ?>">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Instagram</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text"  name="insta_link" value="<?php empty($social) ? 'Enter instagram link' : $social->insta_link  ?>">
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
										<?php $store != '' ? $store->desciption : ''?>
                                        <br/>
                                        <br/>
                                        <b><h5>Location: </h5></b>
										    <?php $store != '' ? $store->address : ''?>
                                       
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
                                        <?php $store != '' ? $store->telephone : ''?>
                                        <!--end::Portlet-->
                                        <br/>
                                        <br/>
                                        <b><h5>Website: </h5></b>
                                        <?php $store != '' ? $store->websitelink : ''?>
                                        <!--end::Portlet-->
                                        <br/>
                                        <br/>
                                        <b><h5>Email Address: </h5></b>
                                        <?php $store != '' ? $store->emailaddress : ''?>
                                        <!--end::Portlet-->
									</div>
								</div>

								<!--end::Portlet-->
							</div>
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_3">
                            <div class="masonry-wrapper">
                                <div class="masonry">
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/325?image=100" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/450?image=200" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/280?image=300" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/540?image=400" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/380?image=500" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/300?image=600" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/400?image=700" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/300?image=800" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/280?image=900" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/480?image=925" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/550?image=950" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/600?image=1000" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/325?image=25" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/450?image=50" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/280?image=75" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/540?image=100" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/380?image=125" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/300?image=161" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/400?image=175" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/300?image=200" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/280?image=225" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/480?image=250" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/550?image=275" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/600?image=300" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/325?image=13" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/450?image=26" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/280?image=39" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/540?image=52" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/380?image=65" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                    <div class="masonry-item">
                                        <img src="https://picsum.photos/450/300?image=78" alt="Dummy Image"
                                            class="masonry-content">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>