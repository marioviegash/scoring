@extends('layout.master')

@section('title', 'Home - Scoring')

@section('style')
    <style>
        a:hover{
            text-decoration: none;
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
                                            <div class="col-md-4 mt-step-col first active" style="padding: 0;">
                                                <div class="mt-step-number bg-white">
                                                    1
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                <div class="mt-step-content uppercase font-grey-cascade">Team Description</div>
                                            </div>
                                            <div class="col-md-4 mt-step-col" style="padding: 0;">
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
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <form action="{{ url('/scoring/description') }}">
                                        <img src="{{ url($group->logo) }}" alt="No Image" width="500">
                                        <h1><b>{{$group->name}}</b></h1>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab"> Description </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content portlet light bordered">
                                                    <div class="tab-pane fade active in text-justify" id="tab_1_1">
                                                            {{$group->description}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-element-step">
                                            <div class="row step-line">
                                                <div class="col-md-6 mt-step-col error" style="padding: 0;">
                                                    <a href="{{ url('/scoring') }}" class="mt-step-number">
                                                        <
                                                    </a>
                                                </div>
                                                <div class="col-md-6 mt-step-col done" style="padding: 0;">
                                                    <a href="{{ url('/scoring/business/'.$group->id) }}" class="mt-step-number bg-white">
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
            </div>
        </div>

        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script')

@endsection