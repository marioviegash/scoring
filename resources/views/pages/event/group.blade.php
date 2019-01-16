@extends('layout.master')

@section('title', 'Home - Scoring')

@section('style-plugin')
    <link href="{{ asset('template_admin/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('style')
    <style>
        .element {
            display: inline-flex;
            align-items: center;
        }

        i.fa-upload {
            margin: 10px;
            cursor: pointer;
            font-size: 30px;
        }

        i:hover {
            opacity: 0.6;
        }

        input {
            display: none !important;
        }
    </style>
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
                                        <form enctype="multipart/form-data" method="POST" action="{{ url("/graph/upload") }}">
                                            {{csrf_field()}}
                                            <div class="col-md-12 portlet light bordered">
                                                <div class="col-md-4 text-center">
                                                <img src="{{ asset($group->logo) }}" alt="No Image" width="250" height="150">
                                                </div>
                                                <div class="col-md-8">
                                                    <h1><b> {{$group->name}} </b></h1>
                                                    <h3> Batch : {{$group->batch_id}}</h3>
                                                    <h5> {{$group->description}} </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                @if($group->graph !== null)
                                                    <img src="{{ asset($group->graph->path) }}" alt="No Image" width="300" height="200">
                                                @endif
                                                <h3>
                                                    Upload Team Graph :
                                                    <input type="hidden" value="{{$group->id}}" name="group_id"/>
                                                    <div class="element">
                                                        <i class="fa fa-upload"></i><span class="name">{{ $group->graph === null ? "No file selected" : $group->graph->name }}</span>
                                                        <input type="file" name="upload"/>
                                                    </div>
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
                                                                <td style="vertical-align: middle"> {{$key+1}} </td>
                                                                <td style="vertical-align: middle"> <img src="{{ asset($amoeba->picture) }}" alt="No Image" width="50" height="50"> {{$amoeba->user->name}} </td>
                                                                <td style="vertical-align: middle"> {{$amoeba->NIK === null ? "-" : $amoeba->NIK}} </td>
                                                                <td style="vertical-align: middle"> {{$amoeba->c_level === null ? "-" : $amoeba->c_level}} </td>
                                                                <td style="vertical-align: middle"> {{$amoeba->loker === null ? "-" : $amoeba->loker}} </td>
                                                                <td style="vertical-align: middle">
                                                                    <input type="hidden" value="{{$amoeba->id}}" name="amoebas[]"/>
                                                                    <div class="element">
                                                                        @if($amoeba->graph !== null)
                                                                            <img src="{{ asset($amoeba->graph->path) }}" alt="No Image" width="100" height="50">
                                                                        @endif
                                                                        <i class="fa fa-upload"></i><span class="name">{{ $amoeba->graph === null ? "No file selected" : $amoeba->graph->name }}</span>
                                                                        <input type="file" name="uploads[]" required/>
                                                                    </div>
                                                                    <input type="submit" value="Upload" />
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn green-meadow">Submit</button>
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
        </div>

        @if(session()->has('message'))
            <div id="toast-container" class="toast-top-right" aria-live="polite" role="alert">
                <div class="toast toast-success" style="">
                    <div class="toast-title">Success</div>
                    <div class="toast-message">Upload Graph to Amoeba</div>
                </div>
            </div>
        @endif


        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script-plugin')
    <script src="{{ asset('template_admin/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
@endsection

@section('script')
    <script src="{{ asset('template_admin/assets/pages/scripts/ui-toastr.min.js') }}" type="text/javascript"></script>
    <script>
        $("#toast-container").click(function(){
           $(this).hide();
        });

        $("i").click(function () {
            $(this).parent().find('input[type="file"]').trigger('click');
        });

        $('input[type="file"]').on('change', function() {
            var val = $(this).val();
            $(this).siblings('span').text(val);
        });
    </script>
@endsection