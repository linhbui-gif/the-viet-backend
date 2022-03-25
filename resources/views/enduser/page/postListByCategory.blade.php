@extends("enduser.layout")

@section('content')
    @include('enduser.page.components.brebcrumb',['title' => $category->name])
    <section class="blog-area pt-120 pb-100">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->

                @if(!empty($blogs))
                    @foreach($blogs as $k => $blog)
                        <div class="col-xl-4 col-lg-4">
                            @include('enduser.page.components.cardComponent',['data' => $blog,'isblog' => true] )
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
