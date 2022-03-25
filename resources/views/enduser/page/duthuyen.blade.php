@extends("enduser.layout")
@section('head')
    @php
        $locale = app()->getLocale();

        if($locale == "vi") {
            $page_content = unserialize($page->content);
        }
        else{
             $page_content = unserialize($page->content_ko);
        }
    @endphp
@stop
@section('content')

    <!-- Hero image starts here -->
    <section class="hero-yachts">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-text">
                            <h5>{{@$page_content['duthuyeen']['name']}}</h5>
                            <p>{{@$page_content['duthuyeen']['description']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero image ends here -->
    <?php
    $product = \App\Product_products::where('status','active')->first();
    $galleries = json_decode($product->gallery,true);
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="title">
                                <h2>{{$product->name}}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($galleries as $k => $ga)
                    <div class="col-lg-3 col-md-6 col-sm-6 gall-img">
                        <a class="moto" href="{{ $ga }}">
                            <img class="img-fluid" src="{{ $ga }}" alt="">
                            <div class="zoom"><img src="{{asset('enduser/aliga/images/icon_zoom.svg')}}" alt=""></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
