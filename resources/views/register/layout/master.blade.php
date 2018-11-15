<!DOCTYPE html>
<html>
<head>
    <title>Verification - Scoring</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{ asset('template_register/css/style.css') }}">
</head>
<body>
    <form id="msform">
        @yield('content')
    </form>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="{{ asset('template_register/js/index.js') }}"></script>
</body>
</html>
