@extends("enduser.layout")

@section('content')
    <div class="banner-section position-relative">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col  -->
                <div class="col-md-12">
                    <div class="banner-content ">
                        <h3 class="title custome-title">{{$new->name}}</h3>

                    </div>
                </div>
                <!-- /col -->
                <!-- col -->

                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Breadcrumb -->
    @php
        $blogs = \App\Huongdan::where('status','active')->orderBy('order_no','asc')->latest()->paginate(9);

    @endphp
    <style>
        .banner-section .banner-content .custome-title{
            font-size: 40px;
        }
    </style>
    <div class="blog-area pt-120 pb-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-xl-8 col-lg-8 me-auto ms-auto">
                    <div class="blog-details white-bg">
                        <div class="blog-img">
                            <a href="#"><img width="100%" src="{{$new->picture}}" alt=""></a>
                        </div>
                        <div class="blog-wrapper mb-30">
                            <div class="blog-text">
                                <h4><a href="#">{{$new->name}}</a></h4>
                                <!-- <a href="blog-single.html">Read More <i class="las la-arrow-right"></i></a> -->
                                <div class="blog-meta mb-30">
                                    <span> <i class="las la-user"></i> Post By Admin</span>
                                    <span> <i class="las la-calendar"></i> {{date_format($new->updated_at,'d/m/Y')}}</span>
                                    <!-- <span> <i class="lar la-heart"></i> Comments (03)</span> -->
                                </div>
                                {!! $new->content !!}
                            </div>
                            <!-- row -->
                            <div class="row mt-50">
                                <!-- col -->
                                <div class="col-xl-8 col-lg-8 col-md-8 mb-15">

                                </div>
                                <!-- /col -->
                                <!-- col -->
                                <div class="col-xl-4 col-lg-4 col-md-4 mb-15">
                                    <div class="blog-share-icon text-start text-md-end">
                                        <span>Share: </span>
                                        <a href="#"><i class="lab la-facebook-f"></i></a>
                                        <a href="#"><i class="lab la-twitter"></i></a>
                                        <a href="#"><i class="lab la-instagram"></i></a>
                                        <a href="#"><i class="lab la-google-plus-g"></i></a>
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>
                            <!-- /row -->
                            <!-- row -->

                            <div class="row">
                                <!-- col -->
                                <div class="col-lg-8 col-md-12 mb-50">
                                    <div class="section-title">
                                        <h2 class="title">B??i vi???t n???i b???t</h2>
                                        <div class="title-bdr">
                                            <div class="left-bdr"></div>
                                            <div class="right-bdr"></div>
                                        </div>
                                        <p>You can see our clients feedback what you say?</p>
                                    </div>
                                </div>
                                <!-- /col -->
                            </div>

                            <div class="row">
                                <div class="news-carousel-detail testimonial-item-wrap-1">
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
                        </div>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>

@stop
