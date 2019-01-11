@extends('layout.master')

@section('title', 'Home - Scoring')

@section('style')
    <style>
        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }
        #progressbar li {
            text-align: center;
            list-style-type: none;
            color: black;
            text-transform: uppercase;
            font-size: 9px;
            width: 25%;
            float: left;
            position: relative;
        }
        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 10px;
            color: #333;
            background: white;
            border-radius: 100px;
            margin: 0 auto 5px auto;
            border: 1px solid black;
        }
        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }
        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,  #progressbar li.active:after{
            background: #27AE60;
            color: white;
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
                                                <h4><b>Event Name &nbsp; &nbsp; &nbsp; &nbsp; </b> : </h4>
                                                <br>
                                                <h4><b>Total Team &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b> : </h4>
                                                <br>
                                                <h4><b>Total Judge &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b> : </h4>
                                                <br>
                                                <h4><b>Event Create By </b> &nbsp;: </h4>
                                            </div>
                                            <div class="col-md-6">
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
                                                <h4><b>Event Name &nbsp; &nbsp; &nbsp; &nbsp; </b> : </h4>
                                                <br>
                                                <h4><b>Total Team &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b> : </h4>
                                                <br>
                                                <h4><b>Total Judge &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b> : </h4>
                                                <br>
                                                <h4><b>Event Create By </b> &nbsp;: </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Event Pantek</h4>
                                                <br>
                                                <h4>10 Teams</h4>
                                                <br>
                                                <h4>5 Judges</h4>
                                                <br>
                                                <h4>Pembuat lnaciau</h4>
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
                                                <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Event Name </th>
                                                    <th> Total Team </th>
                                                    <th> Status </th>
                                                    <th> Action </th>
                                                </tr>
                                                </thead>
                                                @foreach ($events as $event)
                                                    <tbody>
                                                    <tr>
                                                        <td> 1 </td>
                                                        <td> {{$event->name}} </td>
                                                        <td> {{$event->groups->count('id')}} Team </td>
                                                        <td> Invited </td>
                                                        <td> <a href="">View</a> </td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-calendar font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Event History</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        No Event History
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
                                                <div class="col-md-2 mt-step-col active" style="padding: 0;">
                                                    <div class="mt-step-number bg-white">
                                                        <span class="fa fa-close"></span>
                                                    </div>
                                                    <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                    <div class="mt-step-content uppercase font-grey-cascade">Upload Document</div>
                                                </div>
                                                <div class="col-md-2 mt-step-col" style="padding: 0;">
                                                    <div class="mt-step-number bg-white">
                                                        <span class="fa fa-close"></span>
                                                    </div>
                                                    <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                    <div class="mt-step-content uppercase font-grey-cascade">Document Accepted</div>
                                                </div>
                                                <div class="col-md-2 mt-step-col" style="padding: 0;">
                                                    <div class="mt-step-number bg-white">
                                                        <span class="fa fa-close"></span>
                                                    </div>
                                                    <div class="mt-step-title uppercase font-grey-cascade"></div>
                                                    <div class="mt-step-content uppercase font-grey-cascade">Scoring</div>
                                                </div>
                                                <div class="col-md-2 mt-step-col last" style="padding: 0;">
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
                                                        <b>Sidang Komite 2</b>
                                                        <br>
                                                        Start Date &nbsp; : Tanggal Mulai
                                                        <br>
                                                        End Date &nbsp; &nbsp; : Tanggal Berakhir
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
                                        Nama Team
                                        <br>
                                        <h3>
                                            <b>Team Member</b>
                                        </h3>
                                        {{-- Foreach User --}}
                                        <span class="fa fa-user"></span> Darwin
                                        <br>
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