@extends('layouts.header')
@section('styles')
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.dataTables.css') }}">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

    .loading{
  font-size:0;
  width:30px;
  height:30px;
  margin-top:5px;
  border-radius:15px;
  padding:0;
  border:3px solid #FFFFFF;
  border-bottom:3px solid rgba(255,255,255,0.0);
  border-left:3px solid rgba(255,255,255,0.0);
  background-color:transparent !important;
  animation-name: rotateAnimation;
  -webkit-animation-name: wk-rotateAnimation;
  animation-duration: 1s;
  -webkit-animation-duration: 1s;
  animation-delay: 0.2s;
  -webkit-animation-delay: 0.2s;
  animation-iteration-count: infinite;
  -webkit-animation-iteration-count: infinite;
}

@keyframes rotateAnimation {
    0%   {transform: rotate(0deg);}
    100% {transform: rotate(360deg);}
}
@-webkit-keyframes wk-rotateAnimation {
    0%   {-webkit-transform: rotate(0deg);}
    100% {-webkit-transform: rotate(360deg);}
}

.finish{
  -webkit-transform:scaleX(1) !important;
  transform:scaleX(1) !important;
}
.hide-loading{
  opacity:0;
  -webkit-transform: rotate(0deg) !important;
  transform: rotate(0deg) !important;
  -webkit-transform:scale(0) !important;
  transform:scale(0) !important;
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
        <div id="print_response">

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
            </div>
            <div class="m-portlet__body table-responsive">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="view_stores">
                    <thead>
                        <tr>
                            <th>SupportID</th>
                            <th>Store Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Submitted At</th>
                            <!-- <th>Actions</th> -->
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
                <h5 class="modal-title" id="exampleModalLongTitle">Response</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                <div class="modal-body">
                    <div class="m-portlet__body">
                        <div class="form-group{{ $errors->has('response') ? ' has-error' : '' }} m-form__group row">
                            <div class="col-lg-12">
                                <label>Send Response:</label>
                                <textarea class="form-control m-input m-input--solid" name="response" id="response_recieved" rows="10"></textarea>
                                <span class="m-form__help" id="resp">Enter response you want to send in response to user's request...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="response_id"/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-submit" id="submit_response">Save changes</button>
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
            $('#view_stores').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax"      : '{{ url("get-support") }}',
                "retrieve": true,
                "columns"   : [
                    { data: 'id',searchable: false, orderable: true  },
                    { data: 'store_id' },
                    { data: 'first_name' },
                    { data: 'last_name' }, 
                    { data: 'subject' },
                    { data: 'description' },
                    { data: 'status',searchable: false, orderable: false  },
                    { data: 'created_at' },
                    // { data: 'actions', searchable: false, orderable: false },
                ]
            });
        });
    </script>
    
    <script>
        $(document).ready(function (e) {
            $(document).on("click", '#m_view_6', function (e) {
                var id = $(this).data('id');
            });
        });
    </script>
    <script>
        $(document).ready(function (e) {
            $(document).on("click", '.response', function (e) {
                var id = $(this).attr("data-id");
                $('#response_id').attr("value",id);
                var response = $(this).attr("data-response");
                if(response == '')
                {
                    $("#response_recieved").empty();    
                    $('#submit_response').prop('disabled', false);
                    $("#response_recieved").prop('disabled', false);
                    $("#resp").html("Enter response you want to send in response to user's request...");    
                }else{
                 
                    $("#response_recieved").html(response);    
                    $('#submit_response').prop('disabled', true);
                    $("#response_recieved").attr("disabled","disabled");
                    $("#resp").html("Response already submitted");    
                }
                // $("#status_id1").val(id);
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-submit").click(function(e){
            e.preventDefault();
            var input = $("textarea[name=response]").val();
            var id = $("input[name=id]").val();
            $.ajax({
                type:'POST',
                url:'{{url("support")}}',
                // ajax: "data.json",
                data:{response:input,id:id},
                // beforeSend: function(){
                // // Show image container
                //     $("#loader").show();
                // },  
                // complete:function(data){
                //     // Hide image container
                //     $("#loader").hide();
                // },
                success:function(data){
                    console.log(data.error);
                    var table = $('#view_stores').DataTable();
                    // table.ajax.reload();
                    
                    if(data.success != ''){

                        $('#m_status_6').modal('hide');
                        $('#print_response').append('<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="flaticon-danger"></i>'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+
                        '<strong>'+data.success+'</strong></div>');
                        table.ajax.reload();
                    }
                    else if(data.error == "undefined")
                    {
                        $('#m_status_6').modal('hide');
                    }
                    else if(data.error != '')
                    {
                        $('#m_status_6').modal('hide');
                        // $('#print_response').append('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                        //         '<i class="flaticon-danger"></i>'+
                        //         '<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+
                        //     '<strong>'+data.error+'</strong> </div>');
                    }
                }
            });
        });
    </script>
@endsection