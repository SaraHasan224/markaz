
@extends('layouts.header')

@section('styles')
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.dataTables.css') }}">
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
@endsection 
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{$title}}</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="{{url('/dashboard')}}" class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript:void(0);" class="m-nav__link">
                            <span class="m-nav__link-text">{{$title}}</span>
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
                            {{$title}}
                        </h3>
                    </div>
                </div>
                @if($role == 'Admin' || $role == 'Store Admin')
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{url('create-users')}}/{{$store_id}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add User</span>
                                </span>
                            </a>
                        </li>
                    </ul> 
                </div>
                @endif
            </div>
            <div class="m-portlet__body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        <div id="delete_result" style="padding: 10px;"></div>
                             <!--begin: Datatable -->
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="view_users" style="width: 950px !important;" >
                                <thead>
                                    <tr>
                                        <th>UserID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Phone Number</th>
                                        <th>Profile Picture</th>
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
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


<!-- Modal for View  Store-->
<div class="modal fade" id="view_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_user" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="result" style="padding: 10px;"></div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-12">
                            <label>Username:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="text" name="name" id="edit_name" class="form-control m-input" placeholder="Enter username" >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Email Address:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="email" name="email" id="edit_email" class="form-control m-input" placeholder="Enter email address" >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Phone Number:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="number" name="phone_number" id="edit_phonenumber" class="form-control m-input" placeholder="Enter phone number" >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Assign User Role:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <select class="form-control m-input m-input--square" id="edit_roleid" name="edit_role_id">
                                    @foreach($roles as $role)   
										<option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
								</select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Profile Picture:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="file" name="profile_pic" class="form-control m-input" >
                                <div> <img id="edit_image" /> </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit_image_path" id="edit_image_path" />
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
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#view_users').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax"      : '{{ url("get-users") }}/<?php echo($store_id) ?>',
                "columns"   : [
                    { data: 'id',searchable: false, orderable: true  },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'role_id' },
                    { data: 'phone_number' },
                    { data: 'profile_pic' },
                    { data: 'created_at' },
                    { data: 'actions', searchable: false, orderable: false },
                ]
            });
        });
    </script>
    
    <script>
        var base_url = '<?php url('/') ?>';
        var store_id = "{{ $store_id }}";
        $(document).ready(function (e) {
            // Get User
            $(document).on("click", '#view', function (e) {
                var id = $(this).data('id');
                $.ajax({
					type: "POST",
					headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					},
                    url: base_url+'/view-user/'+store_id,
    		        data: {id: id},
					success: function (response) {
						if(response.success.code == 200)
						{
                            $('#edit_id').val(response.success.message.id);
                            $('#edit_name').val(response.success.message.name);
                            $('#edit_email').val(response.success.message.email);
                            $('#edit_phonenumber').val(response.success.message.phone_number);
                            $('select[name="edit_role_id"]').val(response.success.message.role_id);
                            $('#edit_image').attr('src',response.success.message.user_image);
                            $('#edit_image_path').val(response.success.message.profile_pic);
                            // console.log(response.success.message);
                            $('#view_user').modal('show'); 
						}
					}
				});
            });
            //Edit User
            var table = $('#view_users').DataTable();
            $(document).on("submit", '#edit_user', function (e) {
                e.preventDefault();
                var formData = new FormData($('#edit_user')[0]);
                $.ajax({
					type: "POST",
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData:false,
                    cache:false,
					headers: 
					{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					},
                    url: base_url+'/edit-users/'+store_id,
    		        data: formData,
					success: function (response) {
						if(response.success.code == 200)
						{
                            $('#result').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.success.message+'</div>');
                            setTimeout(function() {
                                $('#view_user').modal('hide'); 
                                $('#result').empty(); 
                                table.ajax.reload();
    						}, 2000);
						}
					}
				});
            });
        });
    </script>
    <script>
        $(document).ready(function (e) {
            // Delete User
            var user_id = "{{$logged_user->id}}";
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
                                    url: base_url+'/delete-users/1',
                                    data: {id: id},
                                    success: function (response) {
                                        console.log(response.success.code);
                                        if(response.success.code == 200)
                                        {
                                            swal.close();
                                            $('#delete_result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.success.message+'</div>');
                                            var table = $('#view_users').DataTable();
                                            table.ajax.reload();
                                        }
                                        if(response.success.code == 200)
                                        {
                                            swal.close();
                                            if(user_id == id)
                                            {
                                                window.location = "/";
                                            }
                                        }
                                    }
                                });
                        }
                    })
            });
        });
    </script>
@endsection