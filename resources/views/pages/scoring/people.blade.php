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
                                            <div class="col-md-4 mt-step-col done" style="padding: 0;">
                                                <div class="mt-step-number bg-white">
                                                    2
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                <div class="mt-step-content uppercase font-grey-cascade">Business Performance</div>
                                            </div>
                                            <div class="col-md-4 mt-step-col last active" style="padding: 0;">
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

                        <form action="{{ url('/scoring') }}" method="post">
                            <div class="col-md-12 text-center">
                                <div class="portlet light bordered">
                                    <div class="portlet-body form">
                                        <h2 class="text-left"><b>People Performance</b></h2>
                                        <div class="row">
                                            {{-- Loop Data --}}
                                            @foreach($amoebas as $amoeba)
                                            <div class="col-md-6 portlet light bordered">
                                                <div class="col-md-12">
                                                    <img src="{{ asset('/'.$amoeba->graph->path) }}" alt="No Image" width="400" height="250">
                                                </div>
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
                                                        <input type="range" min="1" max="5" value="1" class="slider data-slider" id="myRange_1"
                                                    name="scores[{{$amoeba->id}}]">
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <p class="form-control"><span id="demo_1"></span></p>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            @endforeach
                                            {{-- End Loop --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="portlet light bordered">
                                    <div class="portlet-body form">
                                        <h2><b>Criteria</b></h2>
                                        <div class="row">
                                            {{-- Loop Criteria --}}
                                            <div class="col-md-6" style="border-right: 2px solid black;">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-6 text-justify">
                                                    <b>Employee (0 - 2)</b> <br>
                                                    @foreach($event->employees as $criteria)
                                                    - {{$criteria->description}} <br>
                                                    @endforeach
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-6 text-justify">
                                                    <b>Innovator (3 - 5)</b> <br>
                                                    @foreach($event->innovators as $innovator)
                                                    - {{$innovator->description}} <br>
                                                    @endforeach
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                            {{-- End Loop --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="mt-element-step">
                                    <div class="row step-line">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3 mt-step-col" style="padding: 0;">
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                        </div>
                                        <div class="col-md-3 mt-step-col" style="padding: 0;">
                                            <button type="submit" class="btn green-meadow">Submit</button>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        // Loop Data
        var slider_1 = document.getElementById("myRange_1");
        var output_1 = document.getElementById("demo_1");
        output_1.innerHTML = slider_1.value;

        slider_1.oninput = function(){
            output_1.innerHTML = this.value;
        };

        var slider_2 = document.getElementById("myRange_2");
        var output_2 = document.getElementById("demo_2");
        output_2.innerHTML = slider_2.value;

        slider_2.oninput = function(){
            output_2.innerHTML = this.value;
        };

        var slider_3 = document.getElementById("myRange_3");
        var output_3 = document.getElementById("demo_3");
        output_3.innerHTML = slider_3.value;

        slider_3.oninput = function(){
            output_3.innerHTML = this.value;
        };
        // End Loop
    </script>
@endsection