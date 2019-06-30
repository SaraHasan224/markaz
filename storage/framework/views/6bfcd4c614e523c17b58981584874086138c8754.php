<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('assets/admin/css/bootstrap-toggle.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/dataTables.bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/dataTables.bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/jquery.dataTables.css')); ?>">
    <style>
        .dataTables_paginate a {
            padding: 6px 9px !important;
            background: #f7f7f7 !important;
            border-color: #2196F3 !important;
        }
        div.dataTables_wrapper div.dataTables_paginate ul.pagination{
            /* margin: 2px 0px 2px 550px!important; */
            margin: 2px 0px 2px 500px!important;
            white-space: nowrap !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            color: #bfb5b5 !important;
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            /* padding: 0.5em 1em; */
            padding: 0em !important;
            /* margin-left: 2px; */
            margin-left:0px !important;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            *: ;
            cursor: hand; 
            /* color: #333 !important; */
            border: 1px solid transparent;
            border-radius: 2px;
        }
        .dataTables_filter {
            text-align: right;
            margin-left: 220px !important;
        }
        .dataTables_length label {
            font-weight: normal;
            text-align: left;
            margin-right: 311px !important;
            white-space: nowrap;
        }
    </style>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
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
                        <a href="<?php echo e(url('/dashboard')); ?>" class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
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
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <?php echo e($title); ?>

                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a id="new_permit" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>New Permission</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="delete_result" style="padding: 10px;"></div>
                             <!--begin: Datatable -->
                            <table class="table table-striped- table-bordered table-hover table-checkable" style="width: 950px !important;" >
                                <thead>
                                    <tr>
                                        <th>Permission ID</th>
                                        <th>Permission Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th><?php echo e($r->id); ?></th>
                                        <th><?php echo e($r->name); ?></th>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
</div>


<!-- Modal for Creating Permission -->
<div class="modal fade" id="view_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_permit" method="POST">
                <div class="modal-body">
                    <div id="result" style="padding: 10px;"></div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-12">
                            <label>Permission:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" name="name" required class="form-control m-input" placeholder="Enter permission name" >
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/admin/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
    $(document).on("click", '#new_permit', function (e) {
        $('#view_user').modal('show'); 
    });
    var base_url = '<?php url('/') ?>';
    $(document).on("submit", '#create_permit', function (e) {
                e.preventDefault();
                $.ajax({
					type: "POST",
					headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					},
                    url: base_url+'/create-permit',
    		        data: $("#create_permit").serialize(),
					success: function (response) {
						if(response.code == 200)
						{
                            $('#result').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.message+'</div>');
                            setTimeout(function() {
                                $('#view_user').modal('hide'); 
                                $('#result').empty(); 
                                window.location.reload(true);
    						}, 1000);
						}
					}
				});
            });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>