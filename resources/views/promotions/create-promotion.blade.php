@extends('layouts.header')

@section('styles')
<style>
      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #000s;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        /* padding: 0 11px 0 13px; */
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
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

                <!--begin: Form Wizard-->
                <div class="m-wizard m-wizard--4 m-wizard--brand" id="m_wizard">
                    <div class="row m-row--no-padding">
                        <div class="col-xl-3 col-lg-12 m--padding-top-20 m--padding-bottom-15">
                            <!--begin: Form Wizard Head -->
                            <div class="m-wizard__head">
                                <!--begin: Form Wizard Nav -->
                                <div class="m-wizard__nav">
                                    <div class="m-wizard__steps">
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_1">
                                            <div class="m-wizard__step-info">
                                                <a href="#" class="m-wizard__step-number">
                                                    <span>
                                                        <span>1</span>
                                                    </span>
                                                </a>
                                                <div class="m-wizard__step-label">
                                                    Select Store
                                                </div>
                                                <div class="m-wizard__step-icon">
                                                    <i class="la la-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-wizard__step m-wizard__step--done" m-wizard-target="m_wizard_form_step_2">
                                            <div class="m-wizard__step-info">
                                                <a href="#" class="m-wizard__step-number">
                                                    <span>
                                                        <span>2</span>
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
                                        <div class="m-wizard__step m-wizard__step--done" m-wizard-target="m_wizard_form_step_3">
                                            <div class="m-wizard__step-info">
                                                <a href="#" class="m-wizard__step-number">
                                                    <span>
                                                        <span>3</span>
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
                                    </div>
                                </div>
                                <!--end: Form Wizard Nav -->
                            </div>
                            <!--end: Form Wizard Head -->
                        </div>
                        <div class="col-xl-9 col-lg-12">
                            <!--begin: Form Wizard Form-->
                            <div class="m-wizard__form">
                                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                                    <!--begin: Form Body -->
                                    <div class="m-portlet__body m-portlet__body--no-padding">

                                        <!--begin: Form Wizard Step 1-->
                                        <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Select Store
                                                        <i data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info"
                                                            title="Some help text goes here"></i>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Select Store</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control m-input m-input--square" id="store_id" name="store_id">
                                                            @foreach($stores as $store)   
                                                                <option value="{{$store->id}}">{{$store->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                        </div>

                                        <!--end: Form Wizard Step 1-->

                                        <!--begin: Form Wizard Step 2-->
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Promotion Title</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="title" class="form-control m-input"
                                                            placeholder="Enter promotion title">
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Promotion Cover Image</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="file" name="images"/>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Promotion
                                                        Description</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                    <textarea class="form-control m-input m-input--air" id="description" name="description" rows="3" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Promotion Tags</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                    <select class="form-control m-input m-input--square" id="tags" name="tags">
                                                        @foreach($tags as $tag)   
                                                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                                                        @endforeach
                                                    </select>
                                                        </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12">* Start &amp; End
                                                        Time</label>
                                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                                        <div class="input-group pull-right" id="m_daterangepicker_4">
                                                            <input type="text" class="form-control m-input" readonly=""
                                                                placeholder="Select date &amp; time range" name="time" id="time">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar-check-o"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                        </div>

                                        <!--begin: Form Wizard Step 2-->
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">* Photos &amp; Videos</h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-12">
                                                        <!-- <div class="m-dropzone dropzone m-dropzone--primary" action="inc/api/dropzone/upload.php" id="m-dropzone-two">
                                                            <div class="m-dropzone__msg dz-message needsclick">
                                                                <h3 class="m-dropzone__msg-title">Drop files here or click to upload.</h3>
                                                                <span class="m-dropzone__msg-desc">Upload up to 10 files</span>
                                                            </div>
                                                        </div> -->
                                                        <input type="file" multiple name="image[]"/>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-form-label col-lg-3 col-sm-12">Multiple Promotions Images Upload</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                                        <div class="m-dropzone dropzone m-dropzone--primary dz-clickable" action="inc/api/dropzone/upload.php" id="m-dropzone-two">
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
                                                    <h3 class="m-form__heading-title">* Location Setup</h3>
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
                                                                <input type="text" id="pac-input" name="address" class="controls store_address form-control m-input" placeholder="Enter your store address">
                                                                <div class="col-lg-12" id="map">
                                                                        <label class="">* Store Location:</label>
                                                                        <div class="m-input-icon m-input-icon--right">
                                                                            <button type="button" class="btn btn-outline-metal m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                                                                <span><i class="la la-location-arrow"></i><span>Location</span></span>
                                                                            </button>
                                                                        </div>
                                                                        <span class="m-form__help" id="demo"></span>
                                                                </div>
                                                                <input type="hidden" class="form-control m-input" name="location" id="location" placeholder="">
                                                                <input type="hidden" class="form-control m-input" name="longitude" id="longitude" placeholder="">
                                                                <input type="hidden" class="form-control m-input" name="latitude" id="latitude" placeholder="">
                                     
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end: Form Wizard Step 2-->

                                        <!--begin: Form Wizard Step 3-->
                                        <!-- <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">* Pricing Table </h3>
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
                                        </div> -->

                                        <!--end: Form Wizard Step 3-->
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
                                                        <a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon promotion_submit"
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
                                    </div>

                                    <!--end: Form Body -->

                                    <!--begin: Form Actions -->
                                    

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
@endsection

@section('scripts')
<script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            formatted_address = place.formatted_address;
            // console.log(place);
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return; 
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Add circle overlay and bind to marker
            var circle = new google.maps.Circle({
            map: map,
            radius: 16093,    // 10 miles in metres
            fillColor: '#AA0000'
            });
            circle.bindTo('center', markers, 'po?sensor=falsesition');
            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) { 
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
            

            
            // console.log("marker = "+place.geometry.viewport);
            // console.log(bounds);
            // console.log(formatted_address,bounds.na.l,bounds.ga.l);
            document.getElementById("location").value = formatted_address;
            document.getElementById("latitude").value = bounds.na.l;
            document.getElementById("longitude").value = bounds.ga.l;
          });
          map.fitBounds(bounds);
        });
      }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQVVrKIOLfXUXP56ql3JrlU8hdlxEzqBA&libraries=places&callback=initAutocomplete" type="text/javascript"></script>

<script type="text/javascript">
    var WizardDemo=function() {
        $("#m_wizard");
        var e,
        r,
        i=$("#m_form");
        return {
            init:function() {
                var n;
                $("#m_wizard"),
                i=$("#m_form"),
                (r=new mWizard("m_wizard", {
                    startStep: 1
                }
                )).on("beforeNext", function(r) {
                    !0!==e.form()&&r.stop()
                }
                ),
                r.on("change", function(e) {
                    mUtil.scrollTop()
                }
                ),
                e=i.validate( {
                    ignore:":hidden", rules: {
                        title: {
                            required: !0
                        }
                        , description: {
                            required: !0
                        }
                        , time: {
                            required: !0
                        }
                        , "account_communication[]": {
                            required: !0
                        }
                        , billing_card_name: {
                            required: !0
                        }
                        , billing_card_number: {
                            required: !0, creditcard: !0
                        }
                        , billing_card_exp_month: {
                            required: !0
                        }
                        , billing_card_exp_year: {
                            required: !0
                        }
                        , billing_card_cvv: {
                            required: !0, minlength: 2, maxlength: 3
                        }
                    }
                    , messages: {
                        "tags[]": {
                            required: "You must select at least one communication option"
                        }
                        , "category[]": {
                            required: "You must select at least one communication option"
                        }
                        , "promotion_images[]": {
                            required: "You must select at least one image"
                        }
                        , accept: {
                            required: "You must accept the Terms and Conditions agreement!"
                        }
                    }
                    , invalidHandler:function(e, r) {
                        mUtil.scrollTop(), swal( {
                            title: "", text: "There are some errors in your submission. Please correct them.", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                        }
                        )
                    }
                    , submitHandler:function(e) {}
                }
                ),
                (n=$('.promotion_submit')).on("click", function(r) {
                    r.preventDefault();
                    var formData = new FormData($('#m_form')[0]);
                    $.ajax( {
                        type: "POST",
                        enctype: 'multipart/form-data',
                        contentType: false,
                        processData:false,
                        cache:false,
                        headers: 
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        url: '/post-promotion',
                        data: formData,
                        success: function (response) {
                            // console.log(response);
                            document.getElementById("m_form").reset();
                            mApp.unprogress(n), swal( {
                                        title: "", text: "The application has been successfully submitted!", type: "success", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                            })
                        },
                        error: function (response){
                            response.responseJSON.messages.forEach(function (msg) {
                                console.log(msg);
                                mApp.unprogress(n), swal( {
                                    title: "", text: "The application is not submitted!", type: "danger", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                                })
                            });
                        }
                    })
                })
            }
        }
    }

    ();
    jQuery(document).ready(function() {
        WizardDemo.init()
    }

    );
</script>
@endsection
