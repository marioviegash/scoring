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

                    <h1 class="page-title"> Update Event
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-calendar font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Field The Event</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control spinner" type="text" placeholder="Input The Event Name" name="name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input class="form-control spinner" type="date" name="start_date" />
                                            </div>
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input class="form-control spinner" type="date" name="end_date" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" rows="3" placeholder="Input The Event Description" value="" name="description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Jury</label>
                                                <select class="form-control" name="jury">
                                                    <option>Choose The Jury</option>
                                                    <option>Jury 1</option>
                                                    <option>Jury 2</option>
                                                    <option>Jury 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Submit</button>
                                            <button type="button" class="btn default">Cancel</button>
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