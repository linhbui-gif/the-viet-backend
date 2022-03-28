@extends("enduser.layout")
@section('meta')

    @include("enduser.meta",[
    'title' => $_config->meta_title,
    'description' => $_config->meta_description,
    'link' => route('siteService'),
    'img' => asset('images/logo2.png')
    ])

@stop
@section('head')
    @php
        $page_content = unserialize($page->content);
    @endphp
@stop
@section('content')

    @php
        $aboutService = \App\Banner::where('type',0)->where('status','active')->where('location','banner_about_dv')->orderBy('id','desc')->first();
        $bannerServices = \App\Banner::where('type',0)->where('status','active')->where('location','banner_dv_page')->orderBy('order_no','asc')->get();
    @endphp
    @include('enduser.page.components.brebcrumb',['title' => @$page_content['service_page']['name'],'description' => @$page_content['service_page']['description'],'thumb' => asset('images/page/'.@$page_content['banner_services']['picture'])])
    <!-- About Us -->
    <div class="about-area pt-100 pb-100">
        <!-- Container -->
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-6">
                    <div class="about-image-warp" style="background-image: url({{$aboutService->picture}});">
{{--                        <a href="https://www.youtube.com/watch?v=mHjdlO4JSsA" class="video-btn popup-youtube">--}}
{{--                            <i class="ri-play-fill"></i>--}}
{{--                        </a>--}}
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-6">
                    <div class="about-content warp">
                        <!-- row -->
                        <div class="row justify-content-center text-center">
                            <!-- col -->
                            <div class="col-lg-8 col-md-12 ">
                                <div class="section-title">
                                    <h2 class="title">{{$aboutService->title}}</h2>
                                    <div class="title-bdr">
                                        <div class="left-bdr"></div>
                                        <div class="right-bdr"></div>
                                    </div>
                                    <p>Dễ dàng khởi tạo tài khoản và được phát hành thẻ.</p>

                                </div>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                        <div class="about-inner-content">
{{--                            <div class="icon">--}}
{{--                                <i class="las la-check"></i>--}}
{{--                            </div>--}}
                            {!! $aboutService->description !!}
                        </div>

                        <div class="about-btn justify-content-center text-center">
                            <a href="{{$aboutService->link}}" class="btn theme-btn-1">
                                {{$aboutService->button_name}}
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /About Us -->

    <div class="services-area">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">{{@$page_content['app']['name']}}</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p>{{@$page_content['app']['description']}}</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="service-carousel testimonial-item-wrap-1">
                    @if(!empty($bannerServices))
                        @foreach($bannerServices as $k => $b)
                            <div class="service-item">
                                <div class="col-12">
                                    <div class="single-services-item">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{$b->picture}}" alt="{{$b->name}}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h3>
                                                <a href="#">{{$b->name}}</a>
                                            </h3>
                                            {{--                                    <span>Lorem ipsum</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
<?php
   $listTab  =\App\QA_answer::where('status','active')->orderBy('id','asc')->get();
?>
    <!-- FAQ -->
    <div class="faq-area pt-100 pb-100">
        <!-- Container -->
        <div class="container">
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">{{@$page_content['question']['name']}}</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p>{{@$page_content['question']['description']}}</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <div class="tab faq-accordion-tab">
                <ul class="tabs d-flex flex-wrap justify-content-center">
                    @if(!empty($listTab))
                    @foreach($listTab as $k => $v)
                    <li class="mb-4"><a href="#"> <span>{{$v->name}}</span></a></li>
                    @endforeach
                    @endif
                </ul>

                <div class="tab-content">
                    @if(!empty($listTab))
                        @foreach($listTab as $k => $v)
                            <?php
                             $listQuestion = $v->questions()->where('status','active')->get();
                            ?>
                    <div class="tabs-item">
                        <div class="faq-accordion">
                            <ul class="accordion">
                                @if(!empty($listQuestion))
                                    @foreach($listQuestion as $j => $data)
                                <li class="accordion-item">
                                    <a class="accordion-title active" href="javascript:void(0)">
                                        <i class='las la-angle-down'></i>
                                        {{$data->name}}
                                    </a>

                                    <div class="accordion-content show">
                                        <p> {!! $data->answer !!}</p>
                                    </div>
                                </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- /Container -->
    </div>
    <!-- /FAQ -->
@stop
