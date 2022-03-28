@extends("enduser.layout")
@section('className')
    navbar-style-two
@endsection
@section('meta')
    @include("enduser.meta",[
    'title' => $_config->meta_title,
    'description' => $_config->meta_description,
    'link' => route('sitePartner'),
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
        $bannerStep = \App\Helper\Common::getFromCache('banner_ctv_step');
        $bannerProgram = \App\Helper\Common::getFromCache('banner_ctv_program');
        $bannerLoi_ich = \App\Helper\Common::getFromCache('banner_ctv_loi_ich');
        if(!$bannerStep) {
          $bannerStep = \App\Banner::where('type',0)->where('status','active')->where('location','banner_step')->orderBy('order_no','asc')->get();
          \App\Helper\Common::putToCache('banner_ctv_step',$bannerStep);
        }
        if(!$bannerProgram) {
          $bannerProgram = \App\Banner::where('type',1)->where('status','active')->where('location','banner_program')->orderBy('order_no','asc')->get();
          \App\Helper\Common::putToCache('banner_ctv_program',$bannerProgram);
        }
        if(!$bannerLoi_ich) {
          $bannerLoi_ich = \App\Banner::where('type',0)->where('status','active')->where('location','banner_loi_ich')->first();
          \App\Helper\Common::putToCache('banner_ctv_loi_ich',$bannerLoi_ich);
        }
    @endphp

    <div class="hero-2">
        <div class="hero-2-item" style="background-image: url({{asset('images/page/'.@$page_content['banner_ctv']['picture'])}})">
            <!-- Container -->
            <div class="container">
                <!-- row -->
                <div class="row align-items-center">
                    <!-- col -->
                    <div class="col-lg-6">
                        <div class="hero-2-content">
{{--                            <h1>{{@$page_content['ctv']['name']}}</h1>--}}
{{--                             <p>{{@$page_content['ctv']['description']}}</p>--}}
{{--                            <div class="hero-btn">--}}
{{--                                <a href="{{@$page_content['ctv']['button_link']}}" class="btn theme-btn-1">{{@$page_content['ctv']['button_name']}}<i class="las la-angle-right"></i></a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <!-- /col -->
                    <!-- col -->
                    <div class="col-lg-6">
                        <div class="hero-2-form">
                            <div class="content">
                                <h3>Trở thành cộng tác viên / Đại lý của Thẻ Việt</h3>
                            </div>

                            <form id="partner-form">
                                <!-- row -->
                                <div class="row">

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Họ và tên</label>
                                            <input type="text" class="form-control name" placeholder="Username">
                                        </div>
                                    </div>
                                    <!-- /col -->
                                    <!-- col -->
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control phone" placeholder="Phone...">
                                        </div>
                                    </div>
                                    <!-- /col -->
                                    <!-- col -->
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control email" placeholder="Email">
                                        </div>
                                    </div>
                                    <!-- /col -->
                                    <!-- col -->
                                    <div class="col-md-12">
                                        <div class="hero-form-btn">
                                            <button type="button" class="btn theme-btn-1 width-100 btn-partner">
                                                Đăng Ký Ngay
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /col -->
                                </div>
                                <div class="success">

                                </div>
                                <!-- /row -->
                            </form>
                        </div>
                    </div>
                    <!-- /col -->
                </div>
                <!-- /row -->
            </div>
            <!-- /Container -->
        </div>
    </div>
    <!-- Download -->
    <div class="download-area">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row align-items-center justify-content-between">
                <!-- col -->
                <div class="col-xl-7 col-lg-6 col-md-6">
                    <div class="download-1-content mt-50">

{{--                        <h2 class=" wow fadeInUp animated">{{->name}}</h2>--}}
{{--                        <ul>--}}
{{--                            <li class="wow fadeInUp animated" data-wow-delay="0.2s"><i class="la la-check"></i>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>--}}
{{--                            <li class="wow fadeInUp animated" data-wow-delay="0.4s"><i class="la la-check"></i>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>--}}
{{--                            <li class="wow fadeInUp animated" data-wow-delay="0.6s"><i class="la la-check"></i>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>--}}
{{--                            <li class="wow fadeInUp animated" data-wow-delay="0.6s"><i class="la la-check"></i>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>--}}
{{--                        </ul>--}}
                        <!-- <div class="mt-4 wow fadeInUp animated" data-wow-delay="0.6s">
                            <a href="#" class="btn theme-btn-1">
                                <img src="images/svg/android.svg" alt="">
                            </a>
                            <a href="#" class="btn theme-btn-1">
                                <img src="images/svg/apple.svg" alt="">
                            </a>
                        </div> -->
                            <h2 class=" wow fadeInUp animated">{{$bannerLoi_ich->name}}</h2>
                            {!! $bannerLoi_ich->description !!}
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="download-1-img">
                        <img class=" img-fluid" src="{{ $bannerLoi_ich->picture}}" alt="">
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Download -->

    <!-- Services -->
    <div class="services-area pt-120 pb-70">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">4 Bước Tham Gia Đăng Ký</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p>Các bước đăng ký để trở thành CTV/Đại lý của Thẻ Việt</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
            <!-- row -->
            <div class="row">
                <!-- col -->
                @if(!empty($bannerStep))
                    @foreach($bannerStep as $k => $v)
                <div class="col-lg-3 col-md-6">
                    <div class="single-services">
                        <div class="image">
                            <a href="{{$v->link}}">
                                <img src="{{$v->picture}}" alt="image">
                            </a>
                        </div>
                        <h3>
                            <a href="{{$v->link}}">{{$v->name}}</a>
                        </h3>
                        <p>{!! $v->description !!}</p>
{{--                        <a href="#" class="services-btn">Read More <i class="las la-angle-right"></i></a>--}}
                    </div>
                </div>
                @endforeach
            @endif
                <!-- /col -->

            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Services  -->


    <!-- Team -->
    <div class="team-style">
        <!-- Container -->
        <div class="container">
            <!-- row -->

            <div class="row justify-content-center text-center">
                <!-- col -->
                <div class="col-lg-8 col-md-12 mb-50">
                    <div class="section-title">
                        <h2 class="title">{{@$page_content['ctv_ct']['name']}}</h2>
                        <div class="title-bdr">
                            <div class="left-bdr"></div>
                            <div class="right-bdr"></div>
                        </div>
                        <p>{{@$page_content['ctv_ct']['description']}}</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="ct-carousel testimonial-item-wrap-1">
                    @if(!empty($bannerProgram))
                        @foreach($bannerProgram as $k => $v)
                    <div class="news-item">
                        <div class="col-lg-12 team-block">
                            <div class="team-block-3">
                                <div class="image-holder">
                                    <figure class="image-box"><img src="{{ $v->picture}}" alt="{{ $v->name}}"></figure>
{{--                                    <ul class="social-list">--}}
{{--                                        <li><a href="#"><i class="ri-facebook-fill"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="ri-dribbble-fill"></i></a></li>--}}
{{--                                    </ul>--}}
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{$v->link}}">{{$v->name}}</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /col -->
                    </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Team -->
@stop
@section('script')
    <script>
        $(document).ready(function () {

            let buttonSubmit = $('.btn-partner');
            let modalShow = $('#partner-form');
            buttonSubmit.on('click', function (e) {
                console.log('e', e);
                e.preventDefault();
                $.ajax({
                    url: "{{route('ajaxPartner')}}",
                    method: 'POST',
                    data: {
                        "_token": '{{csrf_token()}}',
                        "name": modalShow.find('.name').val(),
                        "phone": modalShow.find('.phone').val(),
                        "email": modalShow.find('.email').val(),
                        // "content": modalShow.find('.content').val()
                    },
                    beforeSend: function () {
                        modalShow.find('.btn-partner').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>`);
                    },
                    success: function (response) {
                        if (response.success == true) {
                            modalShow.find('.btn-partner').html('Send message');
                            modalShow.find('.success').html(`<p class="alert-success p-10 mt-5">Gửi thông tin thành công,Hãy kiểm tra Email của bạn !!</p>`);
                            resetForm();
                        }
                    }
                });

            });

            function resetForm() {
                modalShow.find('.name').val('');
                modalShow.find('.phone').val('');
                modalShow.find('.email').val('');
                modalShow.find('.content').val('');
            }

        });
    </script>
@endsection
