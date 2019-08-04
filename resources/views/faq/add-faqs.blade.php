@extends('layouts.header')

@section('content')


<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Add Frequently Asked Questions</h3>
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
                        <a href="JavaScript:void(0);" class="m-nav__link">
                            <span class="m-nav__link-text">{{ (!empty($store)) ? $store->name : 'MARKAZ' }}</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="{{url('faq')}}/@if (!empty($store))  {{  $store->id }} @endif" class="m-nav__link">
                            <span class="m-nav__link-text">Frequently Asked Questions</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript::void(0);" class="m-nav__link">
                            <span class="m-nav__link-text">Add</span>
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

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--space">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Frequently Asked Questions of @if(!empty($store)) {{$store->name}} @else MARKAZ @endif
                        </h3>
                    </div>
                </div>
            </div>
			<form class="faq"  id="faq" method="POST">
                <div class="m-portlet__body">
                    <div id="delete_result" class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40">
                    </div>
                    <div id="m_repeater_1">
                        <div class="form-group  m-form__group row" id="m_repeater_1">
                            <label class="col-lg-1 col-form-label"></label>
                            <div data-repeater-list="" class="col-lg-10">
                                <div class="form-group m-form__group row align-items-center">
                                <!-- <div data-repeater-item class="form-group m-form__group row align-items-center"> -->
                                        <div class="col-md-2">
                                            Title
                                        </div>
                                        <div class="col-md-8">
                                            <div class="m-form__group m-form__group--inline">
                                                <div class="m-form__control">
                                                    <input type="text" name="title" class="form-control m-input" placeholder="Enter title here">
                                                </div>
                                            </div>
                                            <div class="d-md-none m--margin-bottom-10"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            Description
                                        </div>
                                        <div class="col-md-10">
                                            <div class="m-form__group m-form__group--inline">
                                                <div class="m-form__control">
                                                    <textarea class="form-control m-input m-input--solid" id="exampleTextarea" rows="3" name="description" placeholder="Enter text here.."></textarea>
                                                </div>
                                            </div>
                                            <div class="d-md-none m--margin-bottom-10"></div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div data-repeater-delete=""
                                            class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                                            <span>
                                                <i class="la la-trash-o"></i>
                                                <span>Delete</span>
                                            </span>
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- <div class="m-form__group form-group row">
                            <label class="col-lg-2 col-form-label"></label>
                            <div class="col-lg-4">
                                <div data-repeater-create=""
                                    class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add</span>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <input type="hidden" name="store_id" value="@if($store) {{ $store->id }} @else 0 @endif"/>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-6">
                                <a  href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                            </div>
                            <div class="col-lg-6 m--align-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div> 
            </form>
        </div>

        <!--end::Portlet-->
    </div>
</div>

<!-- end:: Body -->
@endsection
@section('scripts')
<script src="{{asset('assets/demo/default/custom/crud/forms/widgets/form-repeater.js')}}" type="text/javascript"></script>
<script>
    var base_url = "<?php url() ?>";
    var id = "<?php if(!empty($store)) {json_decode($store->id); } ?>";
    if(id.length > 0 )
    {
    	var url = base_url+'/add-faq/'+id;
    }else{
    	var url = base_url+'/add-faq';
    }
    $('#faq').submit(function(event){
            event.preventDefault();
    	$.ajax({
    		type: "POST",
    		headers: 
    		{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		url: url,
    		data: $("#faq").serialize(),
    		success: function (response) {
                // console.log(response);
                document.getElementById("faq").reset();
                $('#delete_result').empty();
                $('#delete_result').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.faq+'</div>'); 
            },
            error: function (response){
                response.responseJSON.messages.forEach(function (msg) {
                // console.log(msg);
                $('#delete_result').empty();
                    $('#delete_result').append('<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="flaticon-danger"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+msg+'.</div>')
				});
            }
    	});
    })
</script>
@endsection