@extends('user.profile')

@section('profile')
<div class="col-xl-9 col-lg-8">
    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                           {{$title}}
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="m_user_profile_tab_1">
                <div class="col-xl-12 col-lg-12">

                    <!--Begin::Portlet-->
                    <div class="m-portlet  m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        {{ $sub_title }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-scrollable" data-scrollable="true" data-height="380" data-mobile-height="300">

                                <!--Begin::Timeline 2 -->
                                <div class="m-timeline-2">
                                    <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                        <div class="m-timeline-2__item">
                                            <span class="m-timeline-2__item-time">10:00</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text  m--padding-top-5">
                                                Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                <br> incididunt ut labore et dolore magna
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
                                            <span class="m-timeline-2__item-time">12:45</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-success"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
                                                AEOL Meeting With
                                            </div>
                                            <div class="m-list-pics m-list-pics--sm m--padding-left-20">
                                                <a href="../../#">
                                                    <img src="assets/app/media/img/users/100_4.jpg" title="">
                                                </a>
                                                <a href="../../#">
                                                    <img src="assets/app/media/img/users/100_13.jpg" title="">
                                                </a>
                                                <a href="../../#">
                                                    <img src="assets/app/media/img/users/100_11.jpg" title="">
                                                </a>
                                                <a href="../../#">
                                                    <img src="assets/app/media/img/users/100_14.jpg" title="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
                                            <span class="m-timeline-2__item-time">14:00</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-brand"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Make Deposit
                                                <a href="#" class="m-link m-link--brand m--font-bolder">USD 700</a> To
                                                ESL.
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
                                            <span class="m-timeline-2__item-time">16:00</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                <br> incididunt ut labore et dolore magna elit enim at minim
                                                <br> veniam quis nostrud
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
                                            <span class="m-timeline-2__item-time">17:00</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-info"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Placed a new order in
                                                <a href="#" class="m-link m-link--brand m--font-bolder">SIGNATURE
                                                    MOBILE</a> marketplace.
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
                                            <span class="m-timeline-2__item-time">16:00</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-brand"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                <br> incididunt ut labore et dolore magna elit enim at minim
                                                <br> veniam quis nostrud
                                            </div>
                                        </div>
                                        <div class="m-timeline-2__item m--margin-top-30">
                                            <span class="m-timeline-2__item-time">17:00</span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
                                                Received a new feedback on
                                                <a href="#" class="m-link m-link--brand m--font-bolder">FinancePro
                                                    App</a> product.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--End::Timeline 2 -->
                            </div>
                        </div>
                    </div>

                    <!--End::Portlet-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
