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

                    {{--View For Super Admin--}}
                    @if(Auth::user()->roles->id == 1)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-file-archive-o font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">All Document</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Group Name </th>
                                                        <th> Document </th>
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($groups as $group)
                                                        <tr>
                                                            <td> {{$group->id}} </td>
                                                            <td> {{$group->name}} </td>
                                                            <td> {{$group->document == null ? "No File" : $group->document}} </td>
                                                            <td> @if($group->document == null) No Action @else <a
                                                                        href="{{$group->document}}">Download</a> @endif </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--View For Admin Management--}}
                    @if(Auth::user()->roles->id == 2)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-file-archive-o font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">All Document</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Group Name </th>
                                                    <th> Document </th>
                                                    <th> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($groups as $group)
                                                    <tr>
                                                        <td> {{$group->id}} </td>
                                                        <td> {{$group->name}} </td>
                                                        <td> {{$group->document == null ? "No File" : $group->document}} </td>
                                                        <td> @if($group->document == null) No Action @else <a
                                                                    href="{{$group->document}}">Download</a> @endif </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--View For Amoeba--}}
                    @if(Auth::user()->roles->id == 4)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-file-archive-o font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">My Document</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Group Name </th>
                                                    <th> Document </th>
                                                    <th> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                @if(!empty($errors->first())) 
                                                    <div class="row col-lg-12">
                                                        <div class="alert alert-danger">
                                                            <span>{{ $errors->first() }}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                                @foreach($groups as $group)
                                                    @if($group->id == Auth::user()->amoeba->group_id)
                                                        <tr>
                                                            <td> {{$group->id}} </td>
                                                            <td> {{$group->name}} </td>
                                                            <td> {{$group->files()->orderBy('created_at', 'desc')->first() == null ?
                                                                 "No File" : $group->files()->orderBy('created_at', 'desc')->first()->name}} </td>
                                                            <td>
                                                                <form action="file/upload" method="post" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    <input type="file" name="file_upload" value="Upload"/>
                                                                    <input type="hidden" value="{{$group->id}}" />
                                                                    <input type="submit" value="Submit" />
                                                                </form>

                                                                <form action="file/download" method="get">
                                                                    {{csrf_field()}}
                                                                    <input type="submit" value="Download" />
                                                                </form>
                                                                
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(Auth::user()->roles->id == 2 || Auth::user()->roles->id == 4)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-comments font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Forum</span>
                                        </div>
                                    </div>
                                    {{--Loop Comment--}}
                                    <div class="row portlet light bordered" style="margin: 0;">
                                        <div class="col-md-12">
                                            <div class="col-md-6" style="padding: 0;">
                                                Username
                                            </div>
                                            <div class="col-md-6 text-right" style="padding: 0;">
                                                Date
                                            </div>
                                            <hr>
                                            Comment
                                        </div>
                                    </div>
                                    <div class="row portlet light bordered" style="margin: 0;">
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-body row">
                                                <div class="form-group col-md-11" style="padding: 0 0 0 2%; margin: 0;">
                                                    <input class="form-control spinner" type="text" placeholder="Input Your Comment" name="comment" />
                                                </div>
                                                <div class="form-group col-md-1" style="padding: 0; margin: 0;">
                                                    <button type="submit" class="btn red">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script')

@endsection