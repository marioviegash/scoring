@extends('layout.master')

@section('title', 'Home - Scoring')

@section('style')

@endsection

@section('content')
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
    @include('shared.header')
    <!-- BEGIN CONTAINER -->
        <div class="page-container">
            @include('shared.sidebar')

            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>View Result</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> {{ Auth::user()->roles->name }}
                        <small>View Result</small>
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="row">
                                        @if(Auth::user()->roles->id === 3)
                                            @foreach($groups as $group)
                                                <div class="col-md-12 text-center">
                                                    {{-- Logo Group --}}
                                                    <img src="{{ asset('assets/logo/logo_event.png') }}" alt="" width="50">
                                                    <br>
                                                    Group Name
                                                </div>
                                                @foreach($group->amoebas as $amoeba)
                                                <div class="col-md-4 text-center portlet light bordered">
                                                    {{-- Profile Image--}}
                                                    <img src="{{ asset($amoeba->picture) }}" alt="" width="30">
                                                    <br>
                                                    {{$amoeba->user->name}}
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="easy-pie-chart">
                                                                <div class="number visits" data-percent="{{ (100/$amoeba->group->event->maximum_score*$amoeba->score) }}">
                                                                    <span>{{$amoeba->score}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    Total Score : {{$amoeba->score}}
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-6">
                                                            <span class="form-control">
                                                                {{$amoeba->criteria}}
                                                            </span>
                                                        </div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <div class="col-md-12 text-center">
                                                <div class="easy-pie-chart">
                                                    <h2>Your result is</h2>
                                                    <div class="number visits" data-percent="{{ (20*Auth::user()->amoeba->score) }}">
                                                        <span>{{Auth::user()->amoeba->score}}</span>
                                                    </div>
                                                    <h2>{{ Auth::user()->amoeba->criteria }}</h2>
                                                    <h3>Total Score : {{ Auth::user()->amoeba->score }}</h3>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script-plugin')
    <script src="{{ asset('template_admin/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
@endsection

@section('script')
    <script>
        window.onload = function () {
            $("canvas").css("width", "100px");
            $("canvas").css("height", "100px");
            $("canvas").css("top", "-10px");
            $("canvas").css("left", "-10px");
            console.log($("canvas"));
        }
    </script>
@endsection