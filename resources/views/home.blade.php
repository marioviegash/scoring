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
                                <span>Dashboard</span>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> {{ Auth::user()->name }}
                        <small>Dashboard</small>
                    </h1>

                    {{--View For Super Admin--}}
                    @if(Auth::user()->roles->id == 1)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-calendar font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Last Event</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h4><b>Event Name</b></h4>
                                                <br>
                                                <h4><b>Total Team</b></h4>
                                                <br>
                                                <h4><b>Total Judge</b></h4>
                                                <br>
                                                <h4><b>Event Create By</b></h4>
                                            </div>
                                            <div class="col-md-1">
                                                <h4>:</h4>
                                                <br>
                                                <h4>:</h4>
                                                <br>
                                                <h4>:</h4>
                                                <br>
                                                <h4>:</h4>
                                            </div>
                                            <div class="col-md-5">
                                                <h4>{{$lastEvent->name}}</h4>
                                                <br>
                                                <h4>{{count($lastEvent->groups)}} Teams</h4>
                                                <br>
                                                <h4>{{count($lastEvent->juries)}} Judges</h4>
                                                <br>
                                                <h4>{{$lastEvent->creator->name}}</h4>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <h2>Event Status</h2>
                                                <br>
                                                {{$lastEvent->start_time != null ?
                                                Carbon\Carbon::parse($lastEvent->start_time)->format('d F Y h:m')
                                                : 'Not Started'}}
                                                <br> <br>
                                                <button type="button" class="btn blue">Start</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-user font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Request Users</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Group Name </th>
                                                    <th> Request Date </th>
                                                </tr>
                                                </thead>
                                                @foreach ($groups as $group )
                                                    <tbody>
                                                    <tr class="amoeba">
                                                        <td> {{$group->id}} </td>
                                                        <td> {{$group->name}} </td>
                                                        <td> {{$group->created_at}} </td>
                                                    </tr>
                                                    <tr class="amoeba-detail hidden">
                                                        <th> Name </th>
                                                        <th colspan="2"> Email </th>
                                                        <th> C Level </th>
                                                    </tr>
                                                    @foreach($group->amoebas as $amoeba)
                                                        <tr class="amoeba-detail hidden">
                                                            <td> {{ $amoeba->user->name }} </td>
                                                            <td colspan="2"> {{ $amoeba->user->email }} </td>
                                                            <td> {{ $amoeba->c_level == null ? "-" : $amoeba->c_level }} </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row text-right">
                                        <a href="/group">See More ...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--View for Admin Management--}}
                    @if(Auth::user()->roles->id == 2)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-calendar font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Last Event</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        {{-- Loop --}}
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h4><b>Event Name</b></h4>
                                                <br>
                                                <h4><b>Total Team</b></h4>
                                                <br>
                                                <h4><b>Total Judge</b></h4>
                                                <br>
                                                <h4><b>Event Create By</b></h4>
                                            </div>
                                            <div class="col-md-1">
                                                <h4>:</h4>
                                                <br>
                                                <h4>:</h4>
                                                <br>
                                                <h4>:</h4>
                                                <br>
                                                <h4>:</h4>
                                            </div>
                                            <div class="col-md-5">
                                                <h4>Event Name</h4>
                                                <br>
                                                <h4>Total Teams</h4>
                                                <br>
                                                <h4>Total Judges</h4>
                                                <br>
                                                <h4>Created Name</h4>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <h2>Event Status</h2>
                                                <br>
                                                Not Started
                                                <br> <br>
                                                <button type="button" class="btn blue">Start</button>
                                            </div>
                                        </div>
                                        <hr>
                                        {{-- End Loop --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--View for Jury--}}
                    @if(Auth::user()->roles->id == 3)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-calendar font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Event</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                {{-- Loop Event --}}
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="{{ asset('assets/logo/logo_event.png') }}" alt="No Image" width="30">
                                                            </td>
                                                            <td style="vertical-align: middle"> Event Name </td>
                                                            <td style="vertical-align: middle"> Total Team </td>
                                                            <td style="vertical-align: middle"> 5 Judges </td>
                                                            <td style="vertical-align: middle"> Status </td>
                                                        </tr>
                                                    </tbody>
                                                {{-- End Loop --}}
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--View for Amoeba--}}
                    @if(Auth::user()->roles->id == 4)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <div class="mt-element-step">
                                            <div class="row step-line">
                                                <div class="mt-step-desc">
                                                    <div class="font-dark bold uppercase">Account Status : </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2 mt-step-col first done" style="padding: 0;">
                                                    <div class="mt-step-number bg-white">
                                                        <span class="fa fa-check"></span>
                                                    </div>
                                                    <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                    <div class="mt-step-content uppercase font-grey-cascade">Register</div>
                                                </div>
                                                <div class="col-md-2 mt-step-col 
                                                @if($amoeba->progress_status > 1) done 
                                                @elseif($amoeba->progress_status === 1) active 
                                                @endif " style="padding: 0;">
                                                    <div class="mt-step-number bg-white">
                                                        <span class="fa fa-close"></span>
                                                    </div>
                                                    <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                    <div class="mt-step-content uppercase font-grey-cascade">Upload Document</div>
                                                </div>
                                                <div class="col-md-2 mt-step-col
                                                @if($amoeba->progress_status > 2) done 
                                                @elseif($amoeba->progress_status === 2) active 
                                                @endif" style="padding: 0;">
                                                    <div class="mt-step-number bg-white">
                                                        <span class="fa fa-close"></span>
                                                    </div>
                                                    <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                    <div class="mt-step-content uppercase font-grey-cascade">Document Accepted</div>
                                                </div>
                                                <div class="col-md-2 mt-step-col
                                                @if($amoeba->progress_status > 3) done 
                                                @elseif($amoeba->progress_status === 3) active 
                                                @endif" style="padding: 0;">
                                                    <div class="mt-step-number bg-white">
                                                        <span class="fa fa-close"></span>
                                                    </div>
                                                    <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                    <div class="mt-step-content uppercase font-grey-cascade">Scoring</div>
                                                </div>
                                                <div class="col-md-2 mt-step-col last
                                                @if($amoeba->progress_status > 4) done 
                                                @elseif($amoeba->progress_status === 4) active 
                                                @endif" style="padding: 0;">
                                                    <div class="mt-step-number bg-white">
                                                        <span class="fa fa-close"></span>
                                                    </div>
                                                    <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                    <div class="mt-step-content uppercase font-grey-cascade">Result Out</div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <h3>
                                                            <b>Your Event</b>
                                                        </h3>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <img src="{{ asset('assets/logo/logo_event.png') }}" alt="No Image" width="50">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <b>{{$amoeba->group->event->name}}</b>
                                                        <br>
                                                        Start Date &nbsp; : {{$amoeba->group->event->start_date}}
                                                        <br>
                                                        End Date &nbsp; &nbsp; : {{$amoeba->group->event->end_date}}
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <a href="">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <h3>
                                                            <b>Result</b>
                                                        </h3>
                                                        {{-- Kalau Belum Dinilai --}}
                                                        Result is not out yet
                                                        {{-- Kalau Sudah Dinilai --}}
                                                        <br>
                                                        Innovator A
                                                        <br>
                                                        86%
                                                        <br>
                                                        <a href="">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body text-center">
                                        <h3>
                                            <b>Your Team</b>
                                        </h3>
                                        {{-- Logo Team --}}
                                        <img src="{{ asset('assets/logo/logo_event.png') }}" alt="" width="30">
                                        <br>
                                        {{$amoeba->group->name}}
                                        <br>
                                        <h3>
                                            <b>Team Member</b>
                                        </h3>
                                        {{-- Foreach User --}}
                                        @foreach($amoeba->group->amoebas as $member)
                                        <span class="fa fa-user"></span> {{$member->user->name}}
                                        <br>
                                        @endforeach
                                        {{-- End Foreach --}}
                                        <br>
                                        <a href="{{ url('/setting') }}" class="btn green-meadow">Edit Team</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script')

@endsection