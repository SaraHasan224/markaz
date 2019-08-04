<?php $__env->startSection('content'); ?>
<!-- END: Left Aside -->
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator"> <?php echo e($title); ?></h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"><?php echo e($title); ?></span>
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

        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo e($title); ?>

                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                            role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget2_tab1_content"
                                    role="tab" aria-expanded="true">
                                    Last Week
                                </a>
                            </li>
                            <!-- <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content"
                                    role="tab" aria-expanded="false">
                                    Month
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content"
                                    role="tab" aria-expanded="false">
                                    All Week
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget2_tab1_content" aria-expanded="true">

                            <!--begin:Timeline 1-->
                            <div class="m-timeline-1 m-timeline-1--fixed">
                                <div class="m-timeline-1__items">
                                    <div class="m-timeline-1__marker"></div>                                 
                                    <div class="m-timeline-1__item m-timeline-1__item--left m-timeline-1__item--first">
                                        <div class="m-timeline-1__item-circle">
                                            <div class="m--bg-danger"></div>
                                        </div>
                                        <div class="m-timeline-1__item-arrow"></div>
                                        <span class="m-timeline-1__item-time m--font-brand"><?php if(!empty($store) || $store != []): ?> <?php echo e(DATE_FORMAT($store->created_at,'d-M-Y')); ?> / <?php echo e(DATE_FORMAT($store->created_at,'H:i A')); ?> <?php endif; ?></span>
                                        <div class="m-timeline-1__item-content">
                                            <div class="media">
                                                <img class="m--margin-right-20"
                                                    src="<?php echo e(asset('images/store/logo/')); ?>/<?php echo e($store->image); ?>" title="">
                                                <div class="media-body">
                                                    <p style="font-weight:450;">Store Created<p> 
                                                    <div class="m-timeline-1__item-title m--margin-top-10  "><?php echo e($store->name); ?></div>
                                                    <div class="m-timeline-1__item-body"><?php echo e(str_limit($store->tagline,100)); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <?php if(!empty($promotions)): ?>
                                    <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                        <?php if($pkey %2  == 0): ?> 
                                        <div class="m-timeline-1__item m-timeline-1__item--right">
                                        <?php else: ?>
                                        <div class="m-timeline-1__item m-timeline-1__item--left">
                                        <?php endif; ?>
                                        <div class="m-timeline-1__item-circle">
                                            <div class="m--bg-danger"></div>
                                        </div>
                                        <div class="m-timeline-1__item-arrow"></div>
                                        span class="m-timeline-1__item-time m--font-brand"><?php if(!empty($promotion) || $promotion != []): ?> <?php echo e(DATE_FORMAT($promotion->created_at,'d-M-Y')); ?> / <?php echo e(DATE_FORMAT($promotion->created_at,'H:i A')); ?> <?php endif; ?></span>
                                        <?php if($promotion != [] || !empty($promotion)): ?>
                                        <div class="m-timeline-1__item-content">
                                            <div class="media">
                                                <img class="m--margin-right-20"
                                                    src="<?php echo e(asset('images/promotion')); ?>/<?php echo e($promotion->image); ?>" title="">
                                                <div class="media-body">
                                                    <p style="font-weight:450;">Promotion created against store <?php echo e($store->name); ?><p>
                                                    <div class="m-timeline-1__item-title m--margin-top-10  "><?php echo e($promotion->title); ?></div>
                                                    <div class="m-timeline-1__item-body"><?php echo e(str_limit($promotion->description,100)); ?></div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <?php if(!empty($support)): ?>
                                    <?php $__currentLoopData = $support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key %2  == 0): ?> 
                                        <div class="m-timeline-1__item m-timeline-1__item--left">
                                        <?php else: ?>
                                        <div class="m-timeline-1__item m-timeline-1__item--right">
                                        <?php endif; ?>
                                            <div class="m-timeline-1__item-circle">
                                                <div class="m--bg-danger"></div>
                                            </div>
                                            <div class="m-timeline-1__item-arrow"></div>
                                            <span class="m-timeline-1__item-time m--font-brand"><?php echo e(DATE_FORMAT($s->created_at,'d-M-Y')); ?> / <?php echo e(DATE_FORMAT($s->created_at,'H:i A')); ?></span>
                                            <div class="m-timeline-1__item-content">
                                                <div class="m-timeline-1__item-title">
                                                    Support Query
                                                </div>
                                                <div class="m-timeline-1__item-body">
                                                    <p style="font-weight:450;">Recently a user <?php echo e($s->first_name.' '.$s->last_name); ?> registered complain against <?php echo e($s->store_id); ?> Store<p> <br/>
                                                    Lorem ipsum dolor sit amit,consectetur eiusmdd
                                                    <br> tempor incididunt ut labore et dolore magna enim
                                                    <br> ad minim veniam nostrud.
                                                </div>
                                                <div class="m-timeline-1__item-actions">
                                                    <a href="<?php echo e(url('support')); ?>"
                                                        class="btn btn-sm btn-outline-brand m-btn m-btn--pill m-btn--custom">Read
                                                        more...</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <?php if(!empty($follower)): ?>
                                        <?php $__currentLoopData = $follower; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey => $followed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="m-timeline-1__item m-timeline-1__item--left">
                                            <div class="m-timeline-1__item-circle">
                                                <div class="m--bg-danger"></div>
                                            </div>
                                            <div class="m-timeline-1__item-arrow"></div>
                                            <span class="m-timeline-1__item-time m--font-brand"><?php echo e(DATE_FORMAT($followed->created_at,'d-M-Y')); ?> / <?php echo e(DATE_FORMAT($followed->created_at,'H:i A')); ?></span>
                                            <div class="m-timeline-1__item-content">
                                                <div class="m-timeline-1__item-title">
                                                    Users Followed Today
                                                </div>
                                                <div class="m-timeline-1__item-body">
                                                    <div class="m-list-pics">
                                                            <img src="<?php echo e(asset('images/user')); ?>/<?php echo e($followed->hasuser->profile_pic); ?>" title="<?php echo e($followed->hasuser->name); ?>" class="img-circle" style="width: 35px; border-radius: 100px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <?php if(!empty($blocked)): ?>
                                        <?php $__currentLoopData = $blocked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey => $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="m-timeline-1__item m-timeline-1__item--right">
                                            <div class="m-timeline-1__item-circle">
                                                <div class="m--bg-danger"></div>
                                            </div>
                                            <div class="m-timeline-1__item-arrow"></div>
                                            <span class="m-timeline-1__item-time m--font-brand"><?php echo e(DATE_FORMAT($block->created_at,'d-M-Y')); ?> / <?php echo e(DATE_FORMAT($block->created_at,'H:i A')); ?></span>
                                            <div class="m-timeline-1__item-content">
                                                <div class="m-timeline-1__item-title">
                                                    Users Unfollowed
                                                </div>
                                                <div class="m-timeline-1__item-body">
                                                    <div class="m-list-pics">
                                                            <img src="<?php echo e(asset('images/user')); ?>/<?php echo e($block->hasuser->profile_pic); ?>" title="<?php echo e($block->hasuser->name); ?>" class="img-circle">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!--End:Timeline 1-->
                        </div>
                        <div class="tab-pane" id="m_widget2_tab2_content">

                            <!--begin:Timeline 2-->
                            <div class="m-timeline-1 m-timeline-1--fixed">
                                <div class="m-timeline-1__items">
                                    <div class="m-timeline-1__marker"></div>
                                    <div class="m-timeline-1__item m-timeline-1__item--left m-timeline-1__item--first">
                                        <div class="m-timeline-1__item-circle">
                                            <div class="m--bg-danger"></div>
                                        </div>
                                        <div class="m-timeline-1__item-arrow"></div>
                                        <span class="m-timeline-1__item-time m--font-brand">11:35
                                            <span>AM</span>
                                        </span>
                                        <div class="m-timeline-1__item-content">
                                            <div class="m-timeline-1__item-title">
                                                Users Joined Today
                                            </div>
                                            <div class="m-timeline-1__item-body">
                                                <div class="m-list-badge m--margin-bottom-20">
                                                    <div class="m-list-badge__label m--font-danger">12:00</div>
                                                    <div class="m-list-badge__items">
                                                        <a href="#"
                                                            class="m-list-badge__item m-list-badge__item--brand">Technology</a>
                                                        <a href="#"
                                                            class="m-list-badge__item m-list-badge__item--focus">Sport</a>
                                                        <a href="#"
                                                            class="m-list-badge__item m-list-badge__item--success">Art</a>
                                                        <a href="#"
                                                            class="m-list-badge__item m-list-badge__item--danger">Music</a>
                                                    </div>
                                                </div>
                                                <div class="m-list-badge m--margin-bottom-20">
                                                    <div class="m-list-badge__label m--font-brand">18:30</div>
                                                    <div class="m-list-badge__items">
                                                        <span class="m-list-badge__item m-list-badge__item--focus">Web
                                                            Design</span>
                                                        <span
                                                            class="m-list-badge__item m-list-badge__item--warning">Programming</span>
                                                        <span
                                                            class="m-list-badge__item m-list-badge__item--info">Illustration</span>
                                                    </div>
                                                </div>
                                                <div class="m-list-badge">
                                                    <div class="m-list-badge__label m--font-warning">12:40</div>
                                                    <div class="m-list-badge__items">
                                                        <a href="#"
                                                            class="m-list-badge__item m-list-badge__item--brand">Yoga</a>
                                                        <a href="#"
                                                            class="m-list-badge__item m-list-badge__item--primary">Cooking</a>
                                                        <a href="#"
                                                            class="m-list-badge__item m-list-badge__item--danger">Dance</a>
                                                        <a href="#"
                                                            class="m-list-badge__item m-list-badge__item--warning">Gym</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-timeline-1__item m-timeline-1__item--right">
                                        <div class="m-timeline-1__item-circle">
                                            <div class="m--bg-danger"></div>
                                        </div>
                                        <div class="m-timeline-1__item-arrow"></div>
                                        <span class="m-timeline-1__item-time m--font-brand">02:50
                                            <span>PM</span>
                                        </span>
                                        <div class="m-timeline-1__item-content">
                                            <div style="height:170px;">
                                                <div
                                                    style="height:100%;overflow:hidden;display:block;background: url(http://maps.googleapis.com/maps/api/staticmap?center=48.858271,2.294264&amp;size=640x300&amp;zoom=5&amp;key=AIzaSyBMlTEcPR5QULmk9QUaS7lwUK7qtabunEI) no-repeat 50% 50%;">
                                                    <img src="http://maps.googleapis.com/maps/api/staticmap?center=48.858271,2.294264&amp;size=640x300&amp;zoom=16&amp;key=AIzaSyBMlTEcPR5QULmk9QUaS7lwUK7qtabunEI"
                                                        style="" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-timeline-1__item m-timeline-1__item--left">
                                        <div class="m-timeline-1__item-circle">
                                            <div class="m--bg-danger"></div>
                                        </div>
                                        <div class="m-timeline-1__item-arrow"></div>
                                        <span class="m-timeline-1__item-time m--font-brand">02:58
                                            <span>PM</span>
                                        </span>
                                        <div class="m-timeline-1__item-content">
                                            <div class="m-timeline-1__item-title">
                                                Latest News
                                            </div>
                                            <div class="m-timeline-1__item-body m--margin-top-20">
                                                Lorem ipsum dolor sit amit,consectetur eiusmdd
                                                <br> tempor incididunt ut labore et dolore magna enim
                                                <br> ad minim veniam nostrud
                                            </div>
                                            <div class="m-timeline-1__item-btn m--margin-top-25">
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-brand m-btn m-btn--pill m-btn--custom">Read
                                                    more...</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-timeline-1__item m-timeline-1__item--right">
                                        <div class="m-timeline-1__item-circle">
                                            <div class="m--bg-danger"></div>
                                        </div>
                                        <div class="m-timeline-1__item-arrow"></div>
                                        <span class="m-timeline-1__item-time m--font-brand">04:10
                                            <span>PM</span>
                                        </span>
                                        <div class="m-timeline-1__item-content">
                                            <div class="m-timeline-1__item-title">
                                                My ToDo
                                            </div>
                                            <div class="m-list-badge m--margin-top-15">
                                                <div class="m-list-badge__label m--font-success">12:00</div>
                                                <div class="m-list-badge__items">
                                                    <a href="#" class="m-list-badge__item">Hiking</a>
                                                    <a href="#" class="m-list-badge__item">Lunch</a>
                                                    <a href="#" class="m-list-badge__item">Meet John</a>
                                                </div>
                                            </div>
                                            <div class="m-list-badge m--margin-top-15">
                                                <div class="m-list-badge__label m--font-success">13:00</div>
                                                <div class="m-list-badge__items">
                                                    <span class="m-list-badge__item">Setup AOL</span>
                                                    <span class="m-list-badge__item">Write Code</span>
                                                </div>
                                            </div>
                                            <div class="m-list-badge m--margin-top-15">
                                                <div class="m-list-badge__label m--font-success">14:00</div>
                                                <div class="m-list-badge__items">
                                                    <a href="#" class="m-list-badge__item">Just Keep Doing Something</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-timeline-1__item m-timeline-1__item--left m--margin-top-10">
                                        <div class="m-timeline-1__item-circle">
                                            <div class="m--bg-danger"></div>
                                        </div>
                                        <div class="m-timeline-1__item-arrow"></div>
                                        <span class="m-timeline-1__item-time m--font-brand">05:00
                                            <span>PM</span>
                                        </span>
                                        <div class="m-timeline-1__item-content">
                                            <div class="media">
                                                <img class="m--margin-right-20"
                                                    src="../../assets/app/media/img/products/product1.jpg" title="">
                                                <div class="media-body">
                                                    <div class="m-timeline-1__item-title m--margin-top-10  ">
                                                        Some Post
                                                    </div>
                                                    <div class="m-timeline-1__item-body">
                                                        Lorem ipsum dolor sit amit
                                                        <br> consectetur eiusmdd
                                                        <br> tempor incididunt ut labore
                                                        <br> et dolore magna
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m--align-center">
                                    <button type="button" class="btn btn-sm m-btn--custom m-btn--pill  btn-focus">Load
                                        More</button>
                                </div>
                            </div>

                            <!--End:Timeline 2-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>