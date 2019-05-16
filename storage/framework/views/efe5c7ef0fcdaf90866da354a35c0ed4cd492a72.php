<?php $__env->startSection('styles'); ?>
<script type="text/javascript">
    function showPosition(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                document.getElementById("demo").innerHTML = positionInfo;
            });
        } else{
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    }
</script>
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
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="stores">
                        <div class="m-portlet__body">
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?> m-form__group row">
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
                            <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?> m-form__group row">
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
                                <div class="col-lg-6">
                                    <label class="">Store Location:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <button type="button"
                                            class="btn btn-outline-metal m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"
                                            onclick="showPosition();">
                                            <span><i class="la la-location-arrow"></i><span>Location</span></span>
                                        </button>
                                    </div>
                                    <span class="m-form__help" id="demo"></span>
                                    <input type="hidden" name="user_id" value="1"/>
                                    <!-- <input type="hidden" name="user_id" value="$user"/> -->
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
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }
</script>
<script>
    $('#stores').submit(function(event){	
    	console.log(JSON.stringify($("#stores").serialize()));	
    	event.preventDefault();
            var name = $("input[name=name]").val();
            var contact_number = $("input[name=contact_number]").val();
            var address = $("input[name=address]").val();
            var user_id = $("input[name=user_id]").val();
            var base_url = "<?php url() ?>";
            console.log(base_url);
    	// console.log(name,contact_number,address,user_id);	
    	$.ajax({
    		type: "POST",
    		headers: 
    		{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			// "Content-Type": "application/json",
                // "X-Requested-With": "XMLHttpRequest",
                // "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9tYXJrYXoudGVzdC9hcGkvdXNlci9zaWduaW4iLCJpYXQiOjE1NTQ2Mzg5MDQsImV4cCI6MTU1NDY0MjUwNCwibmJmIjoxNTU0NjM4OTA0LCJqdGkiOiJTUzdsbGN5RklJVXRRTzhrIn0.ukIIC8Rc69DZk6YrIOznr-nLXQznm750hZqhebboIag"
    		},
    		url: base_url+'/poststore',
    		data: $("#stores").serialize(),
    		success: function (response) {
    			console.log(response);

    		}
    	});
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>