@extends('layouts.header')

@section('styles')

<link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap.min.css') }}">
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
                        <a href="{{url('store/'.$id)}}" class="m-nav__link">
                            <span class="m-nav__link-text">Store</span>
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
            </div>
            <div class="m-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="{{$table_id}}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Id</th>
                            <th>Store ID</th>
                            <th>Followed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>1</td>
                            <td>Orient Textile Mills</td>
                            <td>Hyderi</td>
                            <td>5.00</td>
                            <td>6.45</td>
                            <td>Karachi,Pakistan</td>
                            <td>Kashaf Nazir</td>
                            <td>2/12/2018</td>
                            <td nowrap>
                                
                            </td>
                        </tr> -->

                    </tbody>
                </table>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


@endsection
@section('scripts')
<script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#followed_stores').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax"      : '{{ url("get-followers") }}',
                "columns"   : [
                    { data: 'id',searchable: false, orderable: true  },
                    { data: 'store_id' },
                    { data: 'user_id' },
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
                "ajax"      : '{{ url("get-unfollowers") }}',
                "columns"   : [
                    { data: 'id',searchable: false, orderable: true  },
                    { data: 'store_id' },
                    { data: 'user_id' },
                    { data: 'created_at' },
                ]
            });
        });
    </script>
@endsection