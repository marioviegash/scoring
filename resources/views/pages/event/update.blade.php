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

                    <h1 class="page-title"> Create Event
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
                                <form role="form" action="{{url('\admin\event\\'.$event->id.'\update')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control spinner" type="text" value="{{$event->name}}"
                                                     placeholder="Input The Event Name" name="name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input class="form-control spinner" type="date" 
                                                    value="{{\Carbon\Carbon::parse($event->start_date)->format('Y-m-d')}}" 
                                                name="start_date" />
                                            </div>
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input class="form-control spinner" type="date" 
                                                value="{{\Carbon\Carbon::parse($event->end_date)->format('Y-m-d')}}" 
                                                name="end_date" />
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" rows="3" placeholder="Input The Event Description" value="" name="description">{{$event->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Jury</label>
                                                <select class="form-control" name="jury">
                                                    <option>Choose The Jury</option>
                                                    @foreach ($juries as $jury)
                                                        <option value="{{$jury->id}}" {{$jury->id === $event->jury_id ? "selected" : ""}}>
                                                            {{$jury->user->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Criteria Group</label>
                                            <input class="form-control spinner" type="text" name="criteria_group" value="{{$event->criteria_group}}" placeholder="Input Question for Criteria Grup" />
                                            </div>
                                            <div class="form-group">
                                                <label>Criteria Individu</label>
                                                <input class="form-control spinner" type="text" name="criteria_individu" 
                                                value="{{$event->criteria_individu}}"
                                                    placeholder="Input Question for Criteria Individu" />
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Criteria Employee</label>
                                                    <input class="form-control" placeholder="Input Criteria Employee" 
                                                    value="{{$event->employees[0]->description}}" name="criteria_employee[]" />
                                                    <br>
                                                    <div class="dataCriteriaEmployee">
                                                        @foreach ($event->employees as $key => $employee)
                                                            @if($key !==0)
                                                                <div>
                                                                    <input class="form-control" placeholder="Input Criteria Employee" 
                                                                        value="{{$employee->description}}" name="criteria_employee[]"
                                                                        style="width: 94%; float: left;"/>
                                                                    
                                                                    <button class="btnDeleteInnovator" type="button"
                                                                    style="float: left; width: 6%; height: 34px; border:none; cursor: pointer;">-</button>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    {{-- <div class="dataCriteriaEmployee"></div> --}}
                                                    <input type="button" class="col-md-12 btn red btnAddEmployee" value="Add Criteria Employee">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Criteria Innovator</label>
                                                    <input class="form-control" placeholder="Input Criteria Employee" 
                                                    value="{{$event->innovators[0]->description}}" name="criteria_innovator[]" />
                                                    <br>
                                                    <div class="dataCriteriaEmployee">
                                                        @foreach ($event->innovators as $key => $innovator)
                                                            @if($key !==0)
                                                                <div>
                                                                    <input class="form-control" placeholder="Input Criteria Employee" 
                                                                        value="{{$employee->description}}" name="criteria_innovator[]"
                                                                        style="width: 94%; float: left;"/>
                                                                    
                                                                    <button class="btnDeleteInnovator" type="button"
                                                                    style="float: left; width: 6%; height: 34px; border:none; cursor: pointer;">-</button>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <input type="button" class="col-md-12 btn red btnAddInnovator" value="Add Criteria Inovator">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Criteria Score</label>
                                                    <select class="form-control" name="criteria_score">
                                                        <option value="none">Choose Criteria Score</option>
                                                        <option value="5" {{$event->maximum_score === 5 ?"selected" : ""}}>
                                                            1 - 5 Score
                                                        </option>
                                                        <option value="10" {{$event->maximum_score === 10 ?"selected" : ""}}>
                                                            1 - 10 Score
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @if(!empty($errors->first()))
                                            <div class="row col-lg-12">
                                                <div class="alert alert-danger">
                                                    <span>{{ $errors->first() }}</span>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Submit</button>
                                            <a href="/event"><button type="button" class="btn default">Cancel</button></a>
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