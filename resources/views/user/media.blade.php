@extends('user.profile')
@section('profile')
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        @if(Session::get('role_name') == 'Store Admin')  
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                        Photos & Videos
                                    </a>
                                </li>
                        @endif
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_3">
                            <div class="masonry-wrapper">
                                <div class="masonry">
                                @if($media != '')
                                    @foreach($media as $m)
                                    @if(!empty($m->media_id))
                                        <div class="masonry-item">
                                            <img src="{{ asset('images/promotion_media/'.$m->media_id) }}" alt="Dummy Image"
                                                class="masonry-content">
                                        </div>
                                    @else
                                        No image added to account
                                    @endif
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection 