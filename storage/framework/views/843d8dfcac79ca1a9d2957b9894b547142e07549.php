<?php $__env->startSection('styles'); ?>
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
    @media  only screen and (max-width: 1023px) and (min-width: 768px) {  .masonry {
        columns: 2;
    }
    }
    @media  only screen and (min-width: 1024px) {
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                                    <img src="<?php echo e(asset('images/user')); ?>/<?php echo e($logged_user->profile_pic); ?>" alt="" />
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name"><?php echo e($logged_user->name); ?></span>
                                <a href="" class="m-card-profile__email m-link"><?php echo e($logged_user->name); ?></a>
                            </div>
                        </div>
                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            <li class="m-nav__section m--hide">
                                <span class="m-nav__section-text">Section</span>
                            </li>
                            <li class="m-nav__item">
                                <a href="<?php echo e(url('profile')); ?>" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                    <span class="m-nav__link-title">
                                        <span class="m-nav__link-wrap">
                                            <span class="m-nav__link-text">My Profile</span>
                                            <span class="m-nav__link-badge">
                                                <span class="m-badge m-badge--success"><?php echo e(count($stores)); ?></span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="<?php echo e(url('media')); ?>" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                    <span class="m-nav__link-title">
                                        <span class="m-nav__link-wrap">
                                            <span class="m-nav__link-text">My Media</span>
                                            <span class="m-nav__link-badge">
                                                <span class="m-badge m-badge--success"><?php echo e(count($media)); ?></span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="<?php echo e(url('logs')); ?>" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                    <span class="m-nav__link-title">
                                        <span class="m-nav__link-wrap">
                                            <span class="m-nav__link-text">Recent Activities</span>
                                            <span class="m-nav__link-badge">
                                                <span class="m-badge m-badge--success"><?php echo e(count($logs)); ?></span>
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
            <?php echo $__env->yieldContent('profile'); ?>
        </div>
    </div>
</div>

<!-- Modal for Get Store Id-->
<div class="modal fade" id="store_id_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="store_form" mathod="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Store: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control m-input m-input--square" name="store_id">
                        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                            <option value="<?php echo e($st->id); ?>"><?php echo e($st->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="store_submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<input type="hidden" id="role" value="<?php echo e($role); ?>"/>
<input type="hidden" id="store_id" value="<?php echo e($store_id); ?>"/>
<!-- end:: Body -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function (e) {
        var role = $('#role').val();
        var store_id = $('#store_id').val();
        console.log(role);
        var base_url = "<?php url() ?>";
        $('#store_form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    processData: false,
                    headers: 
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: base_url+'/select-store',
                    data: $("#store_form").serialize(),
                    success: function(response){
                        $('#store_id_modal').modal('hide');
                        id = response.id; 
                        window.location.href = "<?php echo e(url()->current()); ?>"+'/'+id;
                    }
                });
        });
        if(role == 'Store Admin' && store_id == '')
        {
            $('#store_id_modal').modal('show');
        }     
    });
</script>
<script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>