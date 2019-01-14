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
                                <span>Scoring</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> Scoring
                        <small>Sidang Komite 2</small>
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="mt-element-step">
                                        <div class="row step-line">
                                            <div class="col-md-4 mt-step-col first done" style="padding: 0;">
                                                <div class="mt-step-number bg-white">
                                                    1
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                <div class="mt-step-content uppercase font-grey-cascade">Team Description</div>
                                            </div>
                                            <div class="col-md-4 mt-step-col active" style="padding: 0;">
                                                <div class="mt-step-number bg-white">
                                                    2
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                <div class="mt-step-content uppercase font-grey-cascade">Business Performance</div>
                                            </div>
                                            <div class="col-md-4 mt-step-col last" style="padding: 0;">
                                                <div class="mt-step-number bg-white">
                                                    3
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                <div class="mt-step-content uppercase font-grey-cascade">People Performance</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <form action="{{ url('/scoring/people') }}">
                                <div class="portlet light bordered">
                                    <div class="portlet-body">
                                        <h2 class="text-left"><b>Business Performance</b></h2>
                                        <h4>
                                            Total Score 360 Derajat OMS: 3.01
                                            <br>
                                            dengan rata-rata Batch 7 adalah 3.23
                                        </h4>
                                        <br>
                                        <br>
                                        <h4>
                                            Saya yakin bisnis founder memiliki
                                            <br>
                                            prospek yang bagus di masa depan
                                        </h4>
                                    </div>
                                </div>
                            </form>
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