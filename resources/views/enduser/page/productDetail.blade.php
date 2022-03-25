@extends("enduser.layout")

@section('meta')
    @include("enduser.meta",[
        'title' => $product->meta_title,
        'description' => $product->meta_description,
        'link' => route('product.productDetail',  [ 'slug_category' => isset($product->category) ? $product->category->slug : "chua-ro", 'slug' => $product->slug ] ),
        'img' => $product->url_picture
    ])

@stop
<?php
//    dd($product);
//?>
@section('content')

    <!--blog body area start-->
    <div class="blog_details_bg">
        <div class="container">
            <div class="blog_details">
                <div class="blog_wrapper_details">
                    <div class="row">
                        <div class="col-12">
                            <!--breadcrumbs area start-->
                            <div class="breadcrumbs_area bread_blog_details mb-96">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="breadcrumb_content text-center">
                                            <h2>{{ mb_strtoupper($product->name) }}</h2>
                                            <ul>
                                                <li><a href="/">Trang chủ / </a></li>
                                                <li><a href="/">Chi tiết sản phẩm /</a></li>
                                                <li><span>{{ mb_strtoupper($product->name) }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--breadcrumbs area end-->
                            <div class="blog_details_content">
{{--                                <div class="meta_post_img">--}}
{{--                                    <img src="{{  \App\Helper\Common::showThumb('product_products', $product->url_picture ) }}" alt="">--}}
{{--                                </div>--}}
                                <div
                                    class="post_header border-bottom d-flex justify-content-between align-items-center">
{{--                                    <div class="blog_meta_post d-flex align-items-center">--}}
{{--                                        <div class="meta_post_img">--}}
{{--                                            <img src="{{  \App\Helper\Common::showThumb('product_products', $product->url_picture ) }}" alt="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="blog_details_meta d-flex">
                                        <div class="meta_post_text">
                                            <h3>Date</h3>
                                            <span>{{$product->updated_at->format('d/m/Y')}}</span>
                                        </div>
                                        <div class="meta_post_text">
                                            <h3>Category</h3>
                                            <span>{{@$product->category->name}}</span>
                                        </div>
{{--                                        <div class="meta_post_text">--}}
{{--                                            <h3>Tags</h3>--}}
{{--                                            <span>Design, Web, Lifestyle, Site</span>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="blog_details_desc">
                                    {!! $product->content !!}
                                </div>
                                <div
                                    class="post__social blog__post__social border-bottom  d-flex justify-content-center align-items-center">
                                    <span>SHARE :</span>
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="ei ei-social_twitter"></i></a></li>
                                        <li><a href="#"><i class="ei ei-social_facebook"></i></a></li>
                                        <li><a href="#"><i class="ei ei-social_googleplus"></i></a></li>
                                        <li><a href="#"><i class="ei ei-social_instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="related_posts border-bottom">
                                <div class="section_title text-center">
                                    <h2>Related <span>Product</span></h2>
                                </div>
                                <div class="blog_container-2 swiper-container">
                                    <div class=" blog_slick slick_slider_activation swiper-wrapper">
                                        @include("enduser.components.product_featured")

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

@section('script')

    <script>
        $(".rating-action img.star").hover(function() {
            var star = $(".rating-action img.star");
            var current = $(this);
            var num = current.data('num');
            resetStar(star);
            if(current.hasClass("active")){
                current.removeClass('active');
            }else{
                $.each(star,function(i,e){
                    if(i < num){
                        $(e).addClass("active");
                    }
                });
            }
            syncStar();
        }, function() {

        });
        syncStar();
        function resetStar(star){
            $.each(star,function(i,e){
                $(e).removeClass("active");
            });
        }
        function syncStar(){
            $(".rating-action img.star").prop('src', '{{ asset('enduser/assets/icons/icon-star-yellow.svg') }}');
            $(".rating-action img.star.active").prop('src', '{{ asset('enduser/assets/icons/icon-star-fill-yellow.svg') }}');
        }
        function submitFormComment(t){
            var numStar = $(".rating-action img.star.active").length;
            $("#frmComment input[name='star']").val(numStar);
            $("#frmComment").submit();
        }
        function like(t, like, comment_id){
            var parent = $(t).parent(".comment-action");
            parent.find("input[name='like']").val(like);
            parent.find("input[name='comment_id']").val(comment_id);
            parent.find('form').submit();
        }
        $(".course-option-item").click(function(){
            $(this).parent(".course-options").find(".course-option-item").removeClass("active");
            $(this).addClass("active");
            var id = $(this).data("id");
            $("input[name='compo_id']").val(id);
            var price = $(this).find("input[name='price_custom']").val();
            $(".section-course-detail-wrapper .course-price").text(price + " đ");
        });
    </script>
    <script>
        $(".upload input[type=file]").change(function(){
            readURL(this);
        });

        function readURL(input) {
            var inputObj = $(input);
            // inputObj.parents(".file_picture").children(".image-upload").remove();

            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    var src = e.target.result;
                    var htmlImage = '<div class="upload-item"> <img class="item-image" data-src="'+src+'" alt=""><img onclick="deteleThumb(this)" class="item-delete " src="/enduser/assets/icons/icon-close-circle.svg" alt=""></div>';
                    $("#show-thumb-upload").html(htmlImage);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function deteleThumb(t){
            var tObj = $(t);
            tObj.parents(".upload-item").remove();
            $(".upload input[type=file]").val('');
        }
    </script>
    @if($errors->any('body'))
        <script>
            toastr.error('Nội dung đánh giá không được rỗng', 'Thất bại');
        </script>
    @endif
@stop
