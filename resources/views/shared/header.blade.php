<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="{{ asset('assets/logo/logo_scoring.png') }}" alt="logo" width="100" height="50"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                @include("shared.notification")
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <img alt="" class="img-circle" src="{{ Auth::user()->roles->id == 4 ? (Auth::user()->amoeba->picture == null ? asset('img/upload/profile/profile.png') : asset(Auth::user()->amoeba->picture)) : ( Auth::user()->roles->id == 3 ? ( Auth::user()->jury->picture == null ? asset('img/upload/profile/profile.png') : asset(Auth::user()->jury->picture)) : (Auth::user()->roles->id == 2 ? (Auth::user()->admin_amoeba->picture == null ? asset('img/upload/profile/profile.png') : asset(Auth::user()->admin_amoeba->picture)) : asset('img/upload/profile/profile.png'))) }}"/>
                        <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        @if(Auth::user()->roles->id != 1)
                            <li>
                                <a href="{{ url('profile') }}">
                                    <i class="icon-user"></i> My Profile
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ url('logout') }}">
                                <i class="icon-key"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="{{ url('logout') }}" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->