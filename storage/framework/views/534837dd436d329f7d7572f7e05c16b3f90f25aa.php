<?php $__env->startSection('content'); ?>


<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Frequently Asked Questions</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="<?php echo e(url('/dashboard')); ?> " class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript:void(0);" class="m-nav__link">
                            <?php if(!empty($store)): ?>
                                <?php echo e($store->name); ?>

                            <?php else: ?>
                                Markaz
                            <?php endif; ?>
                        </a>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript::void(0);" class="m-nav__link">
                            <span class="m-nav__link-text">FAQs</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--space">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h1 class="m-portlet__head-text">
                            <?php if(!empty($store)): ?>
                                <?php echo e($store->name); ?>

                            <?php else: ?>
                                Markaz
                            <?php endif; ?>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="m-tabs-content" id="m_sections">

                            <!--begin::Section 1-->
                            <div class="m-tabs-content__item m-tabs-content__item--active" id="m_section_1">
                                <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Frequently Asked Questions</h4>
                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_1_content">
                                <?php if(count($questions) > 0): ?>
                                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!--begin::Item-->
                                        <div class="m-accordion__item">
                                            <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_<?php echo e($ques->id); ?>_content_<?php echo e($ques->id); ?>_head" data-toggle="collapse" href="#m_section_<?php echo e($ques->id); ?>_content_<?php echo e($ques->id); ?>_body">
                                                <span class="m-accordion__item-title"><?php echo e($ques->title); ?></span>
                                                <span class="m-accordion__item-mode"></span>
                                            </div>
                                            <div class="m-accordion__item-body collapse show" id="m_section_<?php echo e($ques->id); ?>_content_<?php echo e($ques->id); ?>_body" role="tabpanel" aria-labelledby="m_section_<?php echo e($ques->id); ?>_content_<?php echo e($ques->id); ?>_head" data-parent="#m_section_<?php echo e($ques->id); ?>_content">
                                                <div class="m-accordion__item-content">
                                                    <p><?php echo $ques->description; ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end::Item-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>   
                                    No questions added
                                <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end::Portlet-->
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
                    <select class="form-control m-input m-input--square" id="store_id" name="store_id">
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
<!-- end:: Body -->
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        $(document).ready(function (e) {
            
            var role = '<?php echo e($role); ?>';
            var id = '<?php echo e($store_id); ?>';
            id = id != '' ? id : 0;
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
                        window.location.href = base_url+"/faq/"+id;
                    }
                });
            });
            if(role == 'Store Admin')
            {
                if(id != 0){
                    $(function () {
                        $('#view_stores').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax"      : '<?php echo e(url("get-support")); ?>/'+id,
                            "columns"   : [
                                { data: 'id',searchable: false, orderable: true  },
                                { data: 'store_id' },
                                { data: 'first_name' },  
                                { data: 'email' },  
                                { data: 'subject' },
                                { data: 'description' },
                                { data: 'status' },
                                { data: 'created_at' },
                                // { data: 'actions', searchable: false, orderable: false },
                            ]
                        });
                    });
                }else{
                    $('#store_id_modal').modal('show');
                }
            }else{                
                $(function () {
                        $('#view_stores').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax"      : '<?php echo e(url("get-support")); ?>',
                            "columns"   : [
                                { data: 'id',searchable: false, orderable: true  },
                                { data: 'store_id' },
                                { data: 'first_name' },  
                                { data: 'email' },  
                                { data: 'subject' },
                                { data: 'description' },
                                { data: 'status' },
                                { data: 'created_at' },
                                // { data: 'actions', searchable: false, orderable: false },
                            ]
                        });
                });
            }     

            
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>