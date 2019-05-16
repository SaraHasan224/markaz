@extends('layouts.header')

@section('content')
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Multi Column Forms</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Forms & Controls</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Form Layouts</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Multi Column Forms</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                    m-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#"
                        class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                        <i class="la la-plus m--hide"></i>
                        <i class="la la-ellipsis-h"></i>
                    </a>
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        <li class="m-nav__section m-nav__section--first m--hide">
                                            <span class="m-nav__section-text">Quick Actions</span>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">Activity</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                <span class="m-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                <span class="m-nav__link-text">FAQ</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                <span class="m-nav__link-text">Support</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__separator m-nav__separator--fit">
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="#"
                                                class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">

                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    2 Columns Form Layout
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Full Name:</label>
                                    <input type="email" class="form-control m-input" placeholder="Enter full name">
                                    <span class="m-form__help">Please enter your full name</span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Contact Number:</label>
                                    <input type="email" class="form-control m-input" placeholder="Enter contact number">
                                    <span class="m-form__help">Please enter your contact number</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Address:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input"
                                            placeholder="Enter your address">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-map-marker"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter your address</span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Postcode:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input"
                                            placeholder="Enter your postcode">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-bookmark-o"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter your postcode</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>User Group:</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="example_2" checked value="2"> Sales Person
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="example_2" value="2"> Customer
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">Please select user group</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="reset" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                    <div class="col-lg-6 m--align-right">
                                        <button type="reset" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->

                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    2 Columns Horizontal Form Layout
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Full Name:</label>
                                <div class="col-lg-3">
                                    <input type="email" class="form-control m-input" placeholder="Enter full name">
                                    <span class="m-form__help">Please enter your full name</span>
                                </div>
                                <label class="col-lg-2 col-form-label">Contact Number:</label>
                                <div class="col-lg-3">
                                    <input type="email" class="form-control m-input" placeholder="Enter contact number">
                                    <span class="m-form__help">Please enter your contact number</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Address:</label>
                                <div class="col-lg-3">
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input"
                                            placeholder="Enter your address">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-map-marker"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter your address</span>
                                </div>
                                <label class="col-lg-2 col-form-label">Postcode:</label>
                                <div class="col-lg-3">
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input"
                                            placeholder="Enter your postcode">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-bookmark-o"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter your postcode</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Group:</label>
                                <div class="col-lg-3">
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="example_2" checked value="2"> Sales Person
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="example_2" value="2"> Customer
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">Please select user group</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <button type="reset" class="btn btn-success">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->

                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    3 Columns Form Layout
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Full Name:</label>
                                    <input type="email" class="form-control m-input" placeholder="Enter full name">
                                    <span class="m-form__help">Please enter your full name</span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Email:</label>
                                    <input type="email" class="form-control m-input" placeholder="Enter email">
                                    <span class="m-form__help">Please enter your email</span>
                                </div>
                                <div class="col-lg-4">
                                    <label>Username:</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>
                                    <span class="m-form__help">Please enter your username</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label class="">Contact:</label>
                                    <input type="email" class="form-control m-input" placeholder="Enter contact number">
                                    <span class="m-form__help">Please enter your contact</span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Fax:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input" placeholder="Fax number">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-info-circle"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter fax</span>
                                </div>
                                <div class="col-lg-4">
                                    <label>Address:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input"
                                            placeholder="Enter your address">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-map-marker"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter your address</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label class="">Postcode:</label>
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input"
                                            placeholder="Enter your postcode">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-bookmark-o"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter your postcode</span>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">User Group:</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="example_2" checked value="2"> Sales Person
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="example_2" value="2"> Customer
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">Please select user group</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <button type="reset" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->

                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    3 Columns Horizontal Form Layout
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">Full Name:</label>
                                <div class="col-lg-3">
                                    <input type="email" class="form-control m-input" placeholder="Full name">
                                    <span class="m-form__help">Please enter your full name</span>
                                </div>
                                <label class="col-lg-1 col-form-label">Email:</label>
                                <div class="col-lg-3">
                                    <input type="email" class="form-control m-input" placeholder="Email">
                                    <span class="m-form__help">Please enter your email</span>
                                </div>
                                <label class="col-lg-1 col-form-label">Username:</label>
                                <div class="col-lg-3">
                                    <div class="input-group m-input-group m-input-group--square">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-user"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control m-input" placeholder="">
                                    </div>
                                    <span class="m-form__help">Please enter your username</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">Contact:</label>
                                <div class="col-lg-3">
                                    <input type="email" class="form-control m-input" placeholder="Enter contact number">
                                    <span class="m-form__help">Please enter your contact</span>
                                </div>
                                <label class="col-lg-1 col-form-label">Fax:</label>
                                <div class="col-lg-3">
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input" placeholder="Fax number">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-info-circle"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter fax</span>
                                </div>
                                <label class="col-lg-1 col-form-label">Address:</label>
                                <div class="col-lg-3">
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input"
                                            placeholder="Enter your address">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-map-marker"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter your address</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">Postcode:</label>
                                <div class="col-lg-3">
                                    <div class="m-input-icon m-input-icon--right">
                                        <input type="text" class="form-control m-input"
                                            placeholder="Enter your postcode">
                                        <span class="m-input-icon__icon m-input-icon__icon--right">
                                            <span>
                                                <i class="la la-bookmark-o"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="m-form__help">Please enter your postcode</span>
                                </div>
                                <label class="col-lg-1 col-form-label">User Group:</label>
                                <div class="col-lg-3">
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="example_2" checked value="2"> Sales Person
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="example_2" value="2"> Customer
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">Please select user group</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="reset" class="btn btn-brand">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->
            </div>
        </div>
    </div>
</div>
@endsection
