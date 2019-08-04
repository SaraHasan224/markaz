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
                <?php if($role == 'Admin' || $role == 'Store Admin'): ?>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="<?php echo e(url('create-store')); ?>" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>New Store</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <div class="m-portlet__body table-responsive">
                <div id="delete_result" style="padding: 10px;"></div>
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="view_stores">
                    <thead>
                        <tr>
                            <th>StoreID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Ratings</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Actions</th>
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


<!-- Modal for Update status-->
<div class="modal fade" id="status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                    essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                    containing Lorem Ipsum passages, and more recently
                    with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        var user_id = '<?php echo e($user_id); ?>';
        var role  = '<?php echo e($role); ?>';
        if(user_id > 0 && role != 'Admin')
        {
            $(function () {
                $('#view_stores').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax"      : '<?php echo e(url("get-store")); ?>'+'/'+user_id,
                    "columns"   : [
                        { data: 'id',searchable: false, orderable: true  },
                        { data: 'category_id' },
                        { data: 'name' },
                        { data: 'address' },
                        { data: 'ratings'},
                        { data: 'created_at' },  
                        { data: 'status' },
                        { data: 'actions', searchable: false, orderable: false },
                    ]
                });
            });
        }else{ 
            $(function () {
                $('#view_stores').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax"      : '<?php echo e(url("get-store")); ?>',
                    "columns"   : [
                        { data: 'id',searchable: false, orderable: true  },
                        { data: 'category_id' },
                        { data: 'name' },
                        { data: 'address' },
						{ data: 'ratings'},
						{ data: 'created_at' },
                        { data: 'status' },
                        { data: 'actions', searchable: false, orderable: false },
                    ]
                });
            });
        }
    </script>
    
    <script>
        $(document).ready(function (e) {
            $(document).on("click", '#view_store', function (e) {
                var id = $(this).data('id');
                $('#view_store_modal').modal('show');
            });
        }); 
    </script>
    <script>
    // Delete a store
        $(document).ready(function (e) {
            // Delete Store
            var base_url = '<?php url('/') ?>';
            $(document).on("click", '#delete', function (e) {
                var id = $(this).data('id');
                    e.preventDefault();
                    swal({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: !0
                    }).then(function(e) {
                        e.value ? swal("Deleted!", "User has been deleted.", "success") : "cancel" === e.dismiss && swal("Cancelled", "User not deleted", "error");
                        if(e.value == true)
                        {
                                $.ajax({
                                    type: "POST",
                                    headers: 
                                    {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    url: base_url+'/delete-store',
                                    data: {id: id},
                                    success: function (response) {
                                        console.log(response.code);
                                        if(response.code == 200)
                                        {
                                            swal.close();
                                            $('#delete_result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.success.message+'</div>');
                                            var table = $('#view_stores').DataTable();
                                            table.ajax.reload();
                                        }
                                    }
                                });
                        }
                    })
            });
        });
    </script>
    
    <script>
            // Update Store Status
        $(document).ready(function (e) {
            var base_url = '<?php url('/') ?>';
            $(document).on("click", '#status', function (e) {
                var id = $(this).data('id');
                    e.preventDefault();
                    swal({
                        title: "Are you sure?",
                        text: "You want to update store status?",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "Yes, disable/enable it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: !0
                    }).then(function(e) {
                        e.value ? swal("Updated!", "Store status has been updated.", "success") : "cancel" === e.dismiss && swal("Cancelled", "Status not updated", "error");
                        if(e.value == true)
                        {
                                $.ajax({
                                    type: "POST",
                                    headers: 
                                    {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    url: base_url+'/update-store-status',
                                    data: {id: id},
                                    success: function (response) {
                                        console.log(response.code);
                                        if(response.code == 200)
                                        {
                                            swal.close();
                                           var table = $('#view_stores').DataTable();
                                            table.ajax.reload();
                                        }
                                    }
                                });
                        }
                    })
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>