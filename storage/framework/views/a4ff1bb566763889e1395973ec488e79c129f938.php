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
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default" role="alert">
                                            The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">1. Personal Details</h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" value="Mark Andre">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Occupation</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" value="CTO">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" value="Keenthemes">
                                            <span class="m-form__help">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">2. Social Links</h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Linkedin</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" value="www.linkedin.com/Mark.Andre">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Facebook</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" value="www.facebook.com/Mark.Andre">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Twitter</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" value="www.twitter.com/Mark.Andre">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Instagram</label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" value="www.instagram.com/Mark.Andre">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-7">
                                                <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                                <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_2">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-outline-info btn-sm m-btn m-btn--custom" style="float:right; margin:0 20px" onclick="window.location='<?php echo e(url('/edit-user-info')); ?>';">Edit Profile</button>
							</div>
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
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the
										printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                                        <br/>
                                        <br/>
                                        <b><h5>Location: </h5></b>LAHORE:SAPPHIRE GULBERG:9-C/K College Rd, Gulberg 2, Lahore.PH # 042-35754306-8,Timings: Mon - Sat 11 am - 11 pm,Sun 2 pm - 11 pm
                                            location_on
                                            KARACHI:SAPPHIRE LUCKY ONE:Shop No. G33/F22-23, LuckyOne Mall, LA-2/B, Block 21, Opp. UBL Sports Complex, Rashid Minhas Rd.PH # 021-37181029-30
                                        
                                       
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
                                         <br/>
                                        <br/>
                                        <b><h5>Address: </h5></b>Plot#501، National Highway, Karachi, Sindh.
                                        <!--end::Portlet-->
                                        <br/>
                                        <br/>
                                        <b><h5>Tel: </h5></b>
                                        +92 311 1163163
                                        +9 555 5255
                                        <!--end::Portlet-->
                                        <br/>
                                        <br/>
                                        <b><h5>Website: </h5></b>
                                        orient-textile.com/
                                        <!--end::Portlet-->
                                        <br/>
                                        <br/>
                                        <b><h5>Email Address: </h5></b>
                                        mail@withinpixels.com
                                        mail@creapond.com
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