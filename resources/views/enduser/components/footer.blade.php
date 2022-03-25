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
                        @if(isset($footers['footer_block_4']))
                            @foreach($footers['footer_block_4'] as $v)
                                <h3 class="footer-title">{{@$v->name}}</h3>
                                <div class="subscribes-form">
                                    <form action="#">
                                        <input placeholder="Enter email " type="email">
                                        <button class="btn theme-btn-1 width-100 mt-10"><i
                                                class="lab la-telegram-plane me-2"></i>subscribe
                                        </button>
                                    </form>
                                </div>
                                <div class="footer-info">
                                    <p>   {!! @$v->content !!}</p>
                                </div>
                            @endforeach
                        @endif


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
