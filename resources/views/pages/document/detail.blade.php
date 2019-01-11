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
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            {{-- Logo Group --}}
                                            <img src="{{ asset('assets/logo/logo_event.png') }}" alt="No Image" width="100">
                                        </div>
                                        <div class="col-md-10">
                                            <h3>Group Name</h3>
                                            <h5>Description</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>
                                                <b>Document : </b>
                                                @if($group->file === null)
                                                <span class="text-danger">
                                                    No Document
                                                </span>
                                                @else 
                                                    {{$group->file->name}}
                                                @endif
                                                @if(isset($group->file))
                                                    <form action="{{url("/admin/document/review/".$group->file->id)}}" method="POST" 
                                                        style="display:inline-block">
                                                        {{csrf_field()}}
                                                        <input type="submit" class="btn btn-default"  value="review"/>
                                                    </form>
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>
                                                <b>Document result : </b>
                                                @if(isset($group->file))
                                                    @if(!isset($group->file->approve_at))
                                                    <form action="{{url("/admin/document/approve/".$group->file->id)}}" method="POST" 
                                                        style="display:inline-block">
                                                        {{csrf_field()}}
                                                        <input type="submit" class="btn green-meadow"  value="Approved"/>
                                                    </form>
                                                    <button type="button" class="btn btn-danger">Revision</button>
                                                    @else 
                                                        Approved
                                                    @endif
                                                @else 
                                                    Wait Amoebas upload file
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>
                                                Do you want give comment for this document ?
                                                <a href="{{ url("/admin/document/$group->id/forum") }}">
                                                    <button type="button" class="btn btn-primary">Comment</button>
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="col-md-12">
                                            <h5>
                                                <b>Members : </b>
                                            </h5>
                                        </div>
                                        {{-- Loop Member --}}
                                        @foreach($group->amoebas as $amoeba)
                                            <div class="row">
                                                <div class="col-md-2 text-center">
                                                    <img src="{{ asset('/'.$amoeba->picture) }}" alt="" width="50">
                                                </div>
                                                <div class="col-md-10">
                                                    <h5>
                                                    <b>{{$amoeba->user->name}}</b>
                                                    </h5>
                                                    {{$amoeba->c_level}}
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- End Loop --}}
                                        <div class="col-md-12 text-center">
                                            <a href="" class="btn btn-default">Back</a>
                                        </div>
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