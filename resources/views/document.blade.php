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
                                <span>Document Management</span>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="mt-element-step">
                                        <div class="row step-line">
                                            <div class="col-md-4 mt-step-col first 
                                                {{-- @if(isset()) --}}
                                                @if($amoeba->group->file_status > 0) done 
                                                @elseif($amoeba->group->file_status === 0) active 
                                                @endif" style="padding: 0;">
                                                <div class="mt-step-number bg-white">
                                                    @if($amoeba->group->file_status > 0)<span class="fa fa-check"></span>
                                                    @else <span class="fa fa-close"></span>
                                                    @endif
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                <div class="mt-step-content uppercase font-grey-cascade">Document Uploaded</div>
                                            </div>
                                            <div class="col-md-4 mt-step-col 
                                                @if($amoeba->group->file_status > 1) done 
                                                @elseif($amoeba->group->file_status === 1) active 
                                                @endif" style="padding: 0;">
                                                <div class="mt-step-number bg-white">
                                                    @if($amoeba->group->file_status > 1)<span class="fa fa-check"></span>
                                                    @else <span class="fa fa-close"></span>
                                                    @endif
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                <div class="mt-step-content uppercase font-grey-cascade">Document On Check</div>
                                            </div>
                                            <div class="col-md-4 mt-step-col 
                                                @if($amoeba->group->file_status > 2) done 
                                                    @elseif($amoeba->group->file_status === 2) active 
                                                    @endif" style="padding: 0;">
                                                <div class="mt-step-number bg-white">
                                                    @if($amoeba->group->file_status > 1)<span class="fa fa-check"></span>
                                                    @else <span class="fa fa-close"></span>
                                                    @endif
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                <div class="mt-step-content uppercase font-grey-cascade">Document Accepted</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-file-archive-o font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Upload Document</span>
                                    </div>
                                    <div class="actions">

                                    <div class="btn-group">
                                    <a class="btn dark btn-outline btn-circle btn-sm" href="/forum/{{$amoeba->group->id }}"> View Forum </a>
                                    </div>
                                    </div>
                                </div>
                                <div class="portlet-body text-center">
                                    @if($amoeba->group->file !== null)
                                    <h3>Upload your document here</h3>
                                    <span class="fa fa-file"></span> {{$amoeba->group->file->name}}
                                    <br> <br>
                                    <form enctype="multipart/form-data" action="/file/upload" method="post" class="row">
                                        {{csrf_field()}}
                                        <br>
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            <input type="file" name="file_upload" class="text-center"/>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-12">
                                            <br>
                                            <input type="submit" class="btn dark btn-outline" value="Submit"/>
                                        </div>
                                        <div class="col-md-12">
                                            <br>
                                            <a href="/file/download"><button type="button" class="btn green-meadow" >Download</button> </a>
                                        </div>
                                    </form>
                                    @else 
                                    <h3>Upload your document here</h3>
                                    <span class="fa fa-file"></span> Not upload yet
                                    <form enctype="multipart/form-data" action="/file/upload" method="post" class="row">
                                        {{csrf_field()}}
                                        <br>
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            <input type="file" name="file_upload" class="text-center"/>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-12">
                                            <br>
                                            <input type="submit" class="btn dark btn-outline" value="Submit"/>
                                        </div>
                                    </form>
                                    @endif
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