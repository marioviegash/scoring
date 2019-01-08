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
                        <small>Forum</small>
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        {{-- Logo Group --}}
                                        <img src="{{ asset('assets/logo/logo_event.png') }}" alt="No Image" width="100">
                                    </div>
                                    <div class="col-md-10">
                                        <h3>Group Name</h3>
                                        <h5>Description</h5>
                                    </div>
                                </div>
                                {{-- Loop Comment --}}
                                <div class="row portlet light bordered" style="margin: 0;">
                                    <div class="col-md-12">
                                        <div class="col-md-6" style="padding: 0;">
                                            User Name
                                        </div>
                                        <div class="col-md-6 text-right" style="padding: 0;">
                                            Comment Date
                                        </div>
                                        <hr>
                                        Comment
                                    </div>
                                </div>
                                {{-- End Loop Comment --}}
                                <div class="row portlet light bordered" style="margin: 0;">
                                    <form role="form" action="/forum/post" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" name="group_id">
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
                </div>
            </div>
        </div>
        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script')

@endsection