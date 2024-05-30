<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'rooocx') }}</title>
<meta name="google-site-verification" content="kk5Fdpx355TSI9qMxCMUXQ9bBhFZu0DveMlcV-H1Qzk" />
<meta name="description" content="nozha admin panel fully support rtl with complete dark mode css to use. ">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" sizes="180x180" href="https://roocx.com/logo.PNG">
<link rel="icon" type="image/png" sizes="32x32" href="https://roocx.com/logo.PNG">
<link rel="icon" type="image/png" sizes="16x16" href="https://roocx.com/logo.PNG">
<link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">
<link rel="mask-icon" href="https://roocx.com/logo.PNG" color="#5bbad5">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
<link href="{{ asset('assets/css/fontawsome/all.min.css') }}" rel="stylesheet">
<link rel="stylesheet"
href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

<style>
     .image-table{
          width: 50px;
    border-radius: 10px;
     }
</style>
</head>
<body>
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
@include('layouts.header')
@include('layouts.navigation')



<!-- Page Content -->
<main class="bmd-layout-content">
<div class="container-fluid ">
{{ $slot }}
</div>
</main>

</div>


<script src="{{ asset('assets/js/vendor/modernizr.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
window.jQuery || document.write('<script src="{{ asset('assets/js/vendor/jquery-3.2.1.min.js') }}"><\/script>')
</script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
</script>
<script>
$(document).ready(function () {
$('body').bootstrapMaterialDesign();
});
</script>
<script>
! function (d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (!d.getElementById(id)) {
js = d.createElement(s);
js.id = id;
js.src = 'https://weatherwidget.io/js/widget.min.js';
fjs.parentNode.insertBefore(js, fjs);
}
}(document, 'script', 'weatherwidget-io-js');
</script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
