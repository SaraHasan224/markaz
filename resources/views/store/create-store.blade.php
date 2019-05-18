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
</style>
@endsection
@section('content')
<!-- END: Left Aside -->
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
                        <a href="{{url('store')}}" class="m-nav__link">
                            <span class="m-nav__link-text">Stores</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript:void(0);" class="m-nav__link">
                            <span class="m-nav__link-text">{{$title}}</span>
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
                                    {{$title}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="stores" method="POST">
                        <div class="m-portlet__body">
                            <div id="delete_result" style="padding: 10px;"></div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Name:</label>
                                    <input type="text" name="name" class="form-control m-input" placeholder="Enter store name">
                                    <span class="m-form__help">Enter your store name</span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Store Contact Number:</label>
                                    <input type="text" name="contact_number" class="form-control m-input"
                                        placeholder="Enter store contact number">
                                    <span class="m-form__help">Enter your store contact number</span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Website Link:</label>
                                    <input type="text" name="website" class="form-control m-input" placeholder="Enter website link">
                                    <span class="m-form__help">Enter your website</span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Store Contact Email:</label>
                                    <input type="text" name="contact_email" class="form-control m-input"
                                        placeholder="Enter store contact email">
                                    <span class="m-form__help">Enter your store contact email</span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Description:</label>
                                    <input type="text" name="description" class="form-control m-input" placeholder="Enter description">
                                    <span class="m-form__help">Enter your store description</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Adress:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" name="address" class="form-control m-input"
                                            placeholder="Enter your address">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-map-marker"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Enter your store address</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label class="">Store Location:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <button type="button" class="btn btn-outline-metal m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                            <span><i class="la la-location-arrow"></i><span>Location</span></span>
                                        </button>
                                    </div>
                                    <span class="m-form__help" id="demo"></span>
                                    <input type="hidden" name="user_id" value="{{$user_id}}"/>
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

                <!--end::Portlet-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts') 
<script>
    var base_url = "<?php url() ?>";
    $('#stores').submit(function(event){	
            event.preventDefault();
    	$.ajax({
    		type: "POST",
    		headers: 
    		{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		url: base_url+'/poststore',
    		data: $("#stores").serialize(),
    		success: function (response) {
                console.log(response);
                $('#delete_result').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response+'</div>');
                setTimeout(function() {
                    window.location.reload();
				}, 2e3);
            },
            error: function (response){
                response.responseJSON.messages.forEach(function (msg) {
                console.log(msg);
                    $('#delete_result').append('<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="flaticon-danger"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+msg+'.</div>')
				});
            }
    	});
    })
</script>
@endsection