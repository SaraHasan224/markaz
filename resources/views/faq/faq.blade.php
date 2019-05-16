@extends('layouts.header')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Manage FAQs</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="{{url('/')}}" class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript::void(0)" class="m-nav__link">
                            <span class="m-nav__link-text">Manage FAQs</span>
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

        <!--Begin::Main Portlet-->
        <div class="m-portlet m-portlet--full-height">

            <!--begin: Portlet Head-->
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Manage FAQs
                        </h3>
                    </div>
                </div>

            </div>

            <!--end: Portlet Head-->

            <!--begin: Portlet Body-->
            <div class="m-portlet__body m-portlet__body--no-padding">

            <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">* Promotion
                                                        Description:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div id="m_clipboard_4"
                                                            style="border: 4px solid #eaeaea; padding: 10px;">Mussum
                                                            ipsum
                                                            cacilds, vidis litro abertis. Consetis adipiscings elitis.
                                                            Pra lá , depois divoltis
                                                            porris, paradis. Paisis, filhis, espiritis santis. Mé faiz
                                                            elementum girarzis, nisi
                                                            eros vermeio, in elementis mé pra quem é amistosis quis leo.
                                                            Manduma pindureta quium dia nois paga.</div>
                                                    </div>
                                                </div>

                <!--end: Form Wizard-->
            </div>

            <!--end: Portlet Body-->
        </div>

        <!--End::Main Portlet-->
    </div>
</div>
@endsection
