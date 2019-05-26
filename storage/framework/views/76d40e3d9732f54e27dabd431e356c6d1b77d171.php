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
}table {
    width: 100% !important;
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
                        <a href="<?php echo e(url('store/'.$id)); ?>" class="m-nav__link">
                            <span class="m-nav__link-text">Store</span>
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
            <div>

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
            </div>
            <div class="m-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="<?php echo e($table_id); ?>">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Id</th>
                            <th>Status</th>
                            <th>Followed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        $(function () {
            $('#followed_stores').DataTable({
                "processing": true,
                "serverSide": true,
                scrollX:        true,
                scrollCollapse: true,
                autoWidth:         true,  
                paging:         true,       
                columnDefs: [    
                    { "width": "70px", "targets": [0] },
                    { "width": "250px", "targets": [1,2,3] }
                ], 
                "ajax"      : '<?php echo e(url("get-followers")); ?>',
                "columns"   : [
                    { data: 'id',searchable: false, orderable: true  },
                    { data: 'name' },
                    { data: 'status' },
                    { data: 'created_at' },
                ]
            });
        });
    </script>
    <script>
        $(function () {
            $('#blocked_stores').DataTable({
                "processing": true,
                "serverSide": true,
                scrollX:        true,
                scrollCollapse: true,
                autoWidth:         true,  
                paging:         true,       
                columnDefs: [    
                    { "width": "70px", "targets": [0] },
                    { "width": "250px", "targets": [1,2,3] }
                ], 
                "ajax"      : '<?php echo e(url("get-unfollowers")); ?>',
                "columns"   : [
                    { data: 'id',searchable: false, orderable: true  },
                    { data: 'name' },
                    { data: 'status' },
                    { data: 'created_at' },
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>