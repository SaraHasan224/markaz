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
                                    <img src="assets/app/media/img/users/user4.jpg" alt="" />
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">Mark Andre</span>
                                <a href="" class="m-card-profile__email m-link">mark.andre@gmail.com</a>
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
                                                <span class="m-badge m-badge--success">2</span>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="<?php echo e(url('activity')); ?>" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-share"></i>
                                    <span class="m-nav__link-text">Activity</span>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>