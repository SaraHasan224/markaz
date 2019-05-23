<?php $__env->startSection('content'); ?>


<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">FAQ v1</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="<?php echo e(url('/')); ?>" class="m-nav__link">
                            <span class="m-nav__link-text">Home</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="<?php echo e(url('faq')); ?>" class="m-nav__link">
                            <span class="m-nav__link-text">FAQs</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="JavaScript::void(0);" class="m-nav__link">
                            <span class="m-nav__link-text">Edit</span>
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

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--space">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            FAQ Example
                        </h3>
                    </div>
                </div>
            </div>
			<form class="m-form">
                <div class="m-portlet__body">
                    <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40">
                    </div>
                    <div id="m_repeater_1">
                        <div class="form-group  m-form__group row" id="m_repeater_1">
                            <label class="col-lg-2 col-form-label">FAQ Title & Description:</label>
                            <div data-repeater-list="" class="col-lg-10">
                                <div data-repeater-item class="form-group m-form__group row align-items-center">
                                    <div class="col-md-10">
                                        <div class="m-form__group m-form__group--inline">
                                            <div class="m-form__label">
                                                <label>Title:</label>
                                            </div>
                                            <div class="m-form__control">
                                                <input type="email" class="form-control m-input"
                                                    placeholder="Enter title here">
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="m-form__group m-form__group--inline">
                                            <div class="m-form__label">
                                                <label class="m-label m-label--single">Description:</label>
                                            </div>
                                            <div class="m-form__control">
                                                <textarea class="form-control m-input m-input--solid" id="exampleTextarea" rows="3" placeholder="Enter text here.."></textarea>
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div data-repeater-delete=""
                                            class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
                                            <span>
                                                <i class="la la-trash-o"></i>
                                                <span>Delete</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-form__group form-group row">
                            <label class="col-lg-2 col-form-label"></label>
                            <div class="col-lg-4">
                                <div data-repeater-create=""
                                    class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!--end::Portlet-->
    </div>
</div>

<!-- end:: Body -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>