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
                            <span class="m-nav__link-text">
                            @if(!empty($store))
                                {{ $store->name }}
                            @else
                                Markaz
                            @endif</span>
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
                            <a href="{{url('add-faq')}}/{{$store_id}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>New Question</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
            <div class="m-portlet__body table-responsive">
                <div  id="delete_result"></div>
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="view_questions">
                    <thead>
                        <tr>
                            <th>QuestionID</th>
                            @if($role == 'Admin' )<th>Store Name</th> @endif
                            <th>Title</th>
                            <th>Description</th>
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
<div class="modal fade" id="edit_store_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
<form id="edit_faq_form" method="POST">
<div class="modal-body">
    <div id="result" style="padding: 10px;"></div>
    <div class="form-group m-form__group row">
        <div class="col-lg-12">
            <label>Title:</label>
            <div class="m-input-icon m-input-icon--right">
                <input type="text" name="title" id="edit_title" class="form-control m-input" placeholder="Enter title" >
            </div>
        </div>
        <div class="col-lg-12">
            <label>Description:</label>
            <div class="m-input-icon m-input-icon--right">
                <textarea name="description" id="edit_des" class="form-control m-input" rows="10"></textarea>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" id="edit_id" />
    <input type="hidden" name="store_id" id="edit_store_id" />
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
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
    <select class="form-control m-input m-input--square" name="store_id">
        @foreach($stores as $st)
            <option value="{{$st->id}}">{{$st->name}}</option>
        @endforeach
    </select>
    @if(!empty($store))
    <input type="hidden" name="id"  id="store_id" value="{{$store->id}}"/>
    @else
    <input type="hidden" name="id"  id="store_id" value="0"/>
    @endif
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" id="store_submit" class="btn btn-primary">Save changes</button>
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
$(document).ready(function (e) {

var role = '{{$role}}';
console.log(role);
var id = $('#store_id').val();
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
        window.location.href = base_url+"/manage-faq/"+id;
    }
});
});
if(role == 'Store Admin')
{
if(id != 0){
    $(function () {
        $('#view_questions').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax"      : '{{ url("get-questions") }}'+'/'+id,
            columnDefs: [
                { "width": "250px", "targets": [1,2] },
                { "width": "100px", "targets": [3] }
            ],
            "columns"   : [
                { data: 'id',searchable: false, orderable: true  },
                { data: 'title' },
                { data: 'description' },
                { data: 'status', searchable: false, orderable: false },
                { data: 'actions', searchable: false, orderable: false },
            ]
        });
    });
}else{
    $('#store_id_modal').modal('show');
}
}else{
$(function () {
    $('#view_questions').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax"      : '{{ url("get-questions") }}',
        columnDefs: [
            { "width": "250px", "targets": [1,2] },
            { "width": "100px", "targets": [2,4] }
        ],
        "columns"   : [
            { data: 'id',searchable: false, orderable: true  },
			{ data: 'store_id' },
            { data: 'title' },
            { data: 'description' },
            { data: 'status', searchable: false, orderable: false },
            { data: 'actions', searchable: false, orderable: false },
        ]
    });
});
}


});
</script>
<script>

</script>

<script>
$(document).ready(function (e) {
var base_url = "<?php url() ?>";
var store_id = $('#store_id').val();
$(document).on("click", '#edit_faq', function (e) {
var id = $(this).data('id');
$.ajax({
    type: "POST",
    headers:
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    url: base_url+'/view-faq/'+id,
    data: {id: id},
    success: function (response) {
        if(response.success.code == 200)
        {
            $('#edit_id').val(response.success.message.id);
            $('#edit_title').val(response.success.message.title);
            $('#edit_des').text(response.success.message.description);
            $('#edit_store_id').val(response.success.message.store_id);
            $('#edit_store_modal').modal('show');
        }
    }
});
});


$(document).on("submit", '#edit_faq_form', function (e) {
	var edit_url = "";
	if(store_id == '')
		edit_url = base_url+'/edit-faq/';
	else
		edit_url = base_url+'/edit-faq/'+store_id;
e.preventDefault();
$.ajax({
    type: "POST",
    headers:
    {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    url: edit_url,
    data: $("#edit_faq_form").serialize(),
    success: function (response) {
        if(response.code == 200)
        {
            $('#result').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.message+'</div>');
            setTimeout(function() {
                $('#edit_store_modal').modal('hide');
                $('#result').empty();
                var table = $('#view_questions').DataTable();
                table.ajax.reload();

			}, 2000);
        }
    }
});
});


// Delete Question
$(document).on("click", '#delete', function (e) {
        var id = $(this).data('id');
	var del_url = "";
	if(store_id == '' || store_id == 0)
		del_url = base_url+'/faq/delete';
	else
		del_url = base_url+'/faq/delete/'+store_id;
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
            e.value ? swal("Deleted!", "FAQ has been deleted.", "success") : "cancel" === e.dismiss && swal("Cancelled", "FAQ not deleted", "error");
            if(e.value == true)
            {
                    $.ajax({
                        type: "POST",
                        headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        url: del_url,
                        data: {id: id},
                        success: function (response) {
                            console.log(response.code);
                            if(response.code == 200)
                            {
                                swal.close();
                                $('#delete_result').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.faq+'</div>');
                                var table = $('#view_questions').DataTable();
                                table.ajax.reload();
                            }
                        }
                    });
            }
        })
});
});

// Delete Question
$(document).on("click", '#status', function (e) {
        var id = $(this).data('id');
        var status = $(this).data('status');
        var store_id = $('#store_id').val();
        console.log(id,status);
        var base_url = "<?php url() ?>";
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You wan't to update status",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function(e) {
            e.value ? swal("Updated!", "Status Updated Successfully.", "success") : "cancel" === e.dismiss && swal("Cancelled", "Cancel Status Update", "error");
            if(e.value == true)
            {
                    $.ajax({
                        type: "POST",
                        headers:
                        {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        url: base_url+'/faq/status/'+store_id,
                        data: {id: id, status:status},
                        success: function (response) {
                            console.log(response.code);
                            if(response.code == 200)
                            {
                                swal.close();
                                $('#delete_result').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+response.faq+'</div>');
                                var table = $('#view_questions').DataTable();
                                table.ajax.reload();
                            }
                        }
                    });
            }
        })
});
</script>
@endsection