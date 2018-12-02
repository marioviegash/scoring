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
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Event Name </th>
                                                    <th> Event Description </th>
                                                    <th> Criteria Score </th>
                                                    <th> Start Date </th>
                                                    <th> End Date </th>
                                                    <th> Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($events as $event)    
                                                    <tr>
                                                        <td> 1 </td>
                                                        <td> {{$event->name}} </td>
                                                        <td> {{$event->description}} </td>
                                                        {{-- <td> Tamvan, Keren </td> --}}
                                                        {{-- <td> Mantul, Kreatif </td> --}}
                                                        <td> 1 - {{$event->maximum_score}} Score </td>
                                                        <td> {{\Carbon\Carbon::parse($event->start_date)->format('d M y')}} </td>
                                                        <td> {{\Carbon\Carbon::parse($event->end_date)->format('d M y')}} </td>
                                                        <td>
                                                            <a href="/admin/event/{{$event->id}}/update"><button type="button" class="btn btn-default">Edit</button></a>
                                                            <form action="/admin/event/delete" method="post"> 
                                                                <button type="button" class="btn btn-default">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
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