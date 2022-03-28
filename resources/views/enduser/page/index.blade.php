@extends("enduser.layout")

@section('meta')

    @include("enduser.meta",[
    'title' => $_config->meta_title,
    'description' => $_config->meta_description,
    'link' => route('siteIndex'),
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
        $banner = \App\Helper\Common::getFromCache('banner_home');
        if(!$banner) {
          $banner = \App\Banner::where('type',1)->where('status','active')->where('location','banner_home')->orderBy('order_no','asc')->get();
          \App\Helper\Common::putToCache('banner_home',$banner);
        }
        $bannerAbout = \App\Helper\Common::getFromCache('banner_about');
         if(!$bannerAbout) {
          $bannerAbout = \App\Banner::where('type',0)->where('status','active')->where('location','banner_about')->orderBy('id','desc')->first();
          \App\Helper\Common::putToCache('banner_about',$bannerAbout);
        }

        $galleries = json_decode(@$bannerAbout->gallery,true);
        $bannerPartner = \App\Banner::where('type',0)->where('status','active')->where('location','banner_partner')->orderBy('order_no','asc')->get();
        $bannerServices = \App\Banner::where('type',0)->where('status','active')->where('location','banner_dv_page')->orderBy('order_no','asc')->get();
        $bannerTeam= \App\Banner::where('type',0)->where('status','active')->where('location','banner_team')->orderBy('order_no','asc')->get();
        $bannerwhy =  \App\Banner::where('type',0)->where('status','active')->where('location','banner_why_choose')->orderBy('order_no','asc')->first();
        $bannerDownload =  \App\Banner::where('type',0)->where('status','active')->where('location','banner_download')->orderBy('order_no','asc')->first();
    @endphp
    <!-- Hero -->
    <div class="hero-1 oh pos-rel" style="background: url({{asset('enduser/theviet/images/hero/banner-bg.png')}})">
        <!-- container -->
        <div class="hero-banner-carousel">
            @if(!empty($banner))
                @foreach($banner as $k => $b)
                    <div class="hero-carousel-item">
                        <div class="container">
                            <!-- row -->
                            <div class="row align-items-center">
                                <!-- col -->
                                <div class="col-lg-5">
                                    <div class="hero-1-content wow fadeInLeft animated">
                                        <h5 class="cate  wow fadeInUp animated" data-wow-delay="0.2s">
                                            #{{$b->title}}</h5>
                                        <h1 class="title  wow fadeInUp animated" data-wow-delay="0.4s">{{$b->name}}</h1>
                                        {!! $b->description !!}
                                        <div class="hero-1-button-group">
                                            <a href=" {{$b->link}}" data-bs-toggle="modal"
                                               data-bs-target="#modalHomeSLiders"
                                               class="btn theme-btn-1  wow fadeInUp animated" data-wow-delay="0.8s">
                                                {{$b->button_name}}
                                                <i class="uil uil-angle-right-b ml-2 mb-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col -->
                                <!-- col -->
                                <div class="col-lg-7 d-lg-block">
                                    <div class="hero-1-thumb-15 wow fadeInUp animated" data-wow-delay="0.4s">
                                        <img class="img-fluid wow fadeInRight animated" src="{{$b->picture}}"
                                             alt="hero-1">
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- /Hero -->
    <div class="counterup_aera d-flex flex-wrap pt-100 pb-100">
        @for($stt = 1; $stt < 5; $stt++)
            @if(isset($page_content['thong_ke_khoi_' . $stt]))
                @php
                    $item = $page_content['thong_ke_khoi_' . $stt];
                @endphp
                <div class="counterup_text  mb-lm-30px">
                    <h3 class="counterup">{{@$item['number']}}</h3>
                    <p><i class="las la-{{@$item['icon']}}"></i></p>
                    <p>{{@$item['name']}}</p>
                </div>

            @endif
        @endfor
    </div>
    <!-- About Us -->
    <div class="about-area pt-100 pb-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-6">
                    <div class="about-image-warp" style="background-image: url({{@$bannerAbout->picture}});">
<<<<<<< HEAD
{{--                        <a href="javascript::void(0)" data-src="https://www.youtube.com/embed/mHjdlO4JSsA"--}}
{{--                           data-bs-toggle="modal" data-bs-target="#modalShowVideo" class="video-btn popup-youtube">--}}
{{--                            <i class="ri-play-fill"></i>--}}
{{--                        </a>--}}
=======
                        <a href="javascript::void(0)" data-src="https://www.youtube.com/embed/mHjdlO4JSsA"
                           data-bs-toggle="modal" data-bs-target="#modalShowVideo" class="video-btn popup-youtube">
                            <i class="ri-play-fill"></i>
                        </a>
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
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
    <!-- /Services -->
    <div class="services-area">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">{{@$page_content['lienket']['name']}}</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p> {{@$page_content['lienket']['description']}}</p>
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
<<<<<<< HEAD
                                                <img class="lazy" data-src="{{$b->picture}}" alt="{{$b->name}}">
=======
                                                <img src="{{$b->picture}}" alt="{{$b->name}}">
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
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
    <!-- /Services -->
    <!-- Client Logo -->
    <div class="client-logo-area pb-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">{{@$page_content['donvi']['name']}}</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p>{{@$page_content['donvi']['description']}}</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <div class="row">

                <!-- col -->
                <div class="clients-carousel testimonial-item-wrap-1">
                    @if(!empty($bannerPartner))
                        @foreach($bannerPartner as $k => $v)
                            <div class="clients-item">
                                <div class="col-12 text-center">
                                    <div class="client-logo">
                                        <div class="client-logo-img modalClient" data-id="{{$v->id}}" data-bs-toggle="modal"
                                             data-bs-target="#modalClient" ><img
<<<<<<< HEAD
                                                class="lazy img-fluid" data-src="{{$v->picture}}" alt="" ></div>
=======
                                                src="{{$v->picture}}" alt="" class="img-fluid"></div>
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- /col -->

                <!-- /col -->
            </div>
            <!-- row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Client Logo -->

    <!-- Choose Us -->
    <div class="why-choose-us-area pb-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row align-items-center">
                <!-- col -->
                <div class="col-lg-6">
                    <div class="why-choose-us-img">
<<<<<<< HEAD
                        <img class="lazy" data-src="{{@$bannerwhy->picture}}" alt="Image">
=======
                        <img src="{{@$bannerwhy->picture}}" alt="Image">
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-6">
                    <div class="why-choose-us-content mb-removed">
                        <!-- row -->
                        <div class="row justify-content-center text-center">
                            <!-- col -->
                            <div class="col-lg-8 col-md-12 mb-50">
                                <div class="section-title">
                                    <h2 class="title">{{@$bannerwhy->name}}</h2>
                                    <div class="title-bdr">
                                        <div class="left-bdr"></div>
                                        <div class="right-bdr"></div>
                                    </div>
                                    <p>{{@$bannerwhy->title}}</p>
                                </div>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                      {!! @$bannerwhy->description !!}
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Choose Us -->
    <!-- Download -->
    <div class="download-area">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row align-items-center justify-content-between">
                <!-- col -->
                <div class="col-xl-7 col-lg-6 col-md-6">
                    <div class="download-1-content mt-50">
                        <h2 class=" wow fadeInUp animated">{{@$bannerDownload->name}}</h2>
                        <ul>
                          {!! @$bannerDownload->description !!}
                        </ul>
                        <div class="mt-4 wow fadeInUp animated" data-wow-delay="0.6s">
                            <a href="#" class="btn theme-btn-1">
                                <img src="{{asset('enduser/theviet/images/svg/android.svg')}}" alt="">
                            </a>
                            <a href="#" class="btn theme-btn-1">
                                <img src="{{asset('enduser/theviet/images/svg/apple.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="download-1-img">
<<<<<<< HEAD
                        <img  class="lazy img-fluid" data-src="{{@$bannerDownload->picture}}" alt="">
=======
                        <img class=" img-fluid" src="{{@$bannerDownload->picture}}" alt="">
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Download -->

    <!-- Blog -->
    <div class="blog-area pt-120 pb-100">
        <!-- Container-->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">{{@$page_content['chuongtrinh']['name']}}</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p>{{@$page_content['chuongtrinh']['description']}}</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
            <!-- row -->
            <?php

            ?>
            <div class="row">
                <div class="news-carousel testimonial-item-wrap-1">
                    @if(!empty($news))
                        @foreach($news as $k => $data)
                            <div class="news-item">
                                <div class="col-12">
<<<<<<< HEAD
                                    <div class="blog-wrapper mb-30 news-item custom-style">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img width="100%" class="lazy" data-src="{{  $data->url_picture }}" alt="{{$data->name}}">
=======
                                    <div class="blog-wrapper mb-30 news-item">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img width="100%" src="{{  $data->url_picture }}" alt="{{$data->name}}">
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                                            </a>
                                            <p class="category-news">
                                                {{@$data->category->name}}
                                            </p>
                                        </div>
<<<<<<< HEAD
                                        <div class="blog-text ">
                                            <h4><a href="{{route('new.newDetail',['slug'=>$data->slug])}}">{{$data->name}}</a></h4>
=======
                                        <div class="blog-text">
                                            <h4><a href="#">{{$data->name}}</a></h4>
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                                            <p>{!! $data->description !!}</p>
                                            <a href="{{route('new.newDetail',['slug'=>$data->slug])}}">Đọc tiếp <i class="ri-arrow-right-line"></i></a>
                                            <div class="blog-meta">
                                                <span> <i class="las la-calendar"></i> {{date_format($data->updated_at,'d/m/Y')}}</span>

                                            </div>
                                        </div>
                                    </div>

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
    <!-- Testimonial -->
<<<<<<< HEAD
    <div class="testimonial-area pb-100">
=======
    <div class="testimonial-area pt-100 pb-100">
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">{{@$page_content['client']['name']}}</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p>{{@$page_content['client']['description']}}</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
        <!-- Container -->
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-12">
                    <div class="testimonial-item-wrap-1 testimonial-carousel-1">
                        @if(!empty($bannerTeam))
                            @foreach($bannerTeam as $k => $v)
                                <div class="testimonial-item">
                                    <div class="testimonial-author">
<<<<<<< HEAD
                                        <img class="lazy" data-src="{{$v->picture}}" alt="small-avatar">
=======
                                        <img src="{{$v->picture}}" alt="small-avatar">
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                                        <h3 class="author__title">{{$v->title}}</h3>
                                        {{--                                <span class="author__meta">United States</span>--}}
                                    </div>
                                    <div class="testimonial-desc">
                                        <p class="testimonial__desc">
                                            {!! $v->description !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Testimonial -->
    <div class="modal fade" id="modalClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title-client" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
<<<<<<< HEAD
                <div class="modal-body appendIframe" style="padding: 2rem!important;">
=======
                <div class="modal-body appendIframe">
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalHomeSLider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Gửi thông tin</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAutoShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
<<<<<<< HEAD
                <div class="modal-header flex-wrap">
                    <h5 class="modal-title" id="exampleModalLabel">THẺ VIỆT KÍNH CHÀO QUÝ KHÁCH</h5>
                    <p class="w-100">Bạn vui lòng để lại thông tin liên hệ để được hưởng chính sách ưu đãi từ chúng tôi</p>
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
=======
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal khi vào trang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tên:</label>
<<<<<<< HEAD
                            <input type="text" name="name" class="form-control name" id="recipient-name" placeholder="Nhập tên của bạn...">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                            <input type="text" name="phone" class="form-control phone" id="recipient-name" placeholder="Nhập số điện thoại...">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" name="email" class="form-control email" id="recipient-name" placeholder="Nhập Email...">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Địa chỉ:</label>
                            <input type="text" name="address" class="form-control address" id="recipient-name" placeholder="Nhập địa chỉ...">
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            <label for="message-text" class="col-form-label">Message:</label>--}}
{{--                            <textarea name="content" class="form-control content" id="message-text"></textarea>--}}
{{--                        </div>--}}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng lại </button>
                        <button type="button" class="btn btn-primary btn-popupShow">Gửi thông tin

=======
                            <input type="text" name="name" class="form-control name" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                            <input type="text" name="phone" class="form-control phone" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" name="email" class="form-control email" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea name="content" class="form-control content" id="message-text"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-popupShow">Send message
                            {{--                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>--}}
                            {{--                        <span class="sr-only">Loading...</span>--}}
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                        </button>
                    </form>
                    <div class="success">

                    </div>
<<<<<<< HEAD
=======
                    {{--                <p class="alert-success p-10 mt-5">Lưu thông tin thành công</p>--}}
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                </div>

            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        $('.counterup').counterUp({
            delay: 20,
            time: 2000,
            offset: 100
        });


        $(document).ready(function () {
            let modal = $('.modalClient');

            modal.each(function () {
                let that = $(this);
                that.on('click', function () {
                    let id = that.attr('data-id');
                    $.ajax({
                        url: "{{route('ajaxClient')}}",
                        method: 'GET',
                        data: {
                            "_token":'{{csrf_token()}}',
                            "id": id
                        },
                        success: function (response) {
                            console.log('response',response)
                            if (response.success == true) {
                                let content = response.data.content;
                                let name = response.data.name;
                                $("#modalClient").find('.appendIframe').html(content);
                                $("#modalClient").find('.title-client').html(name);
                            }
                        }
                    });
                });

            });
            // $("#modalClient").on('hidden.bs.modal', function (e) {
            //     $(this).find('.appendIframe').html('')
            // });


        });
    </script>
@endsection
