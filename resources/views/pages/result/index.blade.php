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
                                <span>View Result</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> {{ Auth::user()->roles->name }}
                        <small>View Result</small>
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-file font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Result List</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="col-md-12">
                                        <form action="" method="" class="row">
                                            <div class="col-md-2">
                                                <select name="event" class="form-control spinner">
                                                    <option value="80jt">Event 1</option>
                                                </select>
                                            </div>
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
                                                <th> No. </th>
                                                <th> Amoeba Name </th>
                                                <th> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td> 1 </td>
                                                <td> Group 1 </td>
                                                <td>
                                                    <a href="{{ url("/admin/result/{id}/detail") }}">
                                                        <button type="button" class="btn green">View</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row text-right">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-warning">Download excel</button>
                                            <a href="#confirm" class="btn green-meadow" data-toggle="modal">Share all result</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirm" tabindex="-1" role="confirm" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width: 15%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title text-center">Alert</h4>
                    </div>
                    <div class="modal-body text-center">
                        Do you really want share all <br>
                        result to Jury and Amoeba ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger">Yes</button>
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