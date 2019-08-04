<?php $__env->startSection('content'); ?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Dashboard</h3>
            </div>

        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--begin:: Widgets/Stats-->
        <div class="m-portlet  m-portlet--unair">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <!--begin::Total Reach-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title" id="views_title">
                                    <?php echo e($views_heading); ?>

                                </h4><br>
                                <!-- <span class="m-widget24__desc">
                                    20% of target
                                </span> -->
                                <span class="m-widget24__stats m--font-brand" id="views_stats">
                                    <?php echo e($store_views); ?>

                                </span><br>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-brand" id="views_progress_bar" role="progressbar" style="width: <?php echo e($store_views); ?>%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number" id="views_statistics">
                                    <?php echo e($store_views); ?>%
                                </span>
                            </div>
                        </div>
                        <!--end::Total Reach-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <!--begin::New Feedbacks-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title" id="follow_title">
                                    <?php echo e($follow_title); ?>

                                </h4><br>
                                <!-- <span class="m-widget24__desc">
                                    Customer Review
                                </span> -->
                                <span class="m-widget24__stats m--font-info" id="follow_stats">
                                    <?php echo e(sprintf('%0.2f',$follow_stats)); ?>

                                </span><br/>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-info" id="follow_progress_bar" role="progressbar" style="width: <?php echo e($follow_statistics); ?>%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number"  id="follow_statistics">
                                    <?php echo e(sprintf('%0.2f',$follow_statistics)); ?> %
                                </span>
                            </div>
                        </div>
                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title" id="rating_title">
                                    <?php echo e($rate_heading); ?> Ratings
                                </h4><br>
                                <!-- <span class="m-widget24__desc">
                                    Fresh Order Amount
                                </span> -->
                                <span class="m-widget24__stats m--font-success" id="rating_stats">
                                    5 Stars
                                </span><br/>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-success"  id="rating_progress_bar" role="progressbar" style="width: <?php echo e(sprintf('%0.2f',$promotion_stats*20)); ?>%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
                                    Change
                                </span>
                                <span class="m-widget24__number" id="rating_statistics">
                                    <?php echo e(sprintf('%0.2f',$promotion_stats)); ?>

                                </span>
                            </div>
                        </div>
                        <!--end::New Orders-->
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Stats-->

        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-4">
                <!--begin:: Widgets/New Users-->
                <div class="m-portlet m-portlet--full-height  m-portlet--unair">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    New <?php echo e($follower_head); ?>

                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                        href="#m_widget4_tab1_content" role="tab">
                                        This Week
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_widget4_tab1_content">
                                <!--begin::Widget 14-->
                                <div class="m-widget4" id="show_followers">
                                    <!--begin::Widget 14 Item-->
                                    <?php if(!empty($follower_data)): ?>
                                        <?php $__currentLoopData = $follower_data->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($role == 'Admin'): ?>
                                                <div class="m-widget4__item">
                                                    <div class="m-widget4__img m-widget4__img--pic">
                                                        <img src="<?php echo e(asset('images/store/logo')); ?>/<?php echo e($data->image); ?>" alt="">
                                                    </div>
                                                    <div class="m-widget4__info">
                                                        <span class="m-widget4__title">
                                                            <?php echo e($data->name); ?> 
                                                        </span><br>
                                                        <span class="m-widget4__sub">
                                                            <?php echo e($data->tagline); ?>

                                                        </span>
                                                    </div>
                                                    <div class="m-widget4__ext">
                                                        <a href="JavaScript::void(0);"
                                                            class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary"><?php echo e(DATE_FORMAT($data->created_at,'d-M')); ?></a>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="m-widget4__item">
                                                    <div class="m-widget4__img m-widget4__img--pic">
                                                        <img src="<?php echo e(asset('images/user')); ?>/<?php echo e($data->hasuser->profile_pic); ?>" alt="">
                                                    </div>
                                                    <div class="m-widget4__info">
                                                        <span class="m-widget4__title">
                                                            <?php echo e($data->hasuser->name); ?> 
                                                        </span><br>
                                                        <span class="m-widget4__sub">
                                                            <?php echo e(DATE_FORMAT($data->created_at,'d-M-Y H-i A')); ?>

                                                        </span>
                                                    </div>
                                                    <div class="m-widget4__ext">
                                                        <a href="JavaScript::void(0);"
                                                            class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php else: ?>
                                        <div class="m-widget4__item">
                                            Store not created  yet
                                        </div>
                                    <?php endif; ?>
                                    <!--end::Widget 14 Item-->
                                </div>
                                <!--end::Widget 14-->
                            </div>  
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/New Users-->
            </div>
            <div class="col-xl-8">

                <!--begin:: Widgets/Best Sellers-->
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Recent Posts
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active show" data-toggle="tab"
                                        href="#m_widget5_tab1_content" role="tab" aria-selected="true">
                                        This Month
                                    </a>
                                </li>
                                <!-- <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content"
                                        role="tab" aria-selected="false">
                                        last Year
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content"
                                        role="tab" aria-selected="false">
                                        All time
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">

                        <!--begin::Content-->
                        <div class="tab-content">
                            <div class="tab-pane active show" id="m_widget5_tab1_content" aria-expanded="true">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    <?php if(!empty($recent_promotions)): ?>
                                    <?php $__currentLoopData = $recent_promotions->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="<?php echo e(asset('images/promotion')); ?>/<?php echo e($pro->image); ?>" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    <?php echo e($pro->title); ?>

                                                </h4>
                                                <span class="m-widget5__desc">
                                                    <?php echo e($pro->description); ?>

                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__info-label">
                                                        Created On:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        <?php echo e($pro->start_time); ?>

                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Valid Uptil:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        <?php echo e($pro->end_time); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <!-- <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">19,200</span>
                                                <br>
                                                <span class="m-widget5__sales">views</span>
                                            </div> -->
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">4.5</span>
                                                <br>
                                                <span class="m-widget5__votes">ratings</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__section">
                                            No  promotions created yet
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <!-- <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product10.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Branding Mockup
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">24,583</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">3809</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product11.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Awesome Mobile App
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">10,054</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1103</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <!--end::m-widget5-->
                            </div>
                            <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product11.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Branding Mockup
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">24,583</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">3809</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product6.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Great Logo Designn
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">19,200</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1046</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product10.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Awesome Mobile App
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">10,054</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1103</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <!--end::m-widget5-->
                            </div>
                            <div class="tab-pane" id="m_widget5_tab3_content" aria-expanded="false">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product10.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Branding Mockup
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">10.054</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1103</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product11.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Great Logo Designn
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">24,583</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">3809</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product6.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Awesome Mobile App
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">19,200</span>
                                                <br>
                                                <span class="m-widget5__sales">1046</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1046</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end::m-widget5-->
                            </div>
                        </div>

                        <!--end::Content-->
                    </div>
                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
        </div>
        <!--End::Section-->

        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-8">
                <!--begin::Portlet-->
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Where are your customers?
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div id="m_gmap_1" style="height:300px;"></div>
                    </div>
                </div>

                <!--end::Portlet-->
            </div>

        </div>
        <!--End::Section-->
    </div>
</div>

<!-- end:: Body -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>