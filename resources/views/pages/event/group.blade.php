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
                                <a href="index.html">Event</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="">Detail</a>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> Event Detail
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            {{-- Ini Untuk Logo Group --}}
                                            <img src="{{ asset($group->logo) }}" alt="No Image" width="180">
                                        </div>
                                        <div class="col-md-8">
                                            <h1><b> {{$group->name}} </b></h1>
                                            <h3> Batch : {{$group->batch_id}}</h3>
                                            <h5> {{$group->description}} </h5>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>
                                                Upload Team Graph : 
                                                <form enctype="multipart/form-data" method="POST" action="/graph/upload/group"> 
                                                <input type="hidden" value="{{$group->id}}" name="group_id"/>
                                                {{csrf_field()}}
                                                    <input type="file" name="file_upload" />
                                                    <input type="submit" value="Upload" />
                                                </form>
                                            </h3>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-scrollable">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> No. </th>
                                                            <th> Name </th>
                                                            <th> NIK </th>
                                                            <th> C-Level </th>
                                                            <th> Loker </th>
                                                            <th> Upload Graph </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($group->amoebas as $key => $amoeba)
                                                        <tr>
                                                            <td> {{$key+1}} </td>
                                                            <td> <span class="fa fa-user"></span> {{$amoeba->user->name}} </td>
                                                            <td> {{$amoeba->NIK}} </td>
                                                            <td> {{$amoeba->c_level}} </td>
                                                            <td> {{$amoeba->loker}} </td>
                                                            <td>
                                                                    <form enctype="multipart/form-data" method="POST" action="/graph/upload"> 
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" value="{{$amoeba->id}}" name="amoeba_id"/>
                                                                        
                                                                            <input type="file" name="file_upload" />
                                                                            <input type="submit" value="Upload" />
                                                                    </form>
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
            </div>
        </div>

        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script')

@endsection