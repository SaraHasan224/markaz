@extends('layouts.header')

@section('styles')
<style>
    .masonry-wrapper {
    padding: 1.5em;
    max-width: 800px;
    margin-right: auto;
    margin-left: auto;
    }
    .masonry {
    columns: 1;
    column-gap: 10px;
    }
    .masonry img{
        width: 100%;
    }
    .masonry-item {
    display: inline-block;
    vertical-align: top;
    margin-bottom: 10px;
    }
    @media only screen and (max-width: 1023px) and (min-width: 768px) {  .masonry {
        columns: 2;
    }
    }
    @media only screen and (min-width: 1024px) {
    .masonry {
        columns: 3;
    }
    }
    .masonry-item, .masonry-content {
    border-radius: 4px;
    overflow: hidden;
    }
    .masonry-item {
    filter: drop-shadow(0px 2px 2px rgba(0, 0, 0, .3));
    transition: filter .25s ease-in-out;
    }
    .masonry-item:hover {
    filter: drop-shadow(0px 5px 5px rgba(0, 0, 0, .3));
    }
</style>
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{$title}}</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="{{url('/')}}" class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript::void(0)" class="m-nav__link">
                            <span class="m-nav__link-text">{{$title}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>

            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">

        <!--Begin::Main Portlet-->
        <div class="m-portlet m-portlet--full-height">

            <!--begin: Portlet Head-->
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{$title}}
                        </h3>
                    </div>
                </div>

            </div>

            <!--end: Portlet Head-->

            <!--begin: Portlet Body-->
            <div class="m-portlet__body m-portlet__body--no-padding">
                <div class="m-portlet__body">
                    <div class="m-separator m-separator--dashed"></div>
                    <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                        <li class="nav-item dropdown m-tabs__item">
                            <a class="nav-link m-tabs__link dropdown-toggle active" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-placeholder-2"></i> Promotion</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-toggle="tab" href="#m_tabs_9_2">Promotion Detail</a>
                                <a class="dropdown-item" data-toggle="tab" href="#m_tabs_location">Location Set up</a>
                                <a class="dropdown-item" data-toggle="tab" href="#m_tabs_payment">Billing Detail</a>
                            </div>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link " data-toggle="tab" href="#m_tabs_9_1" role="tab">
                                <i class="flaticon-time-2"></i> Promotion Media</a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_9_3" role="tab">
                                <i class="flaticon-multimedia"></i> Promotion Comments</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane " id="m_tabs_9_1" role="tabpanel">

                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                id="stores" action="{{url('poststore')}}" method="POST">
                                <div class="m-portlet__body">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} m-form__group row">
                                        <div class="col-lg-12">
                                            <div class="masonry-wrapper">
                                                <div class="masonry">
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/325?image=100"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/450?image=200"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/280?image=300"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/540?image=400"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/380?image=500"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/300?image=600"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/400?image=700"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/300?image=800"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/280?image=900"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/480?image=925"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/550?image=950"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/600?image=1000"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/325?image=25"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/450?image=50"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/280?image=75"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/540?image=100"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/380?image=125"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/300?image=161"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/400?image=175"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/300?image=200"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/280?image=225"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/480?image=250"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/550?image=275"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/600?image=300"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/325?image=13"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/450?image=26"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/280?image=39"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/540?image=52"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/380?image=65"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                    <div class="masonry-item">
                                                        <img src="https://picsum.photos/450/300?image=78"
                                                            alt="Dummy Image" class="masonry-content">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <label class="">Promotion Media:</label>
                                            <div class="col-lg-12">
                                                <div class="m-dropzone dropzone m-dropzone--primary"
                                                    action="inc/api/dropzone/upload.php" id="m-dropzone-two">
                                                    <div class="m-dropzone__msg dz-message needsclick">
                                                        <h3 class="m-dropzone__msg-title">Drop files here or click to
                                                            upload.</h3>
                                                        <span class="m-dropzone__msg-desc">Upload up to 10 files</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions--solid">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 m--align-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!--end::Form-->
                        </div>
                        <div class="tab-pane active" id="m_tabs_9_2" role="tabpanel">
                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                id="stores" action="{{url('poststore')}}" method="POST">
                                <div class="m-portlet__body">
                                    <div
                                        class="form-group{{ $errors->has('name') ? ' has-error' : '' }} m-form__group row">
                                        <div class="col-lg-6">
                                            <label>Promotion Title:</label>
                                            <input type="text" name="title" class="form-control m-input"
                                                placeholder="Enter promotion title">
                                            <span class="m-form__help">Enter your promotion title</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">Select/Deselect Categories:</label>
                                            <select class="form-control m-bootstrap-select m_selectpicker" multiple>
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div
                                        class="form-group{{ $errors->has('address') ? ' has-error' : '' }} m-form__group row">
                                        <div class="col-lg-6">
                                            <label>Select/Deselect Tags:</label>
                                            <div class="m-input-icon m-input-icon--right">
                                                <select class="form-control m-bootstrap-select m_selectpicker" multiple>
                                                    <option>Mustard</option>
                                                    <option>Ketchup</option>
                                                    <option>Relish</option>
                                                </select>
                                            </div>
                                            <span class="m-form__help">Enter your store address</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">Start / End Time:</label>
                                            <div class="m-input-icon m-input-icon--right">
                                                <div class="input-group pull-right" id="m_daterangepicker_4">
                                                    <input type="text" class="form-control m-input" readonly=""
                                                        placeholder="Select date &amp; time range">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar-check-o"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions--solid">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 m--align-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <div class="tab-pane" id="m_tabs_location" role="tabpanel">
                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                id="stores" action="{{url('poststore')}}" method="POST">
                                <div class="m-portlet__body">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} m-form__group row">
                                        <div class="col-lg-12">
                                                        <div class="m-portlet m-portlet--tab">
                                                            <div class="m-portlet__head">
                                                                <div class="m-portlet__head-caption">
                                                                    <div class="m-portlet__head-title">
                                                                        <span class="m-portlet__head-icon m--hide">
                                                                            <i class="la la-gear"></i>
                                                                        </span>
                                                                        <h3 class="m-portlet__head-text">
                                                                            Map Events
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__body">
                                                                <div id="m_gmap_2" style="height:300px;"></div>
                                                            </div>
                                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions--solid">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 m--align-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <div class="tab-pane" id="m_tabs_payment" role="tabpanel">
                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"
                                id="stores" action="{{url('poststore')}}" method="POST">
                                <div class="m-portlet__body">
                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">Billing Information</h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">* Cardholder Name:</label>
                                                        <input type="text" name="billing_card_name"
                                                            class="form-control m-input" placeholder=""
                                                            value="Nick Stone">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">* Card Number:</label>
                                                        <input type="text" name="billing_card_number"
                                                            class="form-control m-input" placeholder=""
                                                            value="372955886840581">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-4 m-form__group-sub">
                                                        <label class="form-control-label">* Exp Month:</label>
                                                        <select class="form-control m-input"
                                                            name="billing_card_exp_month">
                                                            <option value="">Select</option>
                                                            <option value="01">01</option>
                                                            <option value="02">02</option>
                                                            <option value="03">03</option>
                                                            <option value="04" selected>04</option>
                                                            <option value="05">05</option>
                                                            <option value="06">06</option>
                                                            <option value="07">07</option>
                                                            <option value="08">08</option>
                                                            <option value="09">09</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 m-form__group-sub">
                                                        <label class="form-control-label">* Exp Year:</label>
                                                        <select class="form-control m-input"
                                                            name="billing_card_exp_year">
                                                            <option value="">Select</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021" selected>2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 m-form__group-sub">
                                                        <label class="form-control-label">* CVV:</label>
                                                        <input type="number" class="form-control m-input"
                                                            name="billing_card_cvv" placeholder="" value="450">
                                                    </div>
                                                </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions--solid">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                            </div>
                                            <div class="col-lg-6 m--align-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <div class="tab-pane" id="m_tabs_9_3" role="tabpanel">
                            
								<!--begin:: Widgets/Support Tickets -->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Comments
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
														<i class="la la-ellipsis-h m--font-brand"></i>
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-share"></i>
																				<span class="m-nav__link-text">Activity</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-chat-1"></i>
																				<span class="m-nav__link-text">Messages</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-info"></i>
																				<span class="m-nav__link-text">FAQ</span>
																			</a>
																		</li>
																		<li class="m-nav__item">
																			<a href="" class="m-nav__link">
																				<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																				<span class="m-nav__link-text">Support</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-widget3">
											<div class="m-widget3__item">
												<div class="m-widget3__header">
													<div class="m-widget3__user-img">
														<img class="m-widget3__img" src="assets/app/media/img/users/user1.jpg" alt="">
													</div>
													<div class="m-widget3__info">
														<span class="m-widget3__username">
															Melania Trump
														</span>
														<br>
														<span class="m-widget3__time">
															2 day ago
														</span>
													</div>
													<span class="m-widget3__status m--font-info">
														Pending
													</span>
												</div>
												<div class="m-widget3__body">
													<p class="m-widget3__text">
														Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
													</p>
												</div>
											</div>
											<div class="m-widget3__item">
												<div class="m-widget3__header">
													<div class="m-widget3__user-img">
														<img class="m-widget3__img" src="assets/app/media/img/users/user4.jpg" alt="">
													</div>
													<div class="m-widget3__info">
														<span class="m-widget3__username">
															Lebron King James
														</span>
														<br>
														<span class="m-widget3__time">
															1 day ago
														</span>
													</div>
													<span class="m-widget3__status m--font-brand">
														Open
													</span>
												</div>
												<div class="m-widget3__body">
													<p class="m-widget3__text">
														Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis nostrud exerci tation ullamcorper.
													</p>
												</div>
											</div>
											<div class="m-widget3__item">
												<div class="m-widget3__header">
													<div class="m-widget3__user-img">
														<img class="m-widget3__img" src="assets/app/media/img/users/user5.jpg" alt="">
													</div>
													<div class="m-widget3__info">
														<span class="m-widget3__username">
															Deb Gibson
														</span>
														<br>
														<span class="m-widget3__time">
															3 weeks ago
														</span>
													</div>
													<span class="m-widget3__status m--font-success">
														Closed
													</span>
												</div>
												<div class="m-widget3__body">
													<p class="m-widget3__text">
														Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!--end:: Widgets/Support Tickets -->
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Portlet-->
        </div>

        <!--end: Portlet Body-->
    </div>

    <!--End::Main Portlet-->
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/demo/default/custom/crud/wizard/wizard.js')}}" type="text/javascript"></script>
@endsection