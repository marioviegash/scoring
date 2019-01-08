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
                                                <li>
                                                    <a href="#tab_1_2" data-toggle="tab"> Team </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#tab_1_3" data-toggle="tab"> Jury </a>
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
                                                <div class="tab-pane fade" id="tab_1_2">
                                                    <div class="table-scrollable">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th> No. </th>
                                                                <th> Team </th>
                                                                <th> Action </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td> 1 </td>
                                                                    <td> Team Lanciau </td>
                                                                    <td>
                                                                        <a href="/admin/event/1/upload">
                                                                            <button type="button" class="btn green">View</button>
                                                                        </a>
                                                                        <a href="">
                                                                            <button type="submit" class="btn btn-danger fa fa-minus"></button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab_1_3">
                                                    <div class="table-scrollable">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th> No. </th>
                                                                    <th> Jury </th>
                                                                    <th> Loker </th>
                                                                    <th> NIK </th>
                                                                    <th> Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td> 1 </td>
                                                                    <td> <span class="fa fa-user"></span> Lanciau </td>
                                                                    <td> HCM </td>
                                                                    <td> 99999 </td>
                                                                    <td>
                                                                        <a href="">
                                                                            <button type="submit" class="btn btn-danger fa fa-minus"></button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <a href="">
                                                            <button type="button" class="btn dark btn-outline">Add Jury</button>
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

@endsection