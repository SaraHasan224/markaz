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
                            <a id="add_tags" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Create Tags</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <div class="m-portlet__body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="delete_result" style="padding: 10px;"></div>
                        </div>
                        <div class="col-md-12" style="margin:0 auto; " id="table">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="pro_tags">
                                <thead>
                                    <tr>
                                        <th>TagsID</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--begin: Datatable -->
                
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


<!-- Modal for Add Promotion Tags-->
<div class="modal fade" id="add_tags_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Promotion Tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_tags_form" method="POST">
                <div class="modal-body">
                        <div id="result" style="padding: 10px;"></div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-12">
                            <label>Tags:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" name="tag" class="form-control m-input" placeholder="Enter tags" value="">
                            </div>
                            <span class="m-form__help">Enter tag</span>
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
<!-- Modal for Add Promotion Tags-->

<!-- Modal for Edit Promotion Tags-->
<div class="modal fade" id="edit_tags_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Promotion Tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_tags_form" method="POST">
                <div class="modal-body">
                        <div id="result_edit" style="padding: 10px;"></div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-12">
                            <label>Tag:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" name="tag" id="tag" class="form-control m-input" placeholder="Enter tag" >
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="edit_id" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal for Edit Promotion Tags-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        
        $(function () {
            $('#pro_tags').DataTable({
                "processing": true,
                "serverSide": true,
                scrollX:        true,
                scrollCollapse: true,
                autoWidth:         true,  
                paging:         true,       
                columnDefs: [    
                { "width": "70px", "targets": [0] },
                { "width": "200px", "targets": [1,2,3] },       
                { "width": "70px", "targets": [4] }
            ], 
                "ajax"      : '<?php echo e(url("get-tags")); ?>', 
                "columns"   : [
                    { data: 'id',searchable: false, orderable: true  },
                    { data: 'title' },
                    { data: 'status' },
                    { data: 'created_at' },
                    { data: 'actions', searchable: false, orderable: false },
                ]
            });
            $(".dataTables_wrapper").css("width","100%");
        });
    </script>
    
    <script>
        $(document).ready(function (e) {
            $(document).on("click", '#edit_tags', function (e) {
                var id = $(this).data('id');
                var tag = $(this).data('tag');
                $('#result_edit').empty();
                $('#edit_id').val(id);
                $('#tag').val(tag);
                $('#edit_tags_model').modal('show');
            });
        });
    </script>
    <script>
        $(document).ready(function (e) {
            $(document).on("click", '#add_tags', function (e) {
                $('#add_tags_model').modal('show');
            });
        });
    </script>
    <script>
        var base_url = "<?php url() ?>";
        $('#add_tags_form').submit(function(event){	
            event.preventDefault();
            $.ajax({
                type: "POST",
                headers: 
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url+'/promotion-tags',
                data: $("#add_tags_form").serialize(),
                success: function (response) {
                    $('#result').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response+'</div>');
                    setTimeout(function() {
                        $('#add_tags_model').modal('hide');
                        document.getElementById('add_tags_form').reset();
                        $('#result').empty();
                        var table = $('#pro_tags').DataTable();
                        table.ajax.reload();
                    }, 2000);
                }
            });
        });
        $('#edit_tags_form').submit(function(event){	
            event.preventDefault();
            $.ajax({
                type: "POST",
                headers: 
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url+'/promotion-tags-edit',
                data: $("#edit_tags_form").serialize(),
                success: function (response) {
                    console.log(response);
                    if(response.code == 200)
                    {
                        $('#result_edit').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.success+'</div>');
                    }
                     setTimeout(function() {
                        $('#edit_tags_model').modal('hide');
                        document.getElementById('edit_tags_form').reset();
                        $('#result_edit').empty();
                        var table = $('#pro_tags').DataTable();
                        table.ajax.reload();
                    }, 2000);
                },
                error: function(response){
                    console.log(response.responseText);
                    // response.responseText.error.forEach(function (msg) {
                            $('#result_edit').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.responseText.error+'</div>');
                        // })
                }
            });
        });
        // Delete User
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
                        url: base_url+'/promotion-tags-delete',
                        data: {id: id},
                        success: function (response) {
                            if(response.success.code == 200)
                            {
                                swal.close();
                                $('#delete_result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.success.message+'</div>');
                                var table = $('#pro_tags').DataTable();
                                table.ajax.reload();
                            }
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>