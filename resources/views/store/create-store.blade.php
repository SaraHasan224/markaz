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
        background-color: #fff;
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
                                    <label>Store Category:</label>
                                    <select class="form-control m-input m-input--square" id="exampleSelect1" name="category_id">
                                        @foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
									</select>
                                    <span class="m-form__help">Enter your store name</span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Website Link:</label>
                                    <input type="text" name="website" class="form-control m-input" placeholder="Enter website link">
                                    <span class="m-form__help">Enter your website</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Logo:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="file" name="image" class="form-control m-input" accept="image/png, image/jpeg, image/jpg, image/pneg">
                                    </div>
                                    <span class="m-form__help">Select a logo</span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Cover:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="file" name="cover" class="form-control m-input" accept="image/png, image/jpeg, image/jpg, image/pneg">
                                    </div>
                                    <span class="m-form__help">Select a cover</span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Store Contact Number:</label>
                                    <textarea name="contact_number" class="form-control m-input" cols="50" rows="5"></textarea>
                                    <span class="m-form__help">Enter your store contact number</span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('fb_link') ? ' has-error' : '' }} m-form__group row">
                                <div class="col-lg-6">
                                    <label class="">Store Contact Email:</label>
                                    <textarea name="contact_email" class="form-control m-input" cols="50" rows="5"></textarea>
                                    <span class="m-form__help">Enter your store contact email</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Description:</label>
                                    <textarea name="description" class="form-control m-input" placeholder="Enter description" rows="4" cols="50"></textarea>
                                    <span class="m-form__help">Enter your store description</span>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Facebook Link:</label>
                                    <input type="text" name="fb_link" class="form-control m-input" placeholder="Enter facebook link">
                                    <span class="m-form__help">Enter your facebook link</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Instagram Link:</label>
                                    <input type="text" name="insta_link" class="form-control m-input" placeholder="Enter instagram link">
                                    <span class="m-form__help">Enter your instagram link</span>
                                </div>
                            </div>

                                    <input type="hidden" name="longitude" id="longitude" />
                                    <input type="hidden" name="latitude" id="latitude" />
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label class="">Store Twitter Link:</label>
                                    <input type="text" name="tw_link" class="form-control m-input"
                                        placeholder="Enter store  twitter link">
                                    <span class="m-form__help">Enter your store twitter link</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Address Selected:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" id="store_address" class="form-control m-input" placeholder="Enter address" disabled/>
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-map-marker"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Selected store addresss</span>
                                </div>
                                <div class="col-lg-6">
                                    <!-- <label>Store Adress:</label> -->
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" id="pac-input" name="address" class="controls store_address form-control m-input" placeholder="Enter your store address">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12" id="map">
                                        <label class="">Store Location:</label>
                                        <div class="m-input-icon m-input-icon--right">
                                            <button type="button" class="btn btn-outline-metal m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                                <span><i class="la la-location-arrow"></i><span>Location</span></span>
                                            </button>
                                        </div>
                                        <span class="m-form__help" id="demo"></span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                                        
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

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
            // console.log("marker = "+place.geometry.viewport);
            console.log(formatted_address,bounds.na.l,bounds.ga.l);
            document.getElementById("store_address").value = formatted_address;
            document.getElementById("latitude").value = bounds.na.l;
            document.getElementById("longitude").value = bounds.ga.l;
          });
          map.fitBounds(bounds);
        });
      } 

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQVVrKIOLfXUXP56ql3JrlU8hdlxEzqBA&libraries=places&callback=initAutocomplete" type="text/javascript"></script>


<script>
    var base_url = "<?php url() ?>";
    $('#stores').submit(function(event){	
        event.preventDefault();
        var formData = new FormData($('#stores')[0]);
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
    		url: base_url+'/poststore',
    	    data: formData,
    		success: function (response) {
                // console.log(response);
                document.getElementById("stores").reset();
                $('#delete_result').empty();
                $('#delete_result').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response+'</div>'); 
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