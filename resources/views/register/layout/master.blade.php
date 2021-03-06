<!DOCTYPE html>
<html>
<head>
    <title>Verification - Scoring</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template_admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template_register/css/style.css') }}" rel="stylesheet" type="text/css"/ >
</head>
<body>
    @include('register.shared.header')
    <div id="msform">
        @yield('content')
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="{{ asset('template_register/js/index.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
