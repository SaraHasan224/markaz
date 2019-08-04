@extends('user.profile')
@section('profile')
<div class="col-xl-9 col-lg-8">
    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_3"
                            role="tab">
                            Recent Activites
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="m_user_profile_tab_3">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">

                        <!--Begin::Timeline 2 -->
                        <div class="m-timeline-2">
                            <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30" style="margin-top:50px;  margin-left:50px;">
                            @if(!empty($logs))
                                @foreach($logs as $key => $time)
                                    <?php
                                        if($key % 2 == 0):
                                            $class = 'm--font-danger';
                                        elseif($key % 3 == 0):
                                            $class = 'm--font-success';
                                        elseif($key % 5 == 0):
                                            $class = 'm--font-brand';
                                        elseif($key % 7 == 0):
                                            $class = 'm--font-warning';
                                        else:
                                            $class = 'm--font-info';
                                    endif;
                                    ?> 
                                    <div class="m-timeline-2__item" style=" margin-left:20px;">
                                        <span class="m-timeline-2__item-time">{{DATE_FORMAT($time->created_at,'h : i A')}}</span>
                                        <div class="m-timeline-2__item-cricle" style=" margin-left:40px;">
                                            <i class="fa fa-genderless {{$class}}"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                            {{$time->component}} was {{$time->operation}}
                                        </div>
                                    </div>
                                    <br/>
                                @endforeach
                            @endif
                            </div>
                        </div>

                        <!--End::Timeline 2 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection