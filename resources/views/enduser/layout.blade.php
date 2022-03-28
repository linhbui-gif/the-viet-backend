<!DOCTYPE html>
<html>
<head>
    @include("enduser.components.head")
</head>
<body>
<!-- PreLoader -->
{{--<div id="preloader">--}}
{{--    <div id="status">--}}
{{--        <div class="spinner"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--Preloader-->
@include("enduser.components.header_desktop")
@yield('content')
<style>
    {!! $_config->custom_css !!}

</style>
<!-- Cta -->

<<<<<<< HEAD
<div id="fb-root"></div>
=======

>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76

<!-- /Cta -->
@include("enduser.components.footer")
<!-- Go top -->
<<<<<<< HEAD
<div class="messenger" style="    width: 60px;
    position: fixed;
    right: 30px;
    bottom: 19%;
    z-index: 9999;">
    <a href="https://www.messenger.com/t/100307918989079/?messaging_source=source%3Apages%3Amessage_shortlink">
        <i class="lab la-facebook-messenger" style="font-size: 80px;
    color: #0d6efd;"></i>
    </a>
</div>


=======
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
<div class="go-top-area">
    <div class="go-top-wrap">
        <div class="go-top-btn-wrap">
            <div class="go-top go-top-btn">
                <i class="las la-angle-double-up"></i>
                <i class="las la-angle-double-up"></i>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
<style>
    .custom-style h4 {
        font-size: 20px;
        white-space: normal;
        word-break: unset;
        height: 81px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        display: -moz-box;
        display: box;
        -webkit-line-clamp: 2;
        -moz-line-clamp: 2;
        -line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .custom-style p {
        white-space: normal;
        word-break: unset;
        height: 86px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        display: -moz-box;
        display: box;
        -webkit-line-clamp: 3;
        -moz-line-clamp: 3;
        -line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .custom-style img {
        height: 300px;
        object-fit: cover;
    }

    /*.modal-body{*/
    /*    padding: 2rem!important;*/
    /*}*/
</style>
<!-- /Go top -->
@include("enduser.components.script_footer")

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0"
        nonce="NeJWATSq"></script>

=======
<!-- /Go top -->
@include("enduser.components.script_footer")
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
</body>

</html>
