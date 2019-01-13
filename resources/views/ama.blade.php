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
                                            <a class="btn btn-sm green" href="javascript:"> Change Password
                                                <i class="fa fa-lock"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Name" name="name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Email" name="email"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Division</label>
                                                <select class="form-control spinner" name="division">
                                                    {{-- Loop Division --}}
                                                    <option value="">Division Khintil</option>
                                                    {{-- End Loop --}}
                                                </select>
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