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
                                            <span class="caption-subject font-green bold uppercase">User Table</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn dark btn-outline btn-circle btn-sm" href={{url('admin\user\add')}} > Add User</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Name </th>
                                                        <th> Email </th>
                                                        <th> Role </th>
                                                        <th> Status </th>
                                                        <th> Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user )
                                                        <tr>
                                                            <td> {{$user->id}} </td>
                                                            <td> {{$user->name}} </td>
                                                            <td> {{$user->email}} </td>
                                                            <td> {{$user->roles->name}} </td>
                                                            <td> Active </td>
                                                            <td>
                                                                <a href={{"/admin/user/".$user->id."/update"}}
                                                                    class="btn btn-default" >
                                                                    Update
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