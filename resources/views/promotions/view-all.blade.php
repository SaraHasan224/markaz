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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="flaticon-danger"></i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
        </div>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="flaticon-danger"></i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>Well done!</strong> You successfully read this important alert message.
        </div>
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{$title}}
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{url('create-promotions')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Create Promotion</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="view_promotions">
                    <thead>
                        <tr>
                            <th>PromotionID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Store Id</th>
                            <th>Created At</th>
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
<div class="modal fade" id="m_status_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
<!-- Modal for View  Store-->

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
            <form id="edit_user" method="POST">
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
                            <label>Profile Picture:</label>
                            <div class="m-input-icon m-input-icon--right">
                                <input type="file" name="profile_picture" class="form-control m-input" >
                                <div> <img id="edit_image"/> </div>
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
@endsection
@section('scripts')
<script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#view_promotions').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax"      : '{{ url("get-promotions") }}',
                "columns"   : [
                    { data: 'id',searchable: false, orderable: true  },
                    { data: 'title' },
                    { data: 'description' },
                    { data: 'store_id' },
                    { data: 'created_at' },
                    { data: 'actions', searchable: false, orderable: false },
                ]
            });
        });
    </script>
    
    <script>
        $(document).ready(function (e) {
            $(document).on("click", '#m_view_6', function (e) {
                var id = $(this).data('id');
                alert(id);
            });
        });
    </script>
    <script>
        $(document).ready(function (e) {
            $(document).on("click", '#m_status_6', function (e) {
                var id = $(this).data('id');
                alert(id);
                // $("#status_id1").val(id);
            });
        });
    </script>
@endsection