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
                                </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Group</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Group" />
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Email" />
                                            </div>
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your NIK" />
                                            </div>
                                            <div class="form-group">
                                                <label>Position</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Position" />
                                            </div>
                                            <div class="form-group">
                                                <label>C Level</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your C Level" />
                                            </div>
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Picture" />
                                            </div>
                                            <div class="form-group">
                                                <label>Work Place</label>
                                                <textarea class="form-control" rows="3" placeholder="Input Your Work Place"></textarea>
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