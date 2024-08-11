
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social</title>


    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img')}}/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/OverlayScrollbars.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/choices.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/glightbox.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/dropzone.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/flatpickr.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/plyr.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/zuck.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css')}}/style.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

{{--    <script src="{{ mix('js/app.js') }}"></script>--}}

</head>

<body>

{{--Header START -->--}}
@include('.includes.header')


<!-- **************** MAIN CONTENT START **************** -->
<main class="">

    @yield('content')

</main>
<!-- **************** MAIN CONTENT END **************** -->
@include('.includes.footer')
<!-- Bootstrap JS -->
<script src="{{ asset('js')}}/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="{{ asset('js')}}/tiny-slider.js"></script>
<script src="{{ asset('js')}}/OverlayScrollbars.min.js"></script>
<script src="{{ asset('js')}}/choices.min.js"></script>
<script src="{{ asset('js')}}/glightbox.min.js"></script>
<script src="{{ asset('js')}}/flatpickr.min.js"></script>
<script src="{{ asset('js')}}/plyr.js"></script>
<script src="{{ asset('js')}}/dropzone.min.js"></script>
<script src="{{ asset('js')}}/zuck.min.js"></script>
<script src="{{ asset('js')}}/zuck-stories.js"></script>
<div id="zuck-modal" class="with-cube with-effects" tabindex="1" style="display: none;">
    <div id="zuck-modal-content"></div>
</div>

</body>
</html>
