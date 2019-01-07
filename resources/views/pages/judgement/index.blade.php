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
                                <span>Judgement</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> Judgement
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">All Group</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        {{-- Loop Team --}}
                                        @foreach($groups as $group)
                                        <div class="col-md-3 form-group">
                                            <div class="form-control text-center">
                                                {{$group->name}}
                                            </div>
                                        </div>
                                        @endforeach
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