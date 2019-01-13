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
                                    <span>User management</span>
                                </li>
                            </ul>
                        </div>

                        <h1 class="page-title"> User Management
                        </h1>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-user font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">AMA Table</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn dark btn-outline btn-circle btn-sm" href={{url('admin\user\ama\add')}} > Add New AMA </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> No </th>
                                                        <th> Name </th>
                                                        <th> Division </th>
                                                        <th> Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                        @if($user->roles->id == 4)
                                                            <tr>
                                                                <td> {{$user->id}} </td>
                                                                <td> <span class="fa fa-user"></span> {{$user->name}} </td>
                                                                <td> {{isset($user->admin_amoeba) ? 
                                                                        $user->admin_amoeba->division->name :
                                                                        ""}} </td>
                                                                <td>
                                                                    <a href="#confirm_{{$user->id}}" class="btn btn-danger" data-toggle="modal">Remove</a>
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade" id="confirm_{{$user->id}}" tabindex="-1" role="confirm_{{$user->id}}" aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog" style="width: 15%;">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                            <h4 class="modal-title text-center">Confirmation</h4>
                                                                        </div>
                                                                        <div class="modal-body text-center">
                                                                            Do you really want to delete <b>{{$user->name}}</b> as <b>{{$user->roles->name}}</b>?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                                            <a href="{{ url('/admin/user/'.$user->id.'/delete') }}" class="btn btn-danger">Yes</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-user font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Jury Table</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn dark btn-outline btn-circle btn-sm" href={{url('admin\user\jury\add')}} > Add New Jury </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> No </th>
                                                        <th> Name </th>
                                                        <th> NIK </th>
                                                        <th> Loker </th>
                                                        <th> Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($users as $user )
                                                    @if($user->roles->id == 3)
                                                        <tr>
                                                            <td> {{$user->id}} </td>
                                                            <td> <span class="fa fa-user"></span> {{ $user->name }} </td>
                                                            <td> {{ $user->jury->NIK }} </td>
                                                            <td> {{$user->jury->loker }} </td>
                                                            <td>
                                                                <a href="#confirm_{{$user->id}}" class="btn btn-danger" data-toggle="modal">Remove</a>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="confirm_{{$user->id}}" tabindex="-1" role="confirm_{{$user->id}}" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog" style="width: 15%;">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <h4 class="modal-title text-center">Confirmation</h4>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        Do you really want to delete <b>{{$user->name}}</b> as <b>{{$user->roles->name}}</b>?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                                        <a href="{{ url('/admin/user/'.$user->id.'/delete') }}" class="btn btn-danger">Yes</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
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