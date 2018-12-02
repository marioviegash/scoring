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
                                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{ url('create-event') }}"> Add Event</a>
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
                                                    <th> Criteria Score </th>
                                                    <th> Start Date </th>
                                                    <th> End Date </th>
                                                    <th> Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="event">
                                                    <td> 1 </td>
                                                    <td> Event Alay </td>
                                                    <td> 1 - 10 Score </td>
                                                    <td> 10 November 2018 </td>
                                                    <td> 11 November 2018 </td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" href="#viewGroup" style="z-index: 5">View</button>
                                                        <a href="/update-event"><button type="button" class="btn btn-default" style="z-index: 5">Edit</button></a>
                                                        <button type="button" class="btn btn-default" style="z-index: 5">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr class="event-detail hidden">
                                                    <th colspan="4"> Event Description </th>
                                                    <th> Criteria Employee </th>
                                                    <th> Criteria Innovator </th>
                                                </tr>
                                                <tr class="event-detail hidden">
                                                    <td colspan="4"> Deskripsi Event Alay </td>
                                                    <td> Tamvan, Keren</td>
                                                    <td> Kreatif, Inisiatif </td>
                                                </tr>
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

        <div class="modal fade" id="basic" tabindex="-1" role="viewGroup" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal Title</h4>
                    </div>
                    <div class="modal-body"> Modal body goes here </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
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