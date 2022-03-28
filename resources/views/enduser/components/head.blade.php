<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="google-site-verification" content="CHyuN6P8flY4F8EgBnbdiWy5KIgJDNvkZTIGLj5dhPM" />
@yield('meta')
@yield('head')
@if(isset($_config))
    <link rel="shortcut icon" href="{{ $_config->favicon_url }}" />
@endif
<!-- Vendor Css -->
<link rel="stylesheet" href="{{ asset('enduser/theviet/css/vendors.css') }}">
<!-- /Vendor Css -->

<!-- Plugin Css -->
<link rel="stylesheet" href="{{ asset('enduser/theviet/css/plugins.css') }}">
<!-- Plugin Css -->

<!-- Icons Css -->
<link rel="stylesheet" href="{{ asset('enduser/theviet/css/icons.css') }}">
<!-- /Icons Css -->

<!-- Style Css -->
<link rel="stylesheet" href="{{ asset('enduser/theviet/css/style.css') }}">
@if(\Request::route()->getName() == 'siteAbout' ))
<link rel="stylesheet" href="{{ asset('enduser/theviet/css/timeline.css') }}">
@endif
<!-- /Style Css -->
@yield('css')

