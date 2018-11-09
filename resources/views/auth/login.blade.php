@extends('layout.master')

@section('title', 'Login - Scoring')

@section('style')
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('template/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('template/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('template/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('template/pages/css/login.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
@endsection


@section('content')
    <body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
            <img src="{{ asset('template/pages/img/logo-big.png') }}" alt="" /> </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ route('login') }}" method="post">
            {{csrf_field()}}
            <h3 class="form-title font-green">Sign In</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any username and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">Login</button>
                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1" />Remember
                    <span></span>
                </label>
                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
            <div class="login-options">
                <h4>Or login with</h4>
                <ul class="social-icons">
                    <li>
                        <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                    </li>
                </ul>
            </div>
            <div class="create-account">
                <p>
                    <a href="register">Create an account</a>
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="index.html" method="post">
            <h3 class="font-green">Forget Password ?</h3>
            <p> Enter your e-mail address below to reset your password. </p>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    <div class="copyright"> 2014 © Metronic. Admin Dashboard Template. </div>
    </body>
@endsection

@section('script')
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('template/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('template/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('template/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('template/pages/scripts/login.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
    <script>
        $(document).ready(function()
        {
            $('#clickmewow').click(function()
            {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>
@endsection
