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



<!-- /Cta -->
@include("enduser.components.footer")
<!-- Go top -->
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
<!-- /Go top -->
@include("enduser.components.script_footer")
</body>

</html>
