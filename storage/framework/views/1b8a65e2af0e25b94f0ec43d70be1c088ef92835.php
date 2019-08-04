<?php $__env->startSection('styles'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- END: Left Aside -->
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
                        <a href="<?php echo e(url('store')); ?>" class="m-nav__link">
                            <span class="m-nav__link-text">Stores</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript:void(0);" class="m-nav__link">
                            <span class="m-nav__link-text"><?php echo e($title); ?></span>
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
                                    <?php echo e($title); ?>

                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="stores" method="POST">
                        <div class="m-portlet__body">
                            <div id="delete_result" style="padding: 10px;"></div>
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?> m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Name:</label>
                                    <input type="text" name="name" class="form-control m-input" placeholder="Enter store name" value="<?php echo e(!empty($store) ? $store->name : ''); ?>">
                                    <span class="m-form__help">Enter your store name</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Category:</label>
                                    <select class="form-control m-input m-input--square" id="exampleSelect1" name="category_id">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($category->id); ?>" <?php if($category->id == $store->category_id): ?> selected="selected" <?php endif; ?>><?php echo e($category->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
                                    <span class="m-form__help">Select your store category</span>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('website') ? ' has-error' : ''); ?> m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Website Link:</label>
                                    <input type="text" name="website" class="form-control m-input" placeholder="Enter website link" value="<?php echo e(!empty($store) ? $store->website : ''); ?>">
                                    <span class="m-form__help">Enter your website</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Tagline:</label>
                                    <input type="text" name="tagline" class="form-control m-input" placeholder="Enter website link" value="<?php echo e(!empty($store) ? $store->tagline : ''); ?>">
                                    <span class="m-form__help">Enter your store tagline</span>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Logo:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="file" name="image" class="form-control m-input" accept="image/png, image/jpeg, image/jpg, image/pneg">
                                        <input type="hidden" name="p_image" class="form-control m-input" value="<?php echo e($store->image); ?>">
                                    </div>
                                    <span class="m-form__help">Select a logo</span>
                                    <img src="<?php echo e(asset('images/store/logo')); ?>/<?php echo e($store->image); ?>" style="margin-left:200px; width:250px; height:120px"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Cover:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="file" name="cover" class="form-control m-input" accept="image/png, image/jpeg, image/jpg, image/pneg">
                                    </div>
                                    <span class="m-form__help">Select a cover</span>
                                    <img src="<?php echo e(asset('images/store/cover')); ?>/<?php echo e($store->cover); ?>" style="margin-left:200px; width:250px; height:120px"/>
                                        <input type="hidden" name="p_cover" class="form-control m-input" value="<?php echo e($store->cover); ?>">
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?> m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Description:</label>
                                    <textarea name="description" class="form-control m-input" placeholder="Enter description" rows="4" cols="50"><?php echo e(!empty($store) ? $store->description : ''); ?></textarea>
                                    <span class="m-form__help">Enter your store description</span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Store Contact Email:</label>
                                    <textarea name="contact_email" class="form-control m-input" cols="50" rows="5"><?php echo e(!empty($store) ? $store->emailaddress : ''); ?></textarea>
                                    <span class="m-form__help">Enter your store contact email</span>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('contact_number') ? ' has-error' : ''); ?> m-form__group row">
                                <div class="col-lg-6">
                                    <label class="">Store Contact Number:</label>
                                    <textarea name="contact_number" class="form-control m-input" cols="50" rows="10"> <?php echo e(!empty($store) ? $store->telephone : ''); ?></textarea>
                                    <span class="m-form__help">Enter your store contact number</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Store Facebook Link:</label>
                                    <input type="text" name="fb_link" class="form-control m-input" placeholder="Enter facebook link" value="<?php echo e(!empty($store->hassocialmedia) ? $store->hassocialmedia->facebook_link : ''); ?>">
                                    <span class="m-form__help">Enter your facebook link</span>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('insta_link') ? ' has-error' : ''); ?> m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Instagram Link:</label>
                                    <input type="text" name="insta_link" class="form-control m-input" placeholder="Enter instagram link" value="<?php echo e(!empty($store->hassocialmedia) ? $store->hassocialmedia->insta_link : ''); ?>">
                                    <span class="m-form__help">Enter your instagram link</span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Store Twitter Link:</label>
                                    <input type="text" name="tw_link" class="form-control m-input" placeholder="Enter store  twitter link" value="<?php echo e(!empty($store->hassocialmedia) ? $store->hassocialmedia->twitter_link : ''); ?>">
                                    <span class="m-form__help">Enter your store twitter link</span>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>"/>
                                    <input type="hidden" name="longitude" id="longitude" value="<?php echo e(!empty($store) ? $store->longitude : ''); ?>" />
                                    <input type="hidden" name="latitude" id="latitude" value="<?php echo e(!empty($store) ? $store->latitude : ''); ?>"/>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Store Address Selected:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" id="store_address" class="form-control m-input" placeholder="Enter address" disabled value="<?php echo e(!empty($store) ? $store->address : ''); ?>"/>
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
                                        <input type="text" id="pac-input" name="address" class="controls store_address form-control m-input" placeholder="Enter your store address" value="<?php echo e(!empty($store) ? $store->address : ''); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12" id="map">
                                        <label class="">Store Location:</label>
                                        <!-- <div class="m-input-icon m-input-icon--right">
                                            <button type="button" class="btn btn-outline-metal m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                                <span><i class="la la-location-arrow"></i><span>Location</span></span>
                                            </button>
                                        </div> -->
                                        <span class="m-form__help" id="demo"></span>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?> 
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
                // console.log(formatted_address,bounds.ga.l,bounds.ia.l);
                document.getElementById("store_address").value = formatted_address;
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
    var id = "<?php echo e(json_decode($store->id)); ?>";
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
    		url: base_url+'/edit-store/'+id, 
    		data: formData,
    		success: function (response) {
				$("html, body").animate({ scrollTop: 0 }, "slow");
				$(window).scrollTop(0);
				document.getElementById("stores").reset();
				$('#delete_result').empty();
				$('#delete_result').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response+'</div>');
				setTimeout(function() {
					window.location.reload(true);
				}, 3000);
            },
            error: function (response){
				$("html, body").animate({ scrollTop: 0 }, "slow");
				$(window).scrollTop(0);
				response.responseJSON.messages.forEach(function (msg) {
					// console.log(msg);
					$('#delete_result').empty();
					$('#delete_result').append('<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="flaticon-danger"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+msg+'.</div>')
				});
            }
    	});
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>