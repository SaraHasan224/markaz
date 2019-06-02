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
                            <span class="m-nav__link-text">{{$store->name}}</span>
                        </a>
                    </li>
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
                            {{ $store->name }}
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

<!-- end:: Body -->
@endsection