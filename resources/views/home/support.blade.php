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
        <div id="response_recieved"></div>
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{$title}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body " >
                <div class="table-responsive" style="overflow-y:hidden;">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="view_stores" >
                        <thead>
                            <tr>
                                <th>SupportID</th>
                                <th>Store Name</th>
                                <th>Customer Name</th>
                                {{--<th>Email</th>--}}
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


<!-- Modal for Get Store-->
<div class="modal fade" id="m_status_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="complaint_form" mathod="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Reply: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control m-input m-input--solid" id="response" name="response" rows="3"></textarea>
                </div>
                <input type="hidden" name="id" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="complaint_submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
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
                        @foreach($stores as $store)   
                            <option value="{{$store->id}}">{{$store->name}}</option>
                        @endforeach
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
<!-- Image loader -->
<div id='loader' style='display: none;'>
  <img src='https://cdn-images-1.medium.com/max/640/1*9EBHIOzhE1XfMYoKz1JcsQ.gif' width='32px' height='32px'>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function (e) {
            
            var role = '{{$role}}';
            var id = '{{$store_id}}';
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
                        window.location.href = base_url+"/support/"+id;
                    }
                });
            });
//            console.log(role);
            if(role == 'Store Admin')
            {
                if(id != 0){
                    $(function () {
                        $('#view_stores').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "ajax"      : '{{ url("get-support") }}/'+id,
                            "columns"   : [
                                { data: 'id',searchable: false, orderable: true  },
                                { data: 'store_id' },
                                { data: 'first_name' },  
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
                            "ajax"      : '{{ url("get-support") }}',
                            "columns"   : [
                                { data: 'id',searchable: false, orderable: true  },
                                { data: 'store_id' },
                                { data: 'first_name' },  
                                { data: 'subject' },
                                { data: 'description' },
                                { data: 'status' },
                                { data: 'created_at' },
                                // { data: 'actions', searchable: false, orderable: false },
                            ]
                        });
                });
            }                                                                                             
            //Response
            $(document).on("click", '.response', function (e) {
                var id = $(this).data('id');
                var response = $(this).attr("data-response");
                $('textarea[name="response"]').text(response);
                $('input[name="id"]').val(id);
                console.log(id,response);
                if(response != '')
                {
                    $('#response').prop('disabled', true);
                    $("#complaint_submit").attr("disabled", true);
                }
                else{
                    $('#response').prop('disabled', false);
                    $("#complaint_submit").attr("disabled", false);
                    $("#complaint_submit").click(function(){
				        event.preventDefault();
                        var table = $('#view_stores').DataTable();
                        $.ajax({
                            type: "POST",
                            headers: 
                            {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            url: base_url+'/support',
                            data: $("#complaint_form").serialize(),
                            beforeSend: function(){
                                // Show image container
                                $("#loader").show();
                            },
                            success: function(response){
                                // console.log(response);
                                if(response.error)
                                {
                                    $('#m_status_6').modal('hide');
                                    $('#response_recieved').html('');
                                    response.error.forEach(function (msg) {
                                        setTimeout(function() {
                                            $('#response_recieved').append('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                                                '<i class="flaticon-danger"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Oh snap! </strong>'+msg+'</div>');
                                        }, 2e3)
							        })
                                }else{
                                    document.getElementById("complaint_form").reset();
                                    $('#m_status_6').modal('hide');
                                    $('#response_recieved').html('');
                                    $('#response_recieved').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                    '<i class="flaticon-danger"></i>'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+
                                    '<strong>Well done!</strong> '+response.success+'</div>');
                                        table.ajax.reload();
                                }
                            },
                            complete:function(data){
                                // Hide image container
                                $("#loader").hide();
                            }
                        });
                    });
                }
            });

        });
    </script>
@endsection