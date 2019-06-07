@extends('layouts.header')

@section('styles')
<style>
    .no-before::before{
        display:none;
        content: '';
        display: inline-block;
        width: 100%;
    }
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
                            </div>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link " data-toggle="tab" href="#m_tabs_9_1" role="tab">
                                <i class="flaticon-multimedia"></i> Promotion Media</a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_9_3" role="tab">
                                <i class="flaticon-comment"></i> Promotion Comments</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane " id="m_tabs_9_1" role="tabpanel">
                            @if(count($promotion_media) > 0)
    							<!--begin:: Widgets/Support Tickets --> 
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Media Images
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-widget3"> 
                                            <div class="m-widget3__item">
                                                <div class="m-widget3__body">
                                                    <div class="masonry-wrapper">
                                                        <div class="masonry">
                                                            @foreach($promotion_media as $media)
                                                            <div class="masonry-item">
                                                                <img src="{{ asset('images/promotion_media/'.$media->media_id) }}"
                                                                    class="masonry-content img-responsive">
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<!--end:: Widgets/Support Tickets -->
                            @else
    							<!--begin:: Widgets/Support Tickets -->
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Media Images
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="m-widget3"> 
                                            <div class="m-widget3__item">
                                                <div class="m-widget3__body">
                                                    <p class="m-widget3__text">
                                                        0 images found
                                                    </p>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<!--end:: Widgets/Support Tickets -->
                            @endif
                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST">
                                <div class="m-portlet__body">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} m-form__group row">
                                       
                                        
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
                                id="promotion_details" method="POST">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-12" id="delete_result"></div>  
                                    </div> 
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} m-form__group row">
                                        <div class="col-lg-6">
                                            <label>Promotion Title:</label>
                                            <input type="text" name="title" class="form-control m-input"
                                                placeholder="Enter promotion title" value="{{ $promotion->title}}">
                                            <span class="m-form__help">Enter your promotion title</span>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <label>Promotion Description:</label>
                                            <textarea class="form-control m-input m-input--air" id="description" name="description" rows="3" >{{$promotion->description}}</textarea>
                                        </div> 
                                    </div>
                                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }} m-form__group row">
                                        <div class="col-lg-6">
                                            <label class="">Select/Deselect Categories:</label>
                                            <select class="form-control m-bootstrap-select m_selectpicker" id="category" name="category[]" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->title}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Select/Deselect Tags:</label>
                                            <select class="form-control m-bootstrap-select m_selectpicker" id="tags" name="tags[]" multiple>
                                                @foreach($tags as $tag)
                                                        <option value="{{$tag->title}}">{{$tag->title}}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }} m-form__group row">
                                        <div class="col-lg-6">
                                            <label class="">Start / End Time:</label>
                                            <div class="m-input-icon m-input-icon--right">
                                                <div class="input-group pull-right" id="m_daterangepicker_4">
                                                    <input type="text" class="form-control m-input" readonly=""
                                                        placeholder="Select date &amp; time range" name="time">
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
                                id="promotion_location" action="{{url('poststore')}}" method="POST">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-12" id="delete_result"></div>  
                                    </div>    
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
                                                    <div id="map" style="height:300px;"></div>
                                                    <input type="text" id="pac-input" name="location"  class="controls form-control m-input" placeholder="Enter your store address" value="{{ !empty($promotion) ? $promotion->location : '' }}">
                                                    <input type="hidden" name="longitude" id="longitude" value="{{ !empty($promotion) ? $promotion->longitude : '' }}" />
                                                    <input type="hidden" name="latitude" id="latitude" value="{{ !empty($promotion) ? $promotion->latitude : '' }}"/>
                                                    <input type="hidden" name="location" id="location" value="{{ !empty($promotion) ? $promotion->location : '' }}"/>
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
									</div>
									<div class="m-portlet__body">
										<div class="m-widget3">
                                            @if(count($promotion_comments) > 0)
                                                @foreach($promotion_comments as $comments)
                                                    <div class="m-widget3__item">
                                                        <div class="m-widget3__header">
                                                            <div class="m-widget3__user-img">
                                                                <img class="m-widget3__img" src="{{asset('assets/app/media/img/users/user1.jpg')}}" alt="">
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
                                                            <!-- <span class="m-widget3__status m--font-info">
                                                                Pending
                                                            </span> -->
                                                        </div>
                                                        <div class="m-widget3__body">
                                                            <p class="m-widget3__text">
                                                                Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="m-widget3__item">
                                                    <div class="m-widget3__body">
                                                        <p class="m-widget3__text">
                                                            0 comments found
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
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

<script>
    $( document ).ready(function() {
        var id = "{{ json_decode($promotion->id) }}";
        // e.preventDefault();
    	$.ajax({
    		type: "POST",
    		headers: 
    		{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		url: base_url+'/promotions/edit/view/'+id,
    		// data: $("#stores").serialize(),
    		success: function (response) {
                // console.log(response.success.promotion.start_time);
                $('#m_daterangepicker_4 input').val(response.success.promotion.start_time+' / '+response.success.promotion.end_time);
                $('#description').text(response.success.promotion.description);

                var cat_name = new Array();
                response.success.promotion_categories.forEach(function (cat) {
                    cat_name.push(cat.title);
                });
                if(cat_name.length > 0)
                {
                        // console.log(cat_name);          
                    $('#category').nextAll('button').first().html(cat_name); 
                    $('#category').nextAll('button').first().attr('style','vertical-align:left; display: grid;'); 
                    $('#category').nextAll('button').first().attr('title',cat_name);   
                    // $("#category option[value='"+cat_name+"]'").attr('selected','selected');
                    $('#category').val(cat_name); 
                }

                var tag_name = new Array();
                response.success.promotion_tags.forEach(function (cat) {
                    tag_name.push(cat.title);
                });
                if(tag_name.length > 0)
                {
                    $('#tags').nextAll('button').first().html(tag_name); 
                    $('#tags').nextAll('button').first().attr('style','vertical-align:left; display: grid;'); 
                    $('#tags').nextAll('button').first().attr('title',tag_name);   
                    $('#tags').val(tag_name); 
                }
            },
    	});
    });
</script>

<script>
      var marker;
      var lat = parseFloat($('#latitude').val());
      var lng = parseFloat($('#longitude').val());
        //   var lat = 24.9324222;
        //   var lng = 67.0849771;
        console.log(lat,lng);
      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
    
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: lat, lng: lng},
                zoom: 16,
                mapTypeId: 'roadmap'
            });
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {lat: lat, lng: lng}
            });
                marker.addListener('click', toggleBounce);
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
            //   markers.forEach(function(marker) {
            //     marker.setMap(null);
            //   });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                // console.log(place);
            // console.log(place.geometry.location);
                formatted_address = place.formatted_address;
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

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));
                marker.addListener('click', toggleBounce);

                if (place.geometry.viewport) {
                // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                // console.log("marker = "+place.geometry.viewport);
                // console.log(formatted_address,bounds.na.l,bounds.ia.l);
                document.getElementById("location").value = formatted_address;
                document.getElementById("latitude").value = bounds.na.l;
                document.getElementById("longitude").value = bounds.ga.l;
            });
            map.fitBounds(bounds);
            });
        }
      
    // function initialize() {
    // }
</script>
<script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQVVrKIOLfXUXP56ql3JrlU8hdlxEzqBA&libraries=places&callback=initAutocomplete" type="text/javascript"></script>

<script>
    var base_url = "<?php url() ?>";
    var id = "{{ json_decode($promotion->id) }}";
    $('#promotion_location').submit(function(event){	
        event.preventDefault();
    	$.ajax({
    		type: "POST",
    		headers: 
    		{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		url: base_url+'/promotion/edit/'+id,
    		data: $("#promotion_location").serialize(),
    		success: function (response) {
                    console.log(response);
                    $(this).find('#delete_result').append('<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="flaticon-danger"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.promotion+'.</div>')
            }
    	});
    });

    $('#promotion_details').submit(function(event){	
        event.preventDefault();
    	$.ajax({
    		type: "POST",
    		headers: 
    		{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		url: base_url+'/promotion/edit/'+id,
    		data: $("#promotion_details").serialize(),
    		success: function (response) {
                    console.log(response);
                    $(this).find('#delete_result').append('<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="flaticon-danger"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.promotion+'.</div>')
            }
    	});
    });
</script>
@endsection