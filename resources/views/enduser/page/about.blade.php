@extends("enduser.layout")
@section('meta')

    @include("enduser.meta",[
    'title' => $_config->meta_title,
    'description' => $_config->meta_description,
    'link' => route('siteAbout'),
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

        $bannerAbout = \App\Helper\Common::getFromCache('banner_about');
       if(!$bannerAbout) {
        $bannerAbout = \App\Banner::where('type',0)->where('status','active')->where('location','banner_about')->orderBy('id','desc')->first();
        \App\Helper\Common::putToCache('banner_about',$bannerAbout);
      }
       $widgets = \App\Widget::where('location', 'timeline')->orderBy('order_no','desc')->get();
       $blogs = \App\blog_posts::where('status','active')->orderBy('order_no','asc')->get();
    @endphp
    @include('enduser.page.components.brebcrumb',['title' => @$page_content['about_page']['name'],'description' => @$page_content['about_page']['description'],'thumb' => asset('images/page/'.@$page_content['banner_about']['picture'])])
    <!-- About Us -->
    <div class="about-area pt-100 pb-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-6">
                    <div class="about-image-warp" style="background-image: url({{@$bannerAbout->picture}});">
                        <a href="javascript::void(0)" data-src="https://www.youtube.com/embed/mHjdlO4JSsA"
                           data-bs-toggle="modal" data-bs-target="#modalShowVideo" class="video-btn popup-youtube">
                            <i class="ri-play-fill"></i>
                        </a>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-6">
                    <div class="about-content warp">
                        <!-- row -->
                        <div class="row justify-content-center text-center">
                            <!-- col -->
                            <div class="col-lg-8 col-md-12">
                                <div class="section-title">
                                    <h2 class="title">{{@$bannerAbout->name}}</h2>
                                    <p>{{@$bannerAbout->title}}</p>
                                    <div class="title-bdr">
                                        <div class="left-bdr"></div>
                                        <div class="right-bdr"></div>
                                    </div>

                                </div>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                        <p>{!! @$bannerAbout->description !!}</p>
                        <div class="about-btn justify-content-center text-center">
                            <a href="{{@$bannerAbout->link}}" class="btn theme-btn-1">
                                {{@$bannerAbout->button_name}}
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

    <!-- timeline  -->
    <div class="content-block">
        <!-- Time Line -->
        <div class="section-full content-inner">
            <div class="container">
                <div class="section-head text-center">
                    <h2 class="title-head">{{@$page_content['hanhtrinh']['name']}}</h2>
                    <p>{{@$page_content['hanhtrinh']['description']}}
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center m-b30">
                        <img src="images/rocket.png" alt="" class="fa faa-horizontal animated">

                    </div>
                    <div class="col-lg-12">
                        <div class="time-line clearfix">
                            @foreach($widgets as $k =>  $v)
                                @if($v->order_no%2 == 0)
                                    <div class="line-left clearfix">
                                        <div class="line-left-box">
                                            <div class="line-content-box">
                                                <h2 class="min-title text-primary "id="text-primary">{{$v->date}}</h2>

                                                {!! $v->content !!}
                                            </div>
                                            <div class="line-num bg-primary-dark">{{$v->order_no}}</div>
                                        </div>
                                    </div>
                                @else
                                    <div class="line-right clearfix">
                                        <div class="line-right-box">
                                            <div class="line-content-box">
                                                <h2 class="min-title text-primary" id="text-primary">{{$v->date}}</h2>

                                                {!! $v->content !!}
                                            </div>
                                            <div class="line-num bg-primary-dark">{{$v->order_no}}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <h5 class="text-primary end-text" id="text-primary">Start</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Time Line End -->

    </div>
    <!-- Blog -->
    <div class="blog-area pt-120 pb-100">
        <!-- Container-->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">

                        <h2 class="title">{{@$page_content['thanhtuu']['name']}}</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p>{{@$page_content['thanhtuu']['description']}}</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
            <!-- row -->
            <div class="row">
                <div class="news-carousel testimonial-item-wrap-1">
                    @if(!empty($blogs))
                        @foreach($blogs as $k => $blog)
                            <div class="news-item">
                                <div class="col-12">
                                    @include('enduser.page.components.cardComponent',['data' => $blog,'isblog' => true] )
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container-->
    </div>
    <!-- /Blog -->
@stop
