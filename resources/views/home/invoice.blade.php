@extends('layouts.header')

@section('content')
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item " aria-haspopup="true">
								<a href="../../index.html" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">Dashboard</span>
											<span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">2</span>
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">Components</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">Base</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Base</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/state.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">State Colors</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/typography.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Typography</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/stack.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Stack</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/tables.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Tables</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/progress.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Progress</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/modal.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Modal</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/alerts.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Alerts</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/popover.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Popover</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/tooltip.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Tooltip</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/blockui.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Block UI</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/spinners.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Spinners</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/scrollable.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Scrollable</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/dropdown.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Dropdown</span>
											</a>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Tabs</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/base/tabs/bootstrap.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Bootstrap Tabs</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/base/tabs/line.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Line Tabs</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/accordions.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Accordions</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/navs.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Navs</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/lists.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Lists</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/treeview.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Tree View</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/bootstrap-notify.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Bootstrap Notify</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/toastr.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Toastr</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/base/sweetalert2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">SweetAlert2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">Icons</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/icons/flaticon.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Flaticon</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/icons/fontawesome5.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Fontawesome 5</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/icons/lineawesome.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Lineawesome</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/icons/socicons.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Socicons</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-multimedia-1"></i>
									<span class="m-menu__link-text">Buttons</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Buttons</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Button Base</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/buttons/base/default.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Default Style</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/buttons/base/square.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Square Style</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/buttons/base/pill.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Pill Style</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/buttons/base/air.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Air Style</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/buttons/group.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Button Group</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/buttons/dropdown.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Button Dropdown</span>
											</a>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Button Icon</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/buttons/icon/lineawesome.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Lineawesome Icons</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/buttons/icon/fontawesome.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Fontawesome Icons</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/buttons/icon/flaticon.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Flaticon Icons</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-1"></i>
									<span class="m-menu__link-text">Portlets</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Portlets</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/portlets/base.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Base Portlets</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/portlets/advanced.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Advanced Portlets</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/portlets/creative.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Creative Portlets</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/portlets/tabbed.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Tabbed Portlets</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/portlets/draggable.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Draggable Portlets</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/portlets/tools.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Portlet Tools</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/portlets/sticky-head.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Sticky Head</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-6"></i>
									<span class="m-menu__link-text">Timeline</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Timeline</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/timeline/timeline-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Timeline 1</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/timeline/timeline-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Timeline 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-network"></i>
									<span class="m-menu__link-text">Widgets</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Widgets</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/widgets/general.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">General Widgets</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/widgets/chart.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Chart Widgets</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-calendar"></i>
									<span class="m-menu__link-text">Calendar</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Calendar</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/calendar/basic.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Basic Calendar</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/calendar/list-view.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">List Views</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/calendar/google.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Google Calendar</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/calendar/external-events.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">External Events</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/calendar/background-events.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Background Events</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-diagram"></i>
									<span class="m-menu__link-text">Charts</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Charts</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">amCharts</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/charts/amcharts/charts.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">amCharts Charts</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/charts/amcharts/stock-charts.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">amCharts Stock Charts</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../components/charts/amcharts/maps.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">amCharts Maps</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/charts/flotcharts.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Flot Charts</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/charts/google-charts.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Google Charts</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/charts/morris-charts.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Morris Charts</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-placeholder-1"></i>
									<span class="m-menu__link-text">Maps</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Maps</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/maps/google-maps.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Google Maps</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/maps/jqvmap.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">JQVMap</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-signs-2"></i>
									<span class="m-menu__link-text">Utils</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Utils</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/utils/session-timeout.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Session Timeout</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../components/utils/idle-timer.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Idle Timer</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">CRUD</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-7"></i>
									<span class="m-menu__link-text">Forms & Controls</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Forms & Controls</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Controls</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/controls/base.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Base Inputs</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/controls/checkbox-radio.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Checkbox & Radio</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/controls/input-group.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Input Groups</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/controls/switch.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Switch</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/controls/option.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Mega Options</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Widgets</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-datepicker.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Datepicker</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-datetimepicker.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Datetimepicker</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-timepicker.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Timepicker</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-daterangepicker.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Daterangepicker</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-touchspin.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Touchspin</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-maxlength.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Maxlength</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-switch.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Switch</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-multipleselectsplitter.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Multiple Select Splitter</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-select.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Bootstrap Select</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/select2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Select2</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/typeahead.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Typeahead</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/nouislider.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">noUiSlider</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/form-repeater.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Form Repeater</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/ion-range-slider.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Ion Range Slider</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/input-mask.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Input Masks</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/summernote.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Summernote WYSIWYG</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/bootstrap-markdown.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Markdown Editor</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/autosize.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Autosize</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/clipboard.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Clipboard</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/dropzone.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Dropzone</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/widgets/recaptcha.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Google reCaptcha</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Layouts</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/layouts/default-forms.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Default Forms</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/layouts/multi-column-forms.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Multi Column Forms</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/layouts/action-bars.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Basic Action Bars</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/layouts/sticky-action-bar.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Sticky Action Bar</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Validation</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/validation/states.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Validation States</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/validation/form-controls.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Form Controls</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/forms/validation/form-widgets.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Form Widgets</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-8"></i>
									<span class="m-menu__link-text">Metronic Wizard</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../crud/wizard/wizard-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Wizard 1</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../crud/wizard/wizard-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Wizard 2</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../crud/wizard/wizard-3.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Wizard 3</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../crud/wizard/wizard-4.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Wizard 4</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../crud/wizard/wizard-5.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Form Wizard 5</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-tabs"></i>
									<span class="m-menu__link-text">Metronic Datatable</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Metronic Datatable</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Base</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/data-local.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Local Data</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/data-json.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">JSON Data</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/data-ajax.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Ajax Data</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/html-table.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">HTML Table</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/record-selection.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Record Selection</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/local-sort.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Local Sort</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/row-details.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Row Details</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/column-rendering.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Column Rendering</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/column-width.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Column Width</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/responsive-columns.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Responsive Columns</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/base/translation.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Translation</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Scrolling</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/scrolling/vertical.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Vertical Scrolling</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/scrolling/horizontal.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Horizontal Scrolling</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/scrolling/both.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Both Scrolling</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Locked Columns</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/locked/left.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Left Locked Columns</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/locked/right.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Right Locked Columns</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/locked/both.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Both Locked Columns</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/locked/html-table.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">HTML Table</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Child Datatables</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/child/data-local.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Local Data</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/child/data-ajax.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Remote Data</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">API</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/api/methods.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">API Methods</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/metronic-datatable/api/events.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Events</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-list-3"></i>
									<span class="m-menu__link-text">DataTables</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">DataTables</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Basic</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/basic/basic.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Basic Tables</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/basic/scrollable.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Scrollable Tables</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/basic/headers.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Complex Headers</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/basic/paginations.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Pagination Options</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Advanced</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/advanced/column-rendering.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Column Rendering</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/advanced/multiple-controls.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Multiple Controls</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/advanced/column-visibility.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Column Visibility</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/advanced/row-callback.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Row Callback</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/advanced/row-grouping.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Row Grouping</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/advanced/footer-callback.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Footer Callback</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Data sources</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/data-sources/html.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">HTML</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/data-sources/javascript.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Javascript</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/data-sources/ajax-client-side.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Ajax Client-side</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/data-sources/ajax-server-side.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Ajax Server-side</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Search Options</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/search-options/column-search.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Column Search</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/search-options/advanced-search.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Advanced Search</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Extensions</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/extensions/buttons.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Buttons</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/extensions/colreorder.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">ColReorder</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/extensions/keytable.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">KeyTable</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/extensions/responsive.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Responsive</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/extensions/rowgroup.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">RowGroup</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/extensions/rowreorder.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">RowReorder</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/extensions/scroller.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Scroller</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a href="../../crud/datatables/extensions/select.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Select</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">Snippets</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-9"></i>
									<span class="m-menu__link-text">Pricing Tables</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Pricing Tables</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../snippets/general/pricing-tables/pricing-table-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Pricing Tables v1</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../snippets/general/pricing-tables/pricing-table-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Pricing Tables v2</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../snippets/general/pricing-tables/pricing-table-3.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Pricing Tables v3</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../snippets/general/pricing-tables/pricing-table-4.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Pricing Tables v4</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-piggy-bank"></i>
									<span class="m-menu__link-text">Invoices</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Invoices</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../snippets/invoices/invoice-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Invoice v1</span>
											</a>
										</li>
										<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
											<a href="../../snippets/invoices/invoice-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Invoice v2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-exclamation"></i>
									<span class="m-menu__link-text">FAQS</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">FAQS</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true">
											<a href="../../snippets/faq/faq-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">FAQ v1</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-suitcase"></i>
									<span class="m-menu__link-text">Custom Pages</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
											<span class="m-menu__link">
												<span class="m-menu__link-text">Custom Pages</span>
											</span>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">User Pages</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/user/login-1.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Login - 1</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/user/login-2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Login - 2</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/user/login-3.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Login - 3</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/user/login-4.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Login - 4</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/user/login-5.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Login - 5</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/user/login-6.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Login - 6</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
											<a href="javascript:;" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">Error Pages</span>
												<i class="m-menu__ver-arrow la la-angle-right"></i>
											</a>
											<div class="m-menu__submenu ">
												<span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/errors/error-1.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Error 1</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/errors/error-2.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Error 2</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/errors/error-3.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Error 3</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/errors/error-4.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Error 4</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/errors/error-5.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Error 5</span>
														</a>
													</li>
													<li class="m-menu__item " aria-haspopup="true">
														<a target="_blank" href="../../snippets/pages/errors/error-6.html" class="m-menu__link ">
															<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																<span></span>
															</i>
															<span class="m-menu__link-text">Error 6</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>

					<!-- END: Aside Menu -->
				</div>

				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">Invoice v2</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="#" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">-</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">Invoices</span>
										</a>
									</li>
									<li class="m-nav__separator">-</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">Invoice v2</span>
										</a>
									</li>
								</ul>
							</div>
							<div>
								<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
									<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
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
															<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
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
								<div class="m-portlet">
									<div class="m-portlet__body m-portlet__body--no-padding">
										<div class="m-invoice-2">
											<div class="m-invoice__wrapper">
												<div class="m-invoice__head" style="background-image: url(../../assets/app/media/img//logos/bg-6.jpg);">
													<div class="m-invoice__container m-invoice__container--centered">
														<div class="m-invoice__logo">
															<a href="#">
																<h1>INVOICE</h1>
															</a>
															<a href="#">
																<img src="../../assets/app/media/img//logos/logo_client_color.png">
															</a>
														</div>
														<span class="m-invoice__desc">
															<span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
															<span>Mississippi 96522</span>
														</span>
														<div class="m-invoice__items">
															<div class="m-invoice__item">
																<span class="m-invoice__subtitle">DATA</span>
																<span class="m-invoice__text">Dec 12, 2017</span>
															</div>
															<div class="m-invoice__item">
																<span class="m-invoice__subtitle">INVOICE NO.</span>
																<span class="m-invoice__text">GS 000014</span>
															</div>
															<div class="m-invoice__item">
																<span class="m-invoice__subtitle">INVOICE TO.</span>
																<span class="m-invoice__text">Iris Watson, P.O. Box 283 8562 Fusce RD.
																	<br>Fredrick Nebraska 20620</span>
															</div>
														</div>
													</div>
												</div>
												<div class="m-invoice__body m-invoice__body--centered">
													<div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th>DESCRIPTION</th>
																	<th>HOURS</th>
																	<th>RATE</th>
																	<th>AMOUNT</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Creative Design</td>
																	<td>80</td>
																	<td>$40.00</td>
																	<td class="m--font-danger">$3200.00</td>
																</tr>
																<tr>
																	<td>Front-End Development</td>
																	<td>120</td>
																	<td>$40.00</td>
																	<td class="m--font-danger">$4800.00</td>
																</tr>
																<tr>
																	<td>Back-End Development</td>
																	<td>210</td>
																	<td>$60.00</td>
																	<td class="m--font-danger">$12600.00</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="m-invoice__footer">
													<div class="m-invoice__table  m-invoice__table--centered table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th>BANK</th>
																	<th>ACC.NO.</th>
																	<th>DUE DATE</th>
																	<th>TOTAL AMOUNT</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>BARCLAYS UK</td>
																	<td>12345678909</td>
																	<td>Jan 07, 2018</td>
																	<td class="m--font-danger">20,600.00</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- end:: Body -->
@endsection