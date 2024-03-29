@extends('layouts.header')

@section('content')
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">External Events</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="#" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">-</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">Calendar</span>
										</a>
									</li>
									<li class="m-nav__separator">-</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">External Events</span>
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
						<div class="row">
							<div class="col-lg-3">

								<!--begin::Portlet-->
								<div class="m-portlet" id="m_portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-add"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Draggable Events
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div id="m_calendar_external_events" class="fc-unthemed">
											<div class='fc-event fc-event-external fc-start m-fc-event--primary m--margin-bottom-15' data-color="m-fc-event--primary">
												<div class="fc-title">
													<div class="fc-content">Meeting</div>
												</div>
											</div>
											<div class='fc-event fc-event-external fc-start m-fc-event--accent  m--margin-bottom-15' data-color="m-fc-event--accent">
												<div class="fc-title">
													<div class="fc-content">Conference Call</div>
												</div>
											</div>
											<div class='fc-event fc-event-external fc-start m-fc-event--focus  m--margin-bottom-15' data-color="m-fc-event--focus">
												<div class="fc-title">
													<div class="fc-content">Dinner</div>
												</div>
											</div>
											<div class='fc-event fc-event-external fc-start m-fc-event--warning  m--margin-bottom-15' data-color="m-fc-event--warning">
												<div class="fc-title">
													<div class="fc-content">Product Launch</div>
												</div>
											</div>
											<div class='fc-event fc-event-external fc-start m-fc-event--danger  m--margin-bottom-15' data-color="m-fc-event--danger">
												<div class="fc-title">
													<div class="fc-content">Reporting</div>
												</div>
											</div>
											<div class="m-separator m-separator--dashed m-separator--space"></div>
											<div class='fc-event fc-event-external fc-start m-fc-event--focus m--margin-bottom-15' data-color="m-fc-event--focus">
												<div class="fc-title">
													<div class="fc-content">Client Meeting</div>
												</div>
											</div>
											<div class='fc-event fc-event-external fc-start m-fc-event--success  m--margin-bottom-15' data-color="m-fc-event--success">
												<div class="fc-title">
													<div class="fc-content">Project Update</div>
												</div>
											</div>
											<div class='fc-event fc-event-external fc-start m-fc-event--info  m--margin-bottom-15' data-color="m-fc-event--info">
												<div class="fc-title">
													<div class="fc-content">Staff Meeting</div>
												</div>
											</div>
											<div class='fc-event fc-event-external fc-start m-fc-event--metal  m--margin-bottom-15' data-color="m-fc-event--metal">
												<div class="fc-title">
													<div class="fc-content">Lunch</div>
												</div>
											</div>
											<div class="m-separator m-separator--dashed m-separator--space"></div>
											<div>
												<label class="m-checkbox m-checkbox--brand">
													<input type="checkbox" id='m_calendar_external_events_remove'> Remove after drop
													<span></span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<!--end::Portlet-->
							</div>
							<div class="col-lg-9">

								<!--begin::Portlet-->
								<div class="m-portlet" id="m_portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon">
													<i class="flaticon-calendar-2"></i>
												</span>
												<h3 class="m-portlet__head-text">
													My Calendar
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item">
													<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-plus"></i>
															<span>Add Event</span>
														</span>
													</a>
												</li>
												<li class="m--hide m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
													<a href="#" class="btn btn-focus m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-cog"></i>
															<span>Settings</span>
														</span>
													</a>
													<div class="m-dropdown__wrapper">
														<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 52px;"></span>
														<div class="m-dropdown__inner">
															<div class="m-dropdown__body">
																<div class="m-dropdown__content">
																	<ul class="m-nav">
																		<li class="m-nav__section m-nav__section--first">
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
																			<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body">
										<div id="m_calendar"></div>
									</div>
								</div>

								<!--end::Portlet-->
							</div>
						</div>
					</div>
				</div>
@endsection