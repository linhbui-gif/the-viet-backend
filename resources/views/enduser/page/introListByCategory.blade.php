@extends("enduser.layout")

@section('content')
    <!-- Breadcrumb -->
    <div class="banner-section position-relative">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col  -->
                <div class="col-md-12">
                    <div class="banner-content">
                        <h3 class="title">{{$category->name}}</h3>
                        <p>{{$category->description??""}}</p>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <!-- /Breadcrumb -->

    <section class="blog-area pt-120 pb-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->

                @if(!empty($introduces))
                    @foreach($introduces as $k => $data)
                        <div class="col-xl-4 col-lg-4">
                            <div class="blog-wrapper mb-30 news-item">
                                <div class="blog-img">
                                    <a href="{{  route('introDetail',$data->slug) }}">
                                        <img width="100%" src="{{  $data->picture }}" alt="{{$data->name}}">
                                    </a>
                                    <p class="category-news">
                                        {{@$data->category->name}}
                                    </p>
                                </div>
                                <div class="blog-text">
                                    <h4><a href="{{  route('introDetail',$data->slug)  }}">{{$data->name}}</a></h4>
                                    <p>{!! $data->description !!}</p>
                                    <a href="{{  route('introDetail',$data->slug)  }}">Đọc tiếp <i class="ri-arrow-right-line"></i></a>
                                    <div class="blog-meta">
                                        <span> <i class="las la-calendar"></i> {{date_format($data->updated_at,'d/m/Y')}}</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{"Không tìm thấy dữ liệu phù hợp"}}
                @endif
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </section>
@stop
