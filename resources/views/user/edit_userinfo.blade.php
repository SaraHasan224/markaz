@extends('user.profile')

@section('profile')
<div class="col-xl-9 col-lg-8">
    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1"
                            role="tab">
                            <i class="flaticon-share m--hide"></i>
                            Edit About
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                            Edit Location
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                            Edit Contact Information
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="m_user_profile_tab_1">
                <form class="m-form m-form--fit m-form--label-align-right">
                    <div class="m-portlet__body">
                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                        <div class="form-group m-form__group row">
                            <div class="col-10 ml-auto">
                                <h3 class="m-form__section">1. Edit Company's Introduction</h3>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-12">
                                <textarea class="form-control" id="m_clipboard_3" rows="6">Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo.
												Manduma pindureta quium dia nois paga.</textarea>
                                <div class="m--space-10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-7">
                                    <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save
                                        changes</button>&nbsp;&nbsp;
                                    <button type="reset"
                                        class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="m_user_profile_tab_2">
                <form class="m-form m-form--fit m-form--label-align-right">
                    <div class="m-portlet__body">
                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                        <div class="form-group m-form__group row">
                            <div class="col-10 ml-auto">
                                <h3 class="m-form__section">1. Edit Company's Location</h3>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-12">
                                <textarea class="form-control" id="m_clipboard_3" rows="6">Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo.
												Manduma pindureta quium dia nois paga.</textarea>
                                <div class="m--space-10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-7">
                                    <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save
                                        changes</button>&nbsp;&nbsp;
                                    <button type="reset"
                                        class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="m_user_profile_tab_3">
                <form class="m-form m-form--fit m-form--label-align-right">
                    <div class="m-portlet__body">
                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                        <div class="form-group m-form__group row">
                            <div class="col-10 ml-auto">
                                <h3 class="m-form__section">1. Contact Information</h3>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Address :</label>
                            <div class="col-7">
                                <input class="form-control m-input" type="text" value="www.linkedin.com/Mark.Andre">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Tel :</label>
                            <div class="col-7">
                                <input class="form-control m-input" type="text" value="www.facebook.com/Mark.Andre">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Website :</label>
                            <div class="col-7">
                                <input class="form-control m-input" type="text" value="www.twitter.com/Mark.Andre">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Email Address :</label>
                            <div class="col-7">
                                <input class="form-control m-input" type="text" value="www.instagram.com/Mark.Andre">
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-7">
                                    <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save
                                        changes</button>&nbsp;&nbsp;
                                    <button type="reset"
                                        class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
