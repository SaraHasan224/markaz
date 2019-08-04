@extends('layouts.header')
@section('content')

<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Dashboard</h3>
            </div>

        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__body m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-12 col-xl-4">

                        <!--begin:: Widgets/Stats2-1 -->
                        <div class="m-widget1">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{$user_heading}}</h3>
                                        <span class="m-widget1__desc">{{$user_tag}}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-brand">+{{$user_stats}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{$reports_heading}}</h3>
                                        <span class="m-widget1__desc">{{$reports_tag}}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-danger">+{{$reports_stats}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end:: Widgets/Stats2-1 -->
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-4">

                        <!--begin:: Widgets/Stats2-2 -->
                        <div class="m-widget1">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{$stores_heading}}</h3>
                                        <span class="m-widget1__desc">{{$stores_tag}}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-accent">+{{$stores_stats}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{$promotions_heading}}</h3>
                                        <span class="m-widget1__desc">{{$promotions_tag}}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-info">+{{$promotions_stats}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--begin:: Widgets/Stats2-2 -->
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-4">

                        <!--begin:: Widgets/Stats2-3 -->
                        <div class="m-widget1">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{$activity_heading}} </h3>
                                        <span class="m-widget1__desc">{{$activity_tag}} </span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-success">+{{$activity_stats}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{$revenue_head}}</h3>
                                        <span class="m-widget1__desc">{{$revenue_tag}}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-danger">Rs. {{$revenue_stats}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--begin:: Widgets/Stats2-3 -->
                    </div>
                </div>
            </div>
        </div>
        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-4">
                <!--begin:: Widgets/New Users-->
                <div class="m-portlet m-portlet--full-height  m-portlet--unair">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                   {{$head}}
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                        href="#m_widget4_tab1_content" role="tab">
                                        This Week
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_widget4_tab1_content">
                                <!--begin::Widget 14-->
                                <div class="m-widget4" id="show_followers">
                                    <!--begin::Widget 14 Item-->
                                    @if(!empty($follower_data))
                                        @foreach($follower_data->take(8) as $data)
                                            @if($role == 'Admin')
                                                <div class="m-widget4__item">
                                                    <div class="m-widget4__img m-widget4__img--pic">
                                                        <img src="{{asset('images/store/logo')}}/{{$data->image}}" alt="">
                                                    </div>
                                                    <div class="m-widget4__info">
                                                        <span class="m-widget4__title">
                                                            {{$data->name}} 
                                                        </span><br>
                                                        <span class="m-widget4__sub">
                                                            {{$data->tagline}}
                                                        </span>
                                                    </div>
                                                    <div class="m-widget4__ext">
                                                        <a href="JavaScript::void(0);"
                                                            class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">{{DATE_FORMAT($data->created_at,'d-M')}}</a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="m-widget4__item">
                                                    <div class="m-widget4__img m-widget4__img--pic">
                                                        <img src="{{asset('images/user')}}/{{$data->hasuser->profile_pic}}" alt="">
                                                    </div>
                                                    <div class="m-widget4__info">
                                                        <span class="m-widget4__title">
                                                            {{$data->hasuser->name}} 
                                                        </span><br>
                                                        <span class="m-widget4__sub">
                                                            {{DATE_FORMAT($data->created_at,'d-M-Y H-i A')}}
                                                        </span>
                                                    </div>
                                                    <div class="m-widget4__ext">
                                                        <a href="JavaScript::void(0);"
                                                            class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    @else
                                        <div class="m-widget4__item">
                                            Store not created  yet
                                        </div>
                                    @endif
                                    <!--end::Widget 14 Item-->
                                </div>
                                <!--end::Widget 14-->
                            </div>  
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/New Users-->
            </div>
            <div class="col-xl-8">

                <!--begin:: Widgets/Best Sellers-->
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Recent Posts
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                                role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active show" data-toggle="tab"
                                        href="#m_widget5_tab1_content" role="tab" aria-selected="true">
                                        This Month
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">

                        <!--begin::Content-->
                        <div class="tab-content">
                            <div class="tab-pane active show" id="m_widget5_tab1_content" aria-expanded="true">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    @if(!empty($recent_promotions))
                                    @foreach($recent_promotions->take(5) as $pro)
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="{{asset('images/promotion')}}/{{$pro->image}}" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    {{$pro->title}}
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    {{$pro->description}}
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__info-label">
                                                        Created On:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        {{$pro->start_time}}
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Valid Uptil:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        {{$pro->end_time}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <!-- <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">19,200</span>
                                                <br>
                                                <span class="m-widget5__sales">views</span>
                                            </div> -->
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">4.5</span>
                                                <br>
                                                <span class="m-widget5__votes">ratings</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__section">
                                            No  promotions created yet
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product10.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Branding Mockup
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">24,583</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">3809</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product11.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Awesome Mobile App
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">10,054</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1103</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <!--end::m-widget5-->
                            </div>
                            <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product11.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Branding Mockup
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">24,583</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">3809</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product6.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Great Logo Designn
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">19,200</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1046</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product10.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Awesome Mobile App
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">10,054</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1103</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <!--end::m-widget5-->
                            </div>
                            <div class="tab-pane" id="m_widget5_tab3_content" aria-expanded="false">

                                <!--begin::m-widget5-->
                                <div class="m-widget5">
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product10.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Branding Mockup
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">10.054</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1103</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product11.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Great Logo Designn
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">24,583</span>
                                                <br>
                                                <span class="m-widget5__sales">sales</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">3809</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__item">
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__pic">
                                                <img class="m-widget7__img"
                                                    src="../../assets/app/media/img//products/product6.jpg" alt="">
                                            </div>
                                            <div class="m-widget5__section">
                                                <h4 class="m-widget5__title">
                                                    Awesome Mobile App
                                                </h4>
                                                <span class="m-widget5__desc">
                                                    Make Metronic Great Again.Lorem Ipsum Amet
                                                </span>
                                                <div class="m-widget5__info">
                                                    <span class="m-widget5__author">
                                                        Author:
                                                    </span>
                                                    <span class="m-widget5__info-author m--font-info">
                                                        Fly themes
                                                    </span>
                                                    <span class="m-widget5__info-label">
                                                        Released:
                                                    </span>
                                                    <span class="m-widget5__info-date m--font-info">
                                                        23.08.17
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-widget5__content">
                                            <div class="m-widget5__stats1">
                                                <span class="m-widget5__number">19,200</span>
                                                <br>
                                                <span class="m-widget5__sales">1046</span>
                                            </div>
                                            <div class="m-widget5__stats2">
                                                <span class="m-widget5__number">1046</span>
                                                <br>
                                                <span class="m-widget5__votes">votes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end::m-widget5-->
                            </div>
                        </div>

                        <!--end::Content-->
                    </div>
                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
        </div>
        <!--End::Section-->
    </div>
</div>

<!-- end:: Body -->
@endsection

@section('scripts')

@endsection