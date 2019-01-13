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
                                <a href="{{ url('/') }}">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="{{ url('/admin/user') }}">Role Management</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>{{ $role == "ama" ? "Admin Amoeba" : "Jury" }}</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> Create {{ $role == "ama" ? "Admin Amoeba" : "Jury" }}
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-user font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Field {{ $role == "ama" ? "Admin Amoeba" : "Jury" }} Data</span>
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
                                            <input class="form-control spinner" type="text" placeholder="Input {{ $role == "ama" ? "Admin Amoeba" : "Jury" }} Name" name="name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control spinner" type="text" placeholder="Input {{ $role == "ama" ? "Admin Amoeba" : "Jury" }} Email"
                                                    name="email"/>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Submit</button>
                                            <a href="{{ url('/admin/user') }}" class="btn default">Cancel</a>
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