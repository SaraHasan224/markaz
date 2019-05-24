<?php $__env->startSection('content'); ?>
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
                        <a href="JavaScript::void(0)" class="m-nav__link">
                            <span class="m-nav__link-text"><?php echo e($title); ?></span>
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
                            <?php echo e($title); ?>

                        </h3>
                    </div>
                </div>

            </div>

            <!--end: Portlet Head-->

            <!--begin: Portlet Body-->
            <div class="m-portlet__body m-portlet__body--no-padding">

                <!--begin: Form Wizard-->
                <div class="m-wizard m-wizard--4 m-wizard--brand" id="m_wizard">
                    <div class="row m-row--no-padding">
                        <div class="col-xl-3 col-lg-12 m--padding-top-20 m--padding-bottom-15">

                            <!--begin: Form Wizard Head -->
                            <div class="m-wizard__head">

                                <!--begin: Form Wizard Nav -->
                                <div class="m-wizard__nav">
                                    <div class="m-wizard__steps">
                                        <div class="m-wizard__step m-wizard__step--done"
                                            m-wizard-target="m_wizard_form_step_1">
                                            <div class="m-wizard__step-info">
                                                <a href="#" class="m-wizard__step-number">
                                                    <span>
                                                        <span>1</span>
                                                    </span>
                                                </a>
                                                <div class="m-wizard__step-label">
                                                    Promotion Setup
                                                </div>
                                                <div class="m-wizard__step-icon">
                                                    <i class="la la-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                            <div class="m-wizard__step-info">
                                                <a href="#" class="m-wizard__step-number">
                                                    <span>
                                                        <span>2</span>
                                                    </span>
                                                </a>
                                                <div class="m-wizard__step-label">
                                                    Location Setup
                                                </div>
                                                <div class="m-wizard__step-icon">
                                                    <i class="la la-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                                            <div class="m-wizard__step-info">
                                                <a href="#" class="m-wizard__step-number">
                                                    <span>
                                                        <span>3</span>
                                                    </span>
                                                </a>
                                                <div class="m-wizard__step-label">
                                                    Billing Setup
                                                </div>
                                                <div class="m-wizard__step-icon">
                                                    <i class="la la-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_4">
                                            <div class="m-wizard__step-info">
                                                <a href="#" class="m-wizard__step-number">
                                                    <span>
                                                        <span>4</span>
                                                    </span>
                                                </a>
                                                <div class="m-wizard__step-label">
                                                    Confirmation
                                                </div>
                                                <div class="m-wizard__step-icon">
                                                    <i class="la la-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Nav -->
                            </div>

                            <!--end: Form Wizard Head -->
                        </div>
                        <div class="col-xl-9 col-lg-12">

                            <!--begin: Form Wizard Form-->
                            <div class="m-wizard__form">

                                <!--
							1) Use m-form--label-align-left class to alight the form input lables to the right
							2) Use m-form--state class to highlight input control borders on form validation
						-->
                                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">

                                    <!--begin: Form Body -->
                                    <div class="m-portlet__body m-portlet__body--no-padding">

                                        <!--begin: Form Wizard Step 1-->
                                        <div class="m-wizard__form-step m-wizard__form-step--current"
                                            id="m_wizard_form_step_1">
                                            <!-- <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">Client Details</h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Name:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="name" class="form-control m-input"
                                                            placeholder="" value="Nick Stone">
                                                        <span class="m-form__help">Please enter your first and last
                                                            names</span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Email:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="email" name="email" class="form-control m-input"
                                                            placeholder="" value="nick.stone@gmail.com">
                                                        <span class="m-form__help">We'll never share your email with
                                                            anyone else</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div> -->
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Promotion Details
                                                        <i data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info"
                                                            title="Some help text goes here"></i>
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Promotion
                                                        Title:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="title" class="form-control m-input"
                                                            placeholder="Enter promotion title">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Promotion
                                                        Description:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                    <textarea class="form-control m-input m-input--air" id="description" rows="3" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12">Select/deselect
                                                        Categories</label>
                                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                                        <select class="form-control m-bootstrap-select m_selectpicker"
                                                            multiple>
                                                            <option>Mustard</option>
                                                            <option>Ketchup</option>
                                                            <option>Relish</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12">Select/deselect
                                                        tags</label>
                                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                                        <select class="form-control m-bootstrap-select m_selectpicker"
                                                            multiple>
                                                            <option>Mustard</option>
                                                            <option>Ketchup</option>
                                                            <option>Relish</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12">Start &amp; End
                                                        Time</label>
                                                    <div class="col-lg-8 col-md-8 col-sm-12">
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

                                        <!--end: Form Wizard Step 1-->

                                        <!--begin: Form Wizard Step 2-->
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">Photos &amp; Videos</h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <div class="m-dropzone dropzone m-dropzone--primary" action="inc/api/dropzone/upload.php" id="m-dropzone-two">
                                                            <div class="m-dropzone__msg dz-message needsclick">
                                                                <h3 class="m-dropzone__msg-title">Drop files here or click to upload.</h3>
                                                                <span class="m-dropzone__msg-desc">Upload up to 10 files</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">Location Setup</h3>
                                                </div>
                                                <div class="form-group m-form__group row">
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
                                        </div>

                                        <!--end: Form Wizard Step 2-->

                                        <!--begin: Form Wizard Step 3-->
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                        <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">Pricing Table </h3>
                                                </div>
                                                <div class="m-pricing-table-1">
                                                    <div class="m-pricing-table-1__items row">
                                                        <div class="m-pricing-table-1__item col-lg-3">
                                                            <div class="m-pricing-table-1__visual">
                                                                <div class="m-pricing-table-1__hexagon1"></div>
                                                                <div class="m-pricing-table-1__hexagon2"></div>
                                                                <span class="m-pricing-table-1__icon m--font-brand">
                                                                    <i class="fa flaticon-piggy-bank"></i>
                                                                </span>
                                                            </div>
                                                            <span class="m-pricing-table-1__price">Free</span>
                                                            <h2 class="m-pricing-table-1__subtitle">1 End Product License</h2>
                                                            <span class="m-pricing-table-1__description">
                                                                Lorem ipsum aret
                                                                <br> sed do eiusmod
                                                                <br> magna siad ali
                                                            </span>
                                                            <div class="m-pricing-table-1__btn">
                                                                <button type="button" class="btn btn-brand m-btn m-btn--custom m-btn--pill m-btn--wide m-btn--uppercase m-btn--bolder m-btn--sm">Purchase</button>
                                                            </div>
                                                        </div>
                                                        <div class="m-pricing-table-1__item col-lg-3">
                                                            <div class="m-pricing-table-1__visual">
                                                                <div class="m-pricing-table-1__hexagon1"></div>
                                                                <div class="m-pricing-table-1__hexagon2"></div>
                                                                <span class="m-pricing-table-1__icon m--font-accent">
                                                                    <i class="fa flaticon-confetti"></i>
                                                                </span>
                                                            </div>
                                                            <span class="m-pricing-table-1__price">69
                                                                <span class="m-pricing-table-1__label">$</span>
                                                            </span>
                                                            <h2 class="m-pricing-table-1__subtitle">Business License</h2>
                                                            <span class="m-pricing-table-1__description">
                                                                Lorem ipsum
                                                                <br> sed do eiusmod
                                                                <br> magna siad enim aliqua
                                                            </span>
                                                            <div class="m-pricing-table-1__btn">
                                                                <button type="button" class="btn m-btn--pill  btn-accent m-btn--wide m-btn--uppercase m-btn--bolder m-btn--sm">Purchase</button>
                                                            </div>
                                                        </div>
                                                        <div class="m-pricing-table-1__item col-lg-3">
                                                            <div class="m-pricing-table-1__visual">
                                                                <div class="m-pricing-table-1__hexagon1"></div>
                                                                <div class="m-pricing-table-1__hexagon2"></div>
                                                                <span class="m-pricing-table-1__icon m--font-focus">
                                                                    <i class="fa flaticon-rocket"></i>
                                                                </span>
                                                            </div>
                                                            <span class="m-pricing-table-1__price">548
                                                                <span class="m-pricing-table-1__label">$</span>
                                                            </span>
                                                            <h2 class="m-pricing-table-1__subtitle">Enterprice License</h2>
                                                            <span class="m-pricing-table-1__description">
                                                                Lorem ipsum dolor
                                                                <br> sed do eiusmod
                                                                <br> magna siad enim
                                                            </span>
                                                            <div class="m-pricing-table-1__btn">
                                                                <button type="button" class="btn m-btn--pill  btn-focus m-btn--wide m-btn--uppercase m-btn--bolder m-btn--sm">Purchase</button>
                                                            </div>
                                                        </div>
                                                        <div class="m-pricing-table-1__item col-lg-3">
                                                            <div class="m-pricing-table-1__visual">
                                                                <div class="m-pricing-table-1__hexagon1"></div>
                                                                <div class="m-pricing-table-1__hexagon2"></div>
                                                                <span class="m-pricing-table-1__icon m--font-primary">
                                                                    <i class="fa flaticon-gift"></i>
                                                                </span>
                                                            </div>
                                                            <span class="m-pricing-table-1__price">899
                                                                <span class="m-pricing-table-1__label">$</span>
                                                            </span>
                                                            <h2 class="m-pricing-table-1__subtitle">Custom License</h2>
                                                            <span class="m-pricing-table-1__description">
                                                                Lorem ipsum
                                                                <br> sed do eiusmod tem
                                                                <br> magna siad enim
                                                            </span>
                                                            <div class="m-pricing-table-1__btn">
                                                                <button type="button" class="btn m-btn--pill  btn-primary m-btn--wide m-btn--uppercase m-btn--bolder m-btn--sm">Purchase</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
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
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <!--
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">Billing Address
                                                        <i data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info"
                                                            title="If different than the corresponding address"></i>
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">* Address 1:</label>
                                                        <input type="text" name="billing_address_1"
                                                            class="form-control m-input" placeholder=""
                                                            value="Headquarters 1120 N Street Sacramento 916-654-5266">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <label class="form-control-label">Address 2:</label>
                                                        <input type="text" name="billing_address_2"
                                                            class="form-control m-input" placeholder=""
                                                            value="P.O. Box 942873 Sacramento, CA 94273-0001">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-5 m-form__group-sub">
                                                        <label class="form-control-label">* City:</label>
                                                        <input type="text" class="form-control m-input"
                                                            name="billing_city" placeholder="" value="Polo Alto">
                                                    </div>
                                                    <div class="col-lg-5 m-form__group-sub">
                                                        <label class="form-control-label">* State:</label>
                                                        <input type="text" class="form-control m-input"
                                                            name="billing_state" placeholder="" value="California">
                                                    </div>
                                                    <div class="col-lg-2 m-form__group-sub">
                                                        <label class="form-control-label">* ZIP:</label>
                                                        <input type="text" class="form-control m-input"
                                                            name="billing_zip" placeholder="" value="34890">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">Delivery Type</h3>
                                                </div>
                                                <div class="form-group m-form__group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="m-option">
                                                                <span class="m-option__control">
                                                                    <span class="m-radio m-radio--state-brand">
                                                                        <input type="radio" name="billing_delivery"
                                                                            value="">
                                                                        <span></span>
                                                                    </span>
                                                                </span>
                                                                <span class="m-option__label">
                                                                    <span class="m-option__head">
                                                                        <span class="m-option__title">
                                                                            Standart Delevery
                                                                        </span>
                                                                        <span class="m-option__focus">
                                                                            Free
                                                                        </span>
                                                                    </span>
                                                                    <span class="m-option__body">
                                                                        Estimated 14-20 Day Shipping (&nbsp;Duties end
                                                                        taxes may be due upon delivery&nbsp;)
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="m-option">
                                                                <span class="m-option__control">
                                                                    <span class="m-radio m-radio--state-brand">
                                                                        <input type="radio" name="billing_delivery"
                                                                            value="">
                                                                        <span></span>
                                                                    </span>
                                                                </span>
                                                                <span class="m-option__label">
                                                                    <span class="m-option__head">
                                                                        <span class="m-option__title">
                                                                            Fast Delevery
                                                                        </span>
                                                                        <span class="m-option__focus">
                                                                            $&nbsp;8.00
                                                                        </span>
                                                                    </span>
                                                                    <span class="m-option__body">
                                                                        Estimated 2-5 Day Shipping (&nbsp;Duties end
                                                                        taxes may be due upon delivery&nbsp;)
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="m-form__help">

                                                       //must use this helper element to display error message for the options
                                                    </div>
                                                </div>
                                            </div>
                                        -->
                                        </div>

                                        <!--end: Form Wizard Step 3-->

                                        <!--begin: Form Wizard Step 4-->
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_4">

                                            <!--begin::Section-->
                                            <div class="m-accordion m-accordion--default" id="m_accordion_1"
                                                role="tablist">

                                                <!--begin::Item-->
                                                <div class="m-accordion__item active">
                                                    <div class="m-accordion__item-head" role="tab"
                                                        id="m_accordion_1_item_1_head" data-toggle="collapse"
                                                        href="#m_accordion_1_item_1_body" aria-expanded="  false">
                                                        <span class="m-accordion__item-icon">
                                                            <i class="fa flaticon-user-ok"></i>
                                                        </span>
                                                        <span class="m-accordion__item-title">1. Promotion
                                                            Setup</span>
                                                        <span class="m-accordion__item-mode"></span>
                                                    </div>
                                                    <div class="m-accordion__item-body collapse show"
                                                        id="m_accordion_1_item_1_body" class=" " role="tabpanel"
                                                        aria-labelledby="m_accordion_1_item_1_head"
                                                        data-parent="#m_accordion_1">

                                                        <!--begin::Content-->
                                                        <div class="tab-content active  m--padding-30">
                                                            <div class="m-form__section m-form__section--first">
                                                                <div class="m-form__heading">
                                                                    <h4 class="m-form__heading-title">Client Details
                                                                    </h4>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Name:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">Nick
                                                                            Stone</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Email:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span
                                                                            class="m-form__control-static">nick.stone@gmail.com</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="m-separator m-separator--dashed m-separator--lg">
                                                            </div>
                                                            <div class="m-form__section">
                                                                <div class="m-form__heading">
                                                                    <h4 class="m-form__heading-title">Corresponding
                                                                        Address
                                                                        <i data-toggle="m-tooltip"
                                                                            class="m-form__heading-help-icon flaticon-info"
                                                                            title="Some help text goes here"></i>
                                                                    </h4>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Address
                                                                        Line 1:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span
                                                                            class="m-form__control-static">Headquarters
                                                                            1120 N Street Sacramento 916-654-5266</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Address
                                                                        Line 2:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">P.O. Box
                                                                            942873 Sacramento, CA 94273-0001</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">City:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">Polo
                                                                            Alto</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">State:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span
                                                                            class="m-form__control-static">California</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Country:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">USA</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--end::Section-->
                                                    </div>
                                                </div>

                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <div class="m-accordion__item">
                                                    <div class="m-accordion__item-head collapsed" role="tab"
                                                        id="m_accordion_1_item_2_head" data-toggle="collapse"
                                                        href="#m_accordion_1_item_2_body" aria-expanded="    false">
                                                        <span class="m-accordion__item-icon">
                                                            <i class="fa  flaticon-placeholder"></i>
                                                        </span>
                                                        <span class="m-accordion__item-title">2. Location Setup</span>
                                                        <span class="m-accordion__item-mode"></span>
                                                    </div>
                                                    <div class="m-accordion__item-body collapse"
                                                        id="m_accordion_1_item_2_body" class=" " role="tabpanel"
                                                        aria-labelledby="m_accordion_1_item_2_head"
                                                        data-parent="#m_accordion_1">

                                                        <!--begin::Content-->
                                                        <div class="tab-content  m--padding-30">
                                                            <div class="m-form__section m-form__section--first">
                                                                <div class="m-form__heading">
                                                                    <h4 class="m-form__heading-title">Account Details
                                                                    </h4>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">URL:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span
                                                                            class="m-form__control-static">sinortech.vertoffice.com</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Username:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span
                                                                            class="m-form__control-static">sinortech.admin</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Password:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span
                                                                            class="m-form__control-static">*********</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="m-separator m-separator--dashed m-separator--lg">
                                                            </div>
                                                            <div class="m-form__section">
                                                                <div class="m-form__heading">
                                                                    <h4 class="m-form__heading-title">Client Settings
                                                                    </h4>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label class="col-xl-4 col-lg-4 col-form-label">User
                                                                        Group:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span
                                                                            class="m-form__control-static">Customer</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Communications:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">Phone,
                                                                            Email</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--end::Content-->
                                                    </div>
                                                </div>

                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <div class="m-accordion__item">
                                                    <div class="m-accordion__item-head collapsed" role="tab"
                                                        id="m_accordion_1_item_3_head" data-toggle="collapse"
                                                        href="#m_accordion_1_item_3_body" aria-expanded="    false">
                                                        <span class="m-accordion__item-icon">
                                                            <i class="fa  flaticon-placeholder"></i>
                                                        </span>
                                                        <span class="m-accordion__item-title">3. Billing Setup</span>
                                                        <span class="m-accordion__item-mode"></span>
                                                    </div>
                                                    <div class="m-accordion__item-body collapse"
                                                        id="m_accordion_1_item_3_body" class=" " role="tabpanel"
                                                        aria-labelledby="m_accordion_1_item_3_head"
                                                        data-parent="#m_accordion_1">

                                                        <!--begin::Content-->
                                                        <div class="tab-content  m--padding-30">
                                                            <div class="m-form__section m-form__section--first">
                                                                <div class="m-form__heading">
                                                                    <h4 class="m-form__heading-title">Billing
                                                                        Information</h4>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">Cardholder
                                                                        Name:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">Nick
                                                                            Stone</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label class="col-xl-4 col-lg-4 col-form-label">Card
                                                                        Number:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span
                                                                            class="m-form__control-static">*************4589</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label class="col-xl-4 col-lg-4 col-form-label">Exp
                                                                        Month:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">10</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label class="col-xl-4 col-lg-4 col-form-label">Exp
                                                                        Year:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">2018</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="form-group m-form__group m-form__group--sm row">
                                                                    <label
                                                                        class="col-xl-4 col-lg-4 col-form-label">CVV:</label>
                                                                    <div class="col-xl-8 col-lg-8">
                                                                        <span class="m-form__control-static">***</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="m-separator m-separator--dashed m-separator--lg">
                                                            </div>
                                                        </div>

                                                        <!--end::Content-->
                                                    </div>
                                                </div>

                                                <!--end::Item-->
                                            </div>

                                            <!--end::Section-->

                                            <!--end::Section-->
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="form-group m-form__group m-form__group--sm row">
                                                <div class="col-xl-12">
                                                    <div class="m-checkbox-inline">
                                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                            <input type="checkbox" name="accept" value="1"> Click here
                                                            to indicate that you have read and agree to the terms
                                                            presented in the Terms and Conditions agreement
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end: Form Wizard Step 4-->
                                    </div>

                                    <!--end: Form Body -->

                                    <!--begin: Form Actions -->
                                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-lg-6 m--align-left">
                                                    <a href="#"
                                                        class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
                                                        data-wizard-action="prev">
                                                        <span>
                                                            <i class="la la-arrow-left"></i>&nbsp;&nbsp;
                                                            <span>Back</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 m--align-right">
                                                    <a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                                        data-wizard-action="submit">
                                                        <span>
                                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                                            <span>Submit</span>
                                                        </span>
                                                    </a>
                                                    <a href="#" class="btn btn-success m-btn m-btn--custom m-btn--icon"
                                                        data-wizard-action="next">
                                                        <span>
                                                            <span>Save &amp; Continue</span>&nbsp;&nbsp;
                                                            <i class="la la-arrow-right"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Actions -->
                                </form>
                            </div>

                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>

                <!--end: Form Wizard-->
            </div>

            <!--end: Portlet Body-->
        </div>

        <!--End::Main Portlet-->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/demo/default/custom/crud/wizard/wizard.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>