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
                                                    <option value="none">Choose The Jury</option>
                                                    <option value="jury_id_1">Jury 1</option>
                                                    <option value="jury_id_2">Jury 2</option>
                                                    <option value="jury_id_3">Jury 3</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Criteria Employee</label>
                                                    <input class="form-control" placeholder="Input Criteria Employee" value="" name="criteria_employee[]" />
                                                    <br>
                                                    <div class="dataCriteriaEmployee"></div>
                                                    <input type="button" class="col-md-12 btn red btnAddEmployee" value="Add Criteria Employee">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Criteria Innovator</label>
                                                    <input class="form-control" placeholder="Input Criteria Innovator" value="" name="criteria_innovator[]" />
                                                    <br>
                                                    <div class="dataCriteriaInnovator"></div>
                                                    <input type="button" class="col-md-12 btn red btnAddInnovator" value="Add Criteria Inovator">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Criteria Score</label>
                                                    <select class="form-control" name="criteria_score">
                                                        <option value="none">Choose Criteria Score</option>
                                                        <option value="5">1 - 5 Score</option>
                                                        <option value="10">1 - 10 Score</option>
                                                    </select>
                                                </div>
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