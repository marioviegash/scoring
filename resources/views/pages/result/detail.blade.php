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
                                        <div class="col-md-12 text-center">
                                            {{-- Logo Group --}}
                                            <img src="{{ asset('assets/logo/logo_event.png') }}" alt="" width="50">
                                            <br>
                                            Group Name
                                        </div>
                                        {{-- Loop Result --}}
                                        <div class="col-md-4 text-center portlet light bordered">
                                            {{-- Profile Image--}}
                                            <img src="{{ asset('assets/logo/logo_event.png') }}" alt="" width="30">
                                            <br>
                                            Username
                                            <br>
                                            Diagram Ntar
                                            <br>
                                            Total Score : 3.0
                                            <br>
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <span class="form-control">Innovator A</span>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                        </div>
                                        {{-- End Loop --}}
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

@section('script')

@endsection