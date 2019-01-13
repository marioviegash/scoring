@extends('layout.master')

@section('title', 'Home - Scoring')

@section('style')
    <link href="{{ asset('template_admin/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template_admin/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
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
                                <a href="index.html">Event</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="">Detail</a>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> Event Detail
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <img src="{{ asset('assets/logo/logo_event.png') }}" alt="No Image" width="180">
                                        </div>
                                        <div class="col-md-8">
                                            <h1><b>{{ $event->name }}</b></h1>
                                            <br>
                                            Start Date :
                                            <h5>{{ $event->start_date }} <span class="fa fa-calendar"></span></h5>
                                            <br>
                                            Event Date :
                                            <h5>{{ $event->end_date }} <span class="fa fa-calendar"></span></h5>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_1" data-toggle="tab"> Description </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="tab_1_1">
                                                    <p>
                                                        {{ $event->description }}
                                                    </p>
                                                    <div class="col-md-12 text-right">
                                                        <a href="">
                                                            <span class="fa fa-pencil-square-o" style="font-size: 20px;"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script src="{{ asset('template_admin/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template_admin/assets/pages/scripts/components-select2.min.js') }}" type="text/javascript"></script>
@endsection