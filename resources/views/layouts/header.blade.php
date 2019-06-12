<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Markaz - Get Notify</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });

    </script>
     <!--begin::Page Vendors -->
     <link href="{{asset('assets/vendors/custom/jquery-ui/jquery-ui.bundle.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" --}}
    <!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <!--end::Page Vendors -->
    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="{{asset('assets/demo/demo12/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="assets/demo/demo12/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{asset('assets/demo/demo12/media/img/logo/markaz.png')}}" />
    <!--end::Web font -->
    <!--begin::Base Styles -->
        @yield('styles')
   
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">


    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">


        <!-- BEGIN: Header -->
        <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
            <div class="m-container m-container--fluid m-container--full-height">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <!-- BEGIN: Brand -->
                    <div class="m-stack__item m-brand  m-brand--skin-dark ">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="index.html" class="m-brand__logo-wrapper">
                                    <img alt="" src="{{ asset('assets/demo/demo12/media/img/logo/logo.png') }}" />
                                </a>
                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">

                                <!-- BEGIN: Left Aside Minimize Toggle -->
                                <a href="javascript:;" id="m_aside_left_minimize_toggle"
                                    class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                    <span></span>
                                </a>
                                <!-- END -->

                                <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                                    class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>
                                <!-- END -->


                                <!-- BEGIN: Responsive Header Menu Toggler -->
                                <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                                    class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>
                                <!-- END -->


                                <!-- BEGIN: Topbar Toggler -->
                                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                                    class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <i class="flaticon-more"></i>
                                </a>
                                <!-- BEGIN: Topbar Toggler -->
                            </div>
                        </div>
                    </div>
                    <!-- END: Brand -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                        <!-- BEGIN: Horizontal Menu -->
                        <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                            id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>


                        <!-- END: Horizontal Menu -->
                        <!-- BEGIN: Topbar -->
                        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">


                            <div class="m-stack__item m-topbar__nav-wrapper">
                                <ul class="m-topbar__nav m-nav m-nav--inline">
                                    <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light"
                                        m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown"
                                        m-dropdown-persistent="1">

                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-nav__link-icon"><span class="m-nav__link-icon-wrapper"><i
                                                        class="flaticon-search-1"></i></span></span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                            <div class="m-dropdown__inner ">
                                                <div class="m-dropdown__header">
                                                    <form class="m-list-search__form">
                                                        <div class="m-list-search__form-wrapper">
                                                            <span class="m-list-search__form-input-wrapper">
                                                                <input id="m_quicksearch_input" autocomplete="off"
                                                                    type="text" name="q"
                                                                    class="m-list-search__form-input" value=""
                                                                    placeholder="Search...">
                                                            </span>
                                                            <span class="m-list-search__form-icon-close"
                                                                id="m_quicksearch_close">
                                                                <i class="la la-remove"></i>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__scrollable m-scrollable"
                                                        data-scrollable="true" data-height="300"
                                                        data-mobile-height="200">
                                                        <div class="m-dropdown__content">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="m-nav__item m-topbar__notifications m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width"
                                        m-dropdown-toggle="click" m-dropdown-persistent="1">
                                        <a href="#" class="m-nav__link m-dropdown__toggle"
                                            id="m_topbar_notification_icon">
                                            <span class="m-nav__link-icon">
                                                <span class="m-nav__link-icon-wrapper"><i
                                                        class="flaticon-music-2"></i></span>
                                                <span class="m-nav__link-badge m-badge m-badge--danger">3</span>
                                            </span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center">
                                                    <span class="m-dropdown__header-title">9 New</span>
                                                    <span class="m-dropdown__header-subtitle">User Notifications</span>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand"
                                                            role="tablist">
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link active"
                                                                    data-toggle="tab"
                                                                    href="#topbar_notifications_notifications"
                                                                    role="tab">
                                                                    Alerts
                                                                </a>
                                                            </li>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link" data-toggle="tab"
                                                                    href="#topbar_notifications_events"
                                                                    role="tab">Events</a>
                                                            </li>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link" data-toggle="tab"
                                                                    href="#topbar_notifications_logs"
                                                                    role="tab">Logs</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active"
                                                                id="topbar_notifications_notifications" role="tabpanel">
                                                                <div class="m-scrollable" data-scrollable="true"
                                                                    data-height="250" data-mobile-height="200">
                                                                    <div
                                                                        class="m-list-timeline m-list-timeline--skin-light">
                                                                        <div class="m-list-timeline__items">
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                                <span class="m-list-timeline__text">12
                                                                                    new users registered</span>
                                                                                <span class="m-list-timeline__time">Just
                                                                                    now</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge"></span>
                                                                                <span
                                                                                    class="m-list-timeline__text">System
                                                                                    shutdown <span
                                                                                        class="m-badge m-badge--success m-badge--wide">pending</span></span>
                                                                                <span class="m-list-timeline__time">14
                                                                                    mins</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge"></span>
                                                                                <span class="m-list-timeline__text">New
                                                                                    invoice received</span>
                                                                                <span class="m-list-timeline__time">20
                                                                                    mins</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge"></span>
                                                                                <span class="m-list-timeline__text">DB
                                                                                    overloaded 80% <span
                                                                                        class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                                                                <span class="m-list-timeline__time">1
                                                                                    hr</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge"></span>
                                                                                <span
                                                                                    class="m-list-timeline__text">System
                                                                                    error - <a href="#"
                                                                                        class="m-link">Check</a></span>
                                                                                <span class="m-list-timeline__time">2
                                                                                    hrs</span>
                                                                            </div>
                                                                            <div
                                                                                class="m-list-timeline__item m-list-timeline__item--read">
                                                                                <span
                                                                                    class="m-list-timeline__badge"></span>
                                                                                <span href=""
                                                                                    class="m-list-timeline__text">New
                                                                                    order received <span
                                                                                        class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                                                                                <span class="m-list-timeline__time">7
                                                                                    hrs</span>
                                                                            </div>
                                                                            <div
                                                                                class="m-list-timeline__item m-list-timeline__item--read">
                                                                                <span
                                                                                    class="m-list-timeline__badge"></span>
                                                                                <span
                                                                                    class="m-list-timeline__text">Production
                                                                                    server down</span>
                                                                                <span class="m-list-timeline__time">3
                                                                                    hrs</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge"></span>
                                                                                <span
                                                                                    class="m-list-timeline__text">Production
                                                                                    server up</span>
                                                                                <span class="m-list-timeline__time">5
                                                                                    hrs</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="topbar_notifications_events"
                                                                role="tabpanel">
                                                                <div class="m-scrollable" data-scrollable="true"
                                                                    data-height="250" data-mobile-height="200">
                                                                    <div
                                                                        class="m-list-timeline m-list-timeline--skin-light">
                                                                        <div class="m-list-timeline__items">
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                <a href=""
                                                                                    class="m-list-timeline__text">New
                                                                                    order received</a>
                                                                                <span class="m-list-timeline__time">Just
                                                                                    now</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                                                                <a href=""
                                                                                    class="m-list-timeline__text">New
                                                                                    invoice received</a>
                                                                                <span class="m-list-timeline__time">20
                                                                                    mins</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                <a href=""
                                                                                    class="m-list-timeline__text">Production
                                                                                    server up</a>
                                                                                <span class="m-list-timeline__time">5
                                                                                    hrs</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href=""
                                                                                    class="m-list-timeline__text">New
                                                                                    order received</a>
                                                                                <span class="m-list-timeline__time">7
                                                                                    hrs</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href=""
                                                                                    class="m-list-timeline__text">System
                                                                                    shutdown</a>
                                                                                <span class="m-list-timeline__time">11
                                                                                    mins</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span
                                                                                    class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href=""
                                                                                    class="m-list-timeline__text">Production
                                                                                    server down</a>
                                                                                <span class="m-list-timeline__time">3
                                                                                    hrs</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="topbar_notifications_logs"
                                                                role="tabpanel">
                                                                <div class="m-stack m-stack--ver m-stack--general"
                                                                    style="min-height: 180px;">
                                                                    <div
                                                                        class="m-stack__item m-stack__item--center m-stack__item--middle">
                                                                        <span class="">All caught up!<br>No new
                                                                            logs.</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                        m-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-topbar__userpic">
                                                <img src="{{ asset('images/user') }}/{{$logged_user->profile_pic}}"
                                                    class="m--img-rounded m--marginless m--img-centered" alt="" />
                                            </span>
                                            <span class="m-nav__link-icon m-topbar__usericon  m--hide">
                                                <span class="m-nav__link-icon-wrapper"><i
                                                        class="flaticon-user-ok"></i></span>
                                            </span>
                                            <span class="m-topbar__username m--hide">Nick</span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span
                                                class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center">
                                                    <div class="m-card-user m-card-user--skin-light">
                                                        <div class="m-card-user__pic">
                                                            <img src="{{ asset('images/user/') }}/{{!empty($logged_user->profile_pic) ? $logged_user->profile_pic : ''}}"
                                                                class="m--img-rounded m--marginless" alt="" />
                                                        </div>
                                                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name m--font-weight-500">{{$logged_user->name}}</span>
                                                            <a href=""
                                                                class="m-card-user__email m--font-weight-300 m-link">{{$logged_user->email}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__section m--hide">
                                                                <span class="m-nav__section-text">Section</span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{url('profile')}}/{{Session::get('store_id')}}" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-title">
                                                                        <span class="m-nav__link-wrap">
                                                                            <span class="m-nav__link-text">My
                                                                                Profile</span>
                                                                            <span class="m-nav__link-badge"><span
                                                                                    class="m-badge m-badge--success">2</span></span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{url('faq')}}/{{Session::get('store_id')}}" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit">
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" id="logout">Logout</a>
                                                            </li>
                                                        </ul>
                                                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <!-- END: Topbar -->
                    </div>
                </div>
            </div>
        </header>
        <!-- END: Header -->
        <!-- BEGIN: Content -->
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
                    class="la la-close"></i></button>

            <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
                <!-- BEGIN: Aside Menu -->
                <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
                    m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
                    <ul class="m-menu__nav ">
                        <li class="m-menu__section m-menu__section--first">
                            <h4 class="m-menu__section-text">Departments</h4>
                            <i class="m-menu__section-icon flaticon-more-v3"></i>
                        </li>
                        @if(Session::get('role_name') == 'Admin')
                        <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{url('/dashboard')}}"
                                    class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-line-graph"></i><span
                                    class="m-menu__link-text">Admin Dashboard</span></a>
                        </li>  
                        @endif           
                        @if(Session::get('role_name') == 'Store Admin')           
                        <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{url('/dashboard')}}/{{Session::get('store_id')}}"
                                    class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-line-graph"></i><span
                                    class="m-menu__link-text">Company Dashboard</span></a>
                        </li>                        
                        @endif                        
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('users')}}/{{Session::get('store_id')}}" 
                                    class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-user"></i><span
                                    class="m-menu__link-text">Manage Users</span></a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('categories')}}/{{Session::get('store_id')}}" 
                                    class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-list-2"></i><span
                                    class="m-menu__link-text">Manage Categories</span></a>
                        </li>

                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('tags')}}/{{Session::get('store_id')}}" 
                                    class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-suitcase"></i><span
                                    class="m-menu__link-text">Manage Tags</span></a>
                        </li>
                        
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('store')}}" 
                                    class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-open-box"></i><span
                                    class="m-menu__link-text">Manage Stores</span></a>
                        </li>
                        @if(Session::get('role_name') == 'Store Admin')  
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('store')}}/{{Session::get('store_id')}}" 
                                    class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-open-box"></i><span
                                    class="m-menu__link-text">View Stores</span></a>
                        </li>
                        @endif
                        
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover" m-menu-link-redirect="1"><a href="javascript:;"
                                class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-gift"></i><span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Manage Promotions</span>
                                        </span></span><i
                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">

                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a
                                            href="{{url('promotions')}}/{{Session::get('store_id')}}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                class="m-menu__link-text">View All Promotions</span></a></li>
                                </ul>
                            </div>
                        </li>
        
                        <li class="m-menu__section ">
                            <h4 class="m-menu__section-text">Manage Account</h4>
                            <i class="m-menu__section-icon flaticon-more-v3"></i>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('timeline')}}/{{Session::get('store_id')}}/today"
                                class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-graphic"></i><span
                                    class="m-menu__link-text">Timeline</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('profile')}}/{{Session::get('store_id')}}"
                                class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-network"></i><span
                                    class="m-menu__link-text">Profile</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('support')}}/{{Session::get('store_id')}}" 
                                    class="m-menu__link "><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-suitcase"></i><span
                                    class="m-menu__link-text">Support</span></a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"
                            m-menu-submenu-toggle="hover" m-menu-link-redirect="1"><a href="javascript:;"
                                class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-settings"></i><span class="m-menu__link-title">
                                    <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Manage FAQs</span>
                                    </span></span><i
                                    class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a
                                            href="{{url('faq')}}/{{Session::get('store_id')}}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                class="m-menu__link-text">View All</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a
                                            href="{{url('manage-faq')}}/{{Session::get('store_id')}}" class="m-menu__link "><i
                                                class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                                                class="m-menu__link-text">Manage FAQ</span></a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- END: Aside Menu -->
            </div>
            <!-- END: Left Aside -->
            @yield('content')
            <!-- END: Content -->
        </div>

        <!-- begin::Footer -->
        <footer class="m-grid__item		m-footer ">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">
                <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                    <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                        <span class="m-footer__copyright">
                            2019 &copy; Markaz 
                        </span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end::Footer -->


    </div>
    <!-- end:: Page -->

    <!-- begin::Quick Sidebar -->
    <!-- <div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
        <div class="m-quick-sidebar__content m--hide">
            <span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>
            <ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger"
                        role="tab">Messages</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_settings"
                        role="tab">Settings</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs"
                        role="tab">Logs</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                    <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                        <div class="m-messenger__messages m-scrollable">
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--in">
                                    <div class="m-messenger__message-pic">
                                        <img src="assets/app/media/img//users/user3.jpg" alt="" />
                                    </div>
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-username">
                                                Megan wrote
                                            </div>
                                            <div class="m-messenger__message-text">
                                                Hi Bob. What time will be the meeting ?
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--out">
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-text">
                                                Hi Megan. It's at 2.30PM
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--in">
                                    <div class="m-messenger__message-pic">
                                        <img src="assets/app/media/img//users/user3.jpg" alt="" />
                                    </div>
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-username">
                                                Megan wrote
                                            </div>
                                            <div class="m-messenger__message-text">
                                                Will the development team be joining ?
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--out">
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-text">
                                                Yes sure. I invited them as well
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__datetime">2:30PM</div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--in">
                                    <div class="m-messenger__message-pic">
                                        <img src="assets/app/media/img//users/user3.jpg" alt="" />
                                    </div>
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-username">
                                                Megan wrote
                                            </div>
                                            <div class="m-messenger__message-text">
                                                Noted. For the Coca-Cola Mobile App project as well ?
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--out">
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-text">
                                                Yes, sure.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--out">
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-text">
                                                Please also prepare the quotation for the Loop CRM project as well.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__datetime">3:15PM</div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--in">
                                    <div class="m-messenger__message-no-pic m--bg-fill-danger">
                                        <span>M</span>
                                    </div>
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-username">
                                                Megan wrote
                                            </div>
                                            <div class="m-messenger__message-text">
                                                Noted. I will prepare it.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--out">
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-text">
                                                Thanks Megan. I will see you later.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__wrapper">
                                <div class="m-messenger__message m-messenger__message--in">
                                    <div class="m-messenger__message-pic">
                                        <img src="assets/app/media/img//users/user3.jpg" alt="" />
                                    </div>
                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                            <div class="m-messenger__message-username">
                                                Megan wrote
                                            </div>
                                            <div class="m-messenger__message-text">
                                                Sure. See you in the meeting soon.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="m-messenger__seperator"></div>

                        <div class="m-messenger__form">
                            <div class="m-messenger__form-controls">
                                <input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
                            </div>
                            <div class="m-messenger__form-tools">
                                <a href="" class="m-messenger__form-attachment">
                                    <i class="la la-paperclip"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="m_quick_sidebar_tabs_settings" role="tabpanel">
                    <div class="m-list-settings m-scrollable">
                        <div class="m-list-settings__group">
                            <div class="m-list-settings__heading">General Settings</div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">Email Notifications</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" checked="checked" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">Site Tracking</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">SMS Alerts</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">Backup Storage</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">Audit Logs</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" checked="checked" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="m-list-settings__group">
                            <div class="m-list-settings__heading">System Settings</div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">System Logs</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">Error Reporting</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">Applications Logs</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">Backup Servers</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" checked="checked" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                            <div class="m-list-settings__item">
                                <span class="m-list-settings__item-label">Audit Logs</span>
                                <span class="m-list-settings__item-control">
                                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                                        <label>
                                            <input type="checkbox" name="">
                                            <span></span>
                                        </label>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="m_quick_sidebar_tabs_logs" role="tabpanel">
                    <div class="m-list-timeline m-scrollable">
                        <div class="m-list-timeline__group">
                            <div class="m-list-timeline__heading">
                                System Logs
                            </div>
                            <div class="m-list-timeline__items">
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">12 new users registered <span
                                            class="m-badge m-badge--warning m-badge--wide">important</span></a>
                                    <span class="m-list-timeline__time">Just now</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">System shutdown</a>
                                    <span class="m-list-timeline__time">11 mins</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                    <a href="" class="m-list-timeline__text">New invoice received</a>
                                    <span class="m-list-timeline__time">20 mins</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                    <a href="" class="m-list-timeline__text">Database overloaded 89% <span
                                            class="m-badge m-badge--success m-badge--wide">resolved</span></a>
                                    <span class="m-list-timeline__time">1 hr</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">System error</a>
                                    <span class="m-list-timeline__time">2 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">Production server down <span
                                            class="m-badge m-badge--danger m-badge--wide">pending</span></a>
                                    <span class="m-list-timeline__time">3 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">Production server up</a>
                                    <span class="m-list-timeline__time">5 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-list-timeline__group">
                            <div class="m-list-timeline__heading">
                                Applications Logs
                            </div>
                            <div class="m-list-timeline__items">
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">New order received <span
                                            class="m-badge m-badge--info m-badge--wide">urgent</span></a>
                                    <span class="m-list-timeline__time">7 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">12 new users registered</a>
                                    <span class="m-list-timeline__time">Just now</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">System shutdown</a>
                                    <span class="m-list-timeline__time">11 mins</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                    <a href="" class="m-list-timeline__text">New invoices received</a>
                                    <span class="m-list-timeline__time">20 mins</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                    <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                                    <span class="m-list-timeline__time">1 hr</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">System error <span
                                            class="m-badge m-badge--info m-badge--wide">pending</span></a>
                                    <span class="m-list-timeline__time">2 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">Production server down</a>
                                    <span class="m-list-timeline__time">3 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-list-timeline__group">
                            <div class="m-list-timeline__heading">
                                Server Logs
                            </div>
                            <div class="m-list-timeline__items">
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">Production server up</a>
                                    <span class="m-list-timeline__time">5 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">New order received</a>
                                    <span class="m-list-timeline__time">7 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">12 new users registered</a>
                                    <span class="m-list-timeline__time">Just now</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">System shutdown</a>
                                    <span class="m-list-timeline__time">11 mins</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                                    <a href="" class="m-list-timeline__text">New invoice received</a>
                                    <span class="m-list-timeline__time">20 mins</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                                    <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                                    <span class="m-list-timeline__time">1 hr</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">System error</a>
                                    <span class="m-list-timeline__time">2 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">Production server down</a>
                                    <span class="m-list-timeline__time">3 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                                    <a href="" class="m-list-timeline__text">Production server up</a>
                                    <span class="m-list-timeline__time">5 hrs</span>
                                </div>
                                <div class="m-list-timeline__item">
                                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                                    <a href="" class="m-list-timeline__text">New order received</a>
                                    <span class="m-list-timeline__time">1117 hrs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end::Quick Sidebar -->
    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>

	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4MXWFPJe99KHmkoSQYa7cYK8Rz0lAuh8" type="text/javascript"></script> -->
    <!-- end::Scroll Top -->
    <!--begin::Base Scripts -->
    <script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/demo/demo12/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <!--end::Base Scripts -->

    <!--begin::Page Vendors -->
    <script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript">
    </script>
    <!--end::Page Vendors -->


    <!--begin::Page Snippets -->
    <script src="{{asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
    <!--end::Page Snippets -->
    
    <script src="{{asset('assets/demo/default/custom/crud/forms/widgets/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-daterangepicker.js')}}" type="text/javascript"></script>
    <!-- <script src="{{asset('assets/demo/default/custom/components/maps/google-maps.js')}}" type="text/javascript"></script> -->
	<script src="{{asset('assets/demo/default/custom/components/base/sweetalert2.js')}}" type="text/javascript"></script>
        @yield('scripts')
</body>
<!-- end::Body -->

</html>
