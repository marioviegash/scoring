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
                                <span>Profile</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> Your profile
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-user font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Field Your Profile</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                <form role="form" action="{{url('admin/user/add')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Name"
                                                    name="name" value="{{$user->name}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control" name="role">
                                                    @foreach ($roles as $role)
                                                        <option id={{$role->id}} value="{{$role->id}}"
                                                                {{$user->role_id === $role->id 
                                                                    ? 'selected': ''}}>{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Submit</button>
                                            <a href="/admin/user" class="btn default">Cancel</button>
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