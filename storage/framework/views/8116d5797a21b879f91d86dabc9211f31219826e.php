<?php $__env->startSection('profile'); ?>
<div class="col-xl-9 col-lg-8">
    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                    <?php if(Session::get('role_name') == 'Store Admin'): ?>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_3"
                            role="tab">
                            Recent Activites
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="m_user_profile_tab_3">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">

                        <!--Begin::Timeline 2 -->
                        <div class="m-timeline-2">
                            <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30" style="margin-top:50px;  margin-left:50px;">
                            <?php if(!empty($logs)): ?>
                                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        if($key % 2 == 0):
                                            $class = 'm--font-danger';
                                        elseif($key % 3 == 0):
                                            $class = 'm--font-success';
                                        elseif($key % 5 == 0):
                                            $class = 'm--font-brand';
                                        elseif($key % 7 == 0):
                                            $class = 'm--font-warning';
                                        else:
                                            $class = 'm--font-info';
                                    endif;
                                    ?> 
                                    <div class="m-timeline-2__item" style=" margin-left:20px;">
                                        <span class="m-timeline-2__item-time"><?php echo e(DATE_FORMAT($time->created_at,'H:i A')); ?></span>
                                        <div class="m-timeline-2__item-cricle" style=" margin-left:40px;">
                                            <i class="fa fa-genderless <?php echo e($class); ?>"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                            <?php echo e($time->component); ?> was <?php echo e($time->operation); ?>  by <?php echo e($time->component_name); ?>

                                        </div>
                                    </div>
                                    <br/>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </div>
                        </div>

                        <!--End::Timeline 2 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>