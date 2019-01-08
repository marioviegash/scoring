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
                                <span>Manage Document</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> {{ Auth::user()->roles->name }}
                        <small>Manage Document</small>
                    </h1>

                       <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-file-archive-o font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Document List</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="col-md-12">
                                            <form action="" method="" class="row">
                                                <div class="col-md-2">
                                                    <select name="event" class="form-control spinner">
                                                        @foreach($events as $event)
                                                            <option value="{{$event->id}}"
                                                                 @if($active_event->id === $event->id)
                                                                 selected
                                                                  @endif>
                                                                {{$event->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                                    @foreach($active_event->groups as $key => $group)
                                                        <tr>
                                                            <td> {{$key+1}} </td>
                                                            <td> {{$group->name}} </td>
                                                            <td>
                                                                <a href="{{ url("/admin/document/$group->id/detail") }}">
                                                                    <button type="button" class="btn green">View</button>
                                                                </a>
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