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
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">My Profile</h3>
            </div>
            <div>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Your Profile
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img src="{{ asset('images/user') }}/{{$logged_user->profile_pic}}" alt="" />
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">{{$logged_user->name}}</span>
                                <a href="" class="m-card-profile__email m-link">{{$logged_user->name}}</a>
                            </div>
                        </div>
                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            <li class="m-nav__section m--hide">
                                <span class="m-nav__section-text">Section</span>
                            </li>
                            <li class="m-nav__item">
                                <a href="{{url('profile')}}" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                    <span class="m-nav__link-title">
                                        <span class="m-nav__link-wrap">
                                            <span class="m-nav__link-text">My Profile</span>
                                            <span class="m-nav__link-badge">
                                                <span class="m-badge m-badge--success">2</span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="m-portlet__body-separator"></div>
                    </div>
                </div>
            </div>
            @yield('profile')
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var base_url = "<?php url(); ?>";
    
    $('#profile').submit(function(event){	
            event.preventDefault();
            var formData = new FormData($('#profile')[0]);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                contentType: false,
                processData:false,
                cache:false,
                headers: 
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url+'/user_profile',
    		    data: formData,
                success: function (response) {
                    $('#result').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.success.message+'</div>');
                    setTimeout(function() {
                        window.location.reload(true);
    			    }, 2000);
                },
            });
        }); 
</script>
@endsection