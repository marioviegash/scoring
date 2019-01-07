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
                                <span>Event</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> All Event
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Event Table</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{ url('/admin/event/add') }}"> Add Event</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="col-md-12">
                                        <form action="" class="row">
                                            <div class="col-md-2" style="padding: 0;">
                                                <input class="form-control spinner" type="date" name="start_date" />
                                            </div>
                                            <div style="float: left; padding: 0.5% 1% 0% 1%;">-</div>
                                            <div class="col-md-2" style="padding: 0;">
                                                <input class="form-control spinner" type="date" name="end_date" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" class="form-control btn green-meadow" value="Search">
                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Event Name </th>
                                                    <th> Criteria Score </th>
                                                    <th> Create By </th>
                                                    <th> Status </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            @foreach ($events as $event)    
                                            <tbody>
                                                    <tr class="event">
                                                        <td> 1 </td>
                                                        <td> {{$event->name}} </td>
                                                        <td> 1 - {{$event->maximum_score}} Score </td>
                                                        <td> Belum Ada Field nya </td>
                                                        <td> Validasi Sesuai Tanggal </td>
                                                        <td>
                                                            <a href="">
                                                                <button type="button" class="btn green-meadow">Start</button>
                                                            </a>
                                                            <a href="">
                                                                <button type="button" class="btn btn-danger">Stop</button>
                                                            </a>
                                                            <a href="/admin/event/{{$event->id}}/detail">
                                                                <button type="button" class="btn green">View</button>
                                                            </a>
                                                            <a href="/admin/event/{{$event->id}}/update">
                                                                <button type="button" class="btn btn-primary">Edit</button>
                                                            </a>
                                                            <a href="/admin/event/{{$event->id}}/delete">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="event-detail hidden">
                                                        <th colspan="4"> Event Description </th>
                                                        <th> Criteria Employee </th>
                                                        <th> Criteria Innovator </th>
                                                    </tr>
                                                    <tr class="event-detail hidden">
                                                        <td colspan="4"> {{$event->description}} </td>
                                                        <td> 
                                                            <ul>
                                                                @foreach ($event->employees as $employee)
                                                                    <li>
                                                                        {{$employee->description}}
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                        </td>
                                                        <td> 
                                                            <ul>
                                                                @foreach ($event->innovators as $innovator)
                                                                    <li>
                                                                        {{$innovator->description}}
                                                                    </li>
                                                                @endforeach</td>
                                                            </ul>
                                                        </tr>
                                            </tbody>
                                            
                                            @endforeach
                                        </table>
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