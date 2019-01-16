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
                                <span>Scoring</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> Scoring
                        <small>Sidang Komite 2</small>
                    </h1>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 text-center">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <form action="{{ url('/scoring/description') }}">
                                        <br>
                                        <h4>Choose team you want to score:</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <select name="group" class="form-control">\
                                                    @foreach ($groups as $group )
                                                <option value={{$group->id}}>{{$group->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        <br>
                                        <input type="submit" value="Proceed" class="btn green-meadow">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
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