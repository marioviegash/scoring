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
                                <form role="form" action="{{url('profile')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                            <input class="form-control spinner" type="text" placeholder="Input Your Name" value='{{$amoeba->user->name}}' name="name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Group</label>
                                                <div class="form-control spinner" >
                                                        {{$amoeba->group->name}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your Email" value="{{$amoeba->user->email}}" />
                                            </div>
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your NIK" value="{{$amoeba->NIK}}" name="nik"/>
                                            </div>
                                            <div class="form-group">
                                                <label>C Level</label>
                                                <input class="form-control spinner" type="text" placeholder="Input Your C Level" value="{{$amoeba->c_level}}" name="c_level"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <input class="form-control spinner" type="file" placeholder="Input Your Picture" name="picture"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Loker</label>
                                            <input class="form-control spinner" rows="3" placeholder="Input Your Loker" value="{{$amoeba->loker}}" name="loker"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Work Place</label>
                                                <textarea class="form-control" rows="3" placeholder="Input Your Work Place" value="{{$amoeba->work_place}}" name="work_place">{{$amoeba->work_place}}</textarea>
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