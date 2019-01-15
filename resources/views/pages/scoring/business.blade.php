@extends('layout.master')

@section('title', 'Home - Scoring')

@section('style')
    <style>
        a:hover{
            text-decoration: none;
        }

        .slidecontainer {
            width: 95%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px !important;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: black;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: black;
            cursor: pointer;
        }
    </style>
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
                                    <div class="portlet-body form">
                                        <h2 class="text-left"><b>Business Performance</b></h2>
                                        <h3>
                                            Total Score 360 Derajat OMS: 3.01
                                            <br>
                                            dengan rata-rata Batch 7 adalah 3.23
                                        </h3>
                                        <img src="{{ url('img/upload/group/graph-orbits.png') }}" alt="">
                                        <h3>
                                            Saya yakin bisnis founder memiliki
                                            <br>
                                            prospek yang bagus di masa depan
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8 portlet light bordered">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3 text-left">
                                                    Strongly <br>
                                                    Disagree
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-4 text-left">
                                                    Strongly <br>
                                                    Agree
                                                </div>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <div class="slidecontainer">
                                                        <input type="range" min="1" max="5" value="1" class="slider" id="myRange">
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <p class="form-control"><span id="demo"></span></p>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-element-step">
                                    <div class="row step-line">
                                        <div class="col-md-6 mt-step-col error" style="padding: 0;">
                                            <a href="{{ url('/scoring/description') }}" class="mt-step-number">
                                                <
                                            </a>
                                        </div>
                                        <div class="col-md-6 mt-step-col done" style="padding: 0;">
                                            <a href="{{ url('/scoring/people') }}" class="mt-step-number bg-white">
                                                >
                                            </a>
                                        </div>
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
    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
@endsection