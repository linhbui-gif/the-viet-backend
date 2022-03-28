@php
    $data = \App\Widget::select(['name','content','location','date'])->whereIn('location', ['block_area', 'footer_block_1', 'footer_block_2', 'footer_block_3', 'footer_block_4'])->orderBy('id', 'DESC')->get();
    $footers = [];
    foreach ($data as $v) {
        $footers[$v->location][] = $v;
    }

@endphp
<div class="cta-area">
    <!-- Container -->
    <div class="container">
        <!-- row -->
        <div class="row align-items-center">
            <!-- col -->
            <div class="col-lg-12">
                <div class="get-start-box">
                    <!-- col -->
                    <div class="col-lg-8">
                        <div class="section-heading">
                            @if(isset($footers['block_area']))
                                @foreach($footers['block_area'] as $v)
                                    <h5 class="section__meta text-white">{{@$v->name}}</h5>
                                    {!! @$v->content !!}
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /col -->
                    <!-- col -->
                    <div class="col-lg-4">
                        <div class="button-shared text-end">
                            <a href="/lien-he" class="btn cta-btn">
                                Liên hệ <span class="la la-caret-right"></span>
                            </a>
                        </div>
                    </div>
                    <!-- /col -->
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /Container -->
</div>
<!-- Footer -->
<footer class="footer-style bg-gray-100 pt-200">
    <!-- Container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="footer-logo">
                    <a href="/"><img src="{{asset('enduser/theviet/images/logo-2.png')}}" alt=""></a>
                </div>
            </div>

            <!-- col -->
        </div>
        <!-- /row -->
        <div class="footer-middle-area mt-30 pb-30 pt-60">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        @if(isset($footers['footer_block_1']))
                            @foreach($footers['footer_block_1'] as $v)
                                <h3 class="footer-title">{{@$v->name}}</h3>
                                <div class="footer-text">
                                    <ul>
                                        {!! @$v->content !!}
                                    </ul>
                                </div>

                            @endforeach
                        @endif
                        <div class="footer-icon">
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-instagram-alt"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        @if(isset($footers['footer_block_2']))
                            @foreach($footers['footer_block_2'] as $v)
                                <h3 class="footer-title">{{@$v->name}}</h3>
                                <div class="footer-link">
                                    <ul>
                                        {!! @$v->content !!}
                                    </ul>
                                </div>

                            @endforeach
                        @endif


                        <div></div>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        @if(isset($footers['footer_block_3']))
                            @foreach($footers['footer_block_3'] as $v)
                                <h3 class="footer-title">{{@$v->name}}</h3>
                                <div class="footer-link">
                                    <ul>
                                        {!! @$v->content !!}
                                    </ul>
                                </div>

                            @endforeach
                        @endif

                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8475322176305!2d105.7958798153318!3d20.99874799417722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acbea41f6d03%3A0xaa70863c42d9a0e4!2zMTY0IEtodeG6pXQgRHV5IFRp4bq_biwgTmjDom4gQ2jDrW5oLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1648446797098!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="fb-page" data-href="https://www.facebook.com/Th%E1%BA%BB-Vi%E1%BB%87t-100307918989079" data-tabs="timeline" data-width="" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Th%E1%BA%BB-Vi%E1%BB%87t-100307918989079" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Th%E1%BA%BB-Vi%E1%BB%87t-100307918989079">Thẻ Việt</a></blockquote></div>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        {{--        <div class="footer-bottom-area pt-25 pb-25">--}}
        {{--            <!-- row -->--}}
        {{--            <div class="row">--}}
        {{--                <!-- col -->--}}
        {{--                <div class="col-xl-6 col-lg-6 col-md-6">--}}
        {{--                    <div class="copyright">--}}
        {{--                        <p>© Copyrights 2021 <a href="#">.</a> All rights reserved.</p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- col -->--}}
        {{--                <!-- /col -->--}}
        {{--                <div class="col-xl-6 col-lg-6 col-md-6">--}}
        {{--                    <div class="footer-bottom-link text-end">--}}
        {{--                        <ul>--}}
        {{--                            <li><a href="#">Privacy </a></li>--}}
        {{--                            <li><a href="#"> Terms</a></li>--}}
        {{--                            <li><a href="#">Sitemap</a></li>--}}
        {{--                            <li><a href="#">Help </a></li>--}}
        {{--                        </ul>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- /col -->--}}
        {{--            </div>--}}
        {{--            <!-- /row -->--}}
        {{--        </div>--}}
    </div>
    <!-- /Container -->
</footer>
<!-- /Footer -->
<div class="fix_tel">
    <div class="ring-alo-phone ring-alo-green ring-alo-show" id="ring-alo-phoneIcon" style="right: 150px; bottom: -12px;">
        <div class="ring-alo-ph-circle"></div>
        <div class="ring-alo-ph-circle-fill"></div>
        <div class="ring-alo-ph-img-circle">

            <a href="tel:0904506621"><img src="https://khomaythegioi.com/icon/goi.png" alt="G"></a>

        </div>
    </div>
    <div class="tel">
        <a href="tel:0946673322"><p class="fone">Bấm để gọi ngay</p></a>
    </div>
</div>
<style>
    /*them nut call*/

    .fone {
        font-size: 19px; /* chữ cạnh nút gọi */
        color: #f00;
        line-height: 40px;
        font-weight: bold;
        padding-left: 48px; /* cách bên trái cho chữ */
        margin: 0 0;
    }
    .fix_tel {     position: fixed;
        bottom: 13%;
        right: 0;
        z-index: 999;} /* left 18px là cách bên trái 18px. nếu muốn cho nút gọi sang phải thay là right */
    .fix_tel a {text-decoration: none; display:block;}
    .tel { background: #eee;width:205px; height:40px; position:relative; overflow:hidden;background-size:40px;border-radius:28px;border:none}
    .ring-alo-phone {
        background-color: transparent;
        cursor: pointer;
        height: 80px;
        position: absolute;
        transition: visibility 0.5s ease 0s;
        visibility: hidden;
        width: 80px;
        z-index: 200000 !important;
    }
    .ring-alo-phone.ring-alo-show {
        visibility: visible;
    }
    .ring-alo-phone.ring-alo-hover, .ring-alo-phone:hover {
        opacity: 1;
    }
    .ring-alo-ph-circle {
        animation: 1.2s ease-in-out 0s normal none infinite running ring-alo-circle-anim;
        background-color: transparent;
        border: 2px solid rgba(30, 30, 30, 0.4);
        border-radius: 100%;
        height: 70px;
        right: 0;
        opacity: 0.1;
        position: absolute;
        top: 12px;
        transform-origin: 50% 50% 0;
        transition: all 0.5s ease 0s;
        width: 70px;
    }
    .ring-alo-phone.ring-alo-active .ring-alo-ph-circle {
        animation: 1.1s ease-in-out 0s normal none infinite running ring-alo-circle-anim !important;
    }
    .ring-alo-phone.ring-alo-static .ring-alo-ph-circle {
        animation: 2.2s ease-in-out 0s normal none infinite running ring-alo-circle-anim !important;
    }
    .ring-alo-phone.ring-alo-hover .ring-alo-ph-circle, .ring-alo-phone:hover .ring-alo-ph-circle {
        border-color: #009900;
        opacity: 0.5;
    }
    .ring-alo-phone.ring-alo-green.ring-alo-hover .ring-alo-ph-circle, .ring-alo-phone.ring-alo-green:hover .ring-alo-ph-circle {
        border-color: #baf5a7;
        opacity: 0.5;
    }
    .ring-alo-phone.ring-alo-green .ring-alo-ph-circle {
        border-color: #009900;
        opacity: 0.5;
    }
    .ring-alo-ph-circle-fill {
        animation: 2.3s ease-in-out 0s normal none infinite running ring-alo-circle-fill-anim;
        background-color: #000;
        border: 2px solid transparent;
        border-radius: 100%;
        height: 30px;
        left: 30px;
        opacity: 0.1;
        position: absolute;
        top: 33px;
        transform-origin: 50% 50% 0;
        transition: all 0.5s ease 0s;
        width: 30px;
    }
    .ring-alo-phone.ring-alo-hover .ring-alo-ph-circle-fill, .ring-alo-phone:hover .ring-alo-ph-circle-fill {
        background-color: rgba(0, 175, 242, 0.5);
        opacity: 0.75 !important;
    }
    .ring-alo-phone.ring-alo-green.ring-alo-hover .ring-alo-ph-circle-fill, .ring-alo-phone.ring-alo-green:hover .ring-alo-ph-circle-fill {
        background-color: rgba(117, 235, 80, 0.5);
        opacity: 0.75 !important;
    }
    .ring-alo-phone.ring-alo-green .ring-alo-ph-circle-fill {
        background-color: rgba(0, 175, 242, 0.5);
        opacity: 0.75 !important;
    }



    .ring-alo-ph-img-circle {
        animation: 1s ease-in-out 0s normal none infinite running ring-alo-circle-img-anim;
        border: 2px solid transparent;
        border-radius: 100%;
        height: 30px;
        left: 30px;
        opacity: 1;
        position: absolute;
        top: 33px;
        transform-origin: 50% 50% 0;
        width: 30px;
    }

    .ring-alo-phone.ring-alo-hover .ring-alo-ph-img-circle, .ring-alo-phone:hover .ring-alo-ph-img-circle {
        background-color: #009900;
    }
    .ring-alo-phone.ring-alo-green.ring-alo-hover .ring-alo-ph-img-circle, .ring-alo-phone.ring-alo-green:hover .ring-alo-ph-img-circle {
        background-color: #75eb50;
    }
    .ring-alo-phone.ring-alo-green .ring-alo-ph-img-circle {
        background-color: #009900;
    }
    .ring-alo-ph-img-circle a img {
        padding: 1px 0 12px 1px;
        width: 30px;
        position: relative;
        top: -1px;
    }
    @keyframes ring-alo-circle-anim {
        0% {
            opacity: 0.1;
            transform: rotate(0deg) scale(0.5) skew(1deg);
        }
        30% {
            opacity: 0.5;
            transform: rotate(0deg) scale(0.7) skew(1deg);
        }
        100% {
            opacity: 0.6;
            transform: rotate(0deg) scale(1) skew(1deg);
        }
    }



    @keyframes ring-alo-circle-img-anim {
        0% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }
        10% {
            transform: rotate(-25deg) scale(1) skew(1deg);
        }
        20% {
            transform: rotate(25deg) scale(1) skew(1deg);
        }
        30% {
            transform: rotate(-25deg) scale(1) skew(1deg);
        }
        40% {
            transform: rotate(25deg) scale(1) skew(1deg);
        }
        50% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }
        100% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }
    }
    @keyframes ring-alo-circle-fill-anim {
        0% {
            opacity: 0.2;
            transform: rotate(0deg) scale(0.7) skew(1deg);
        }
        50% {
            opacity: 0.2;
            transform: rotate(0deg) scale(1) skew(1deg);
        }
        100% {
            opacity: 0.2;
            transform: rotate(0deg) scale(0.7) skew(1deg);
        }
    }
    }
</style>
