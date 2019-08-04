@extends('layouts.header')

@section('content')


<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Frequently Asked Questions</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="{{ url('/dashboard')}} " class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript:void(0);" class="m-nav__link">
                            @if(!empty($store))
                                {{ $store->name }}
                            @else
                                Markaz
                            @endif
                        </a>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript::void(0);" class="m-nav__link">
                            <span class="m-nav__link-text">FAQs</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--space">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h1 class="m-portlet__head-text">
                            @if(!empty($store))
                                {{ $store->name }}
                            @else
                                Markaz
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="m-tabs-content" id="m_sections">

                            <!--begin::Section 1-->
                            <div class="m-tabs-content__item m-tabs-content__item--active" id="m_section_1">
                                <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Frequently Asked Questions</h4>
                                <div class="m-accordion m-accordion--section m-accordion--padding-lg" id="m_section_1_content">
                                @if(count($questions) > 0)
                                    @foreach($questions as $ques)
                                        <!--begin::Item-->
                                        <div class="m-accordion__item">
                                            <div class="m-accordion__item-head collapsed-" role="tab" id="m_section_{{$ques->id}}_content_{{$ques->id}}_head" data-toggle="collapse" href="#m_section_{{$ques->id}}_content_{{$ques->id}}_body">
                                                <span class="m-accordion__item-title">{{$ques->title}}</span>
                                                <span class="m-accordion__item-mode"></span>
                                            </div>
                                            <div class="m-accordion__item-body collapse show" id="m_section_{{$ques->id}}_content_{{$ques->id}}_body" role="tabpanel" aria-labelledby="m_section_{{$ques->id}}_content_{{$ques->id}}_head" data-parent="#m_section_{{$ques->id}}_content">
                                                <div class="m-accordion__item-content">
                                                    <p>{!!$ques->description!!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end::Item-->
                                    @endforeach
                                @else   
                                    No questions added
                                @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end::Portlet-->
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
                        @foreach($stores as $st)   
                            <option value="{{$st->id}}">{{$st->name}}</option>
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
<!-- end:: Body -->
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
                        window.location.href = base_url+"/faq/"+id;
                    }
                });
            });
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
                                { data: 'email' },  
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
                                { data: 'email' },  
                                { data: 'subject' },
                                { data: 'description' },
                                { data: 'status' },
                                { data: 'created_at' },
                                // { data: 'actions', searchable: false, orderable: false },
                            ]
                        });
                });
            }     

            
        });
    </script>
@endsection