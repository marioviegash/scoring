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

                    <h1 class="page-title"> {{ Auth::user()->roles->name }}
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
                                        <span class="caption-subject font-green bold uppercase">All Event</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Event Name </th>
                                                <th> Created By </th>
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
                                                        <td> Roza </td>
                                                        <td> {{$event->groups->count('id')}} </td>
                                                        <td> Pending </td>
                                                        <td> <a href="/admin/event/{{$event->id}}/update">View</a> </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <a href="/admin/event">See More ...</a>
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
                                <a href="/group">See More ...</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{--View for Admin Management--}}
                    @if(Auth::user()->roles->id == 2)
                        <div class="row">
                            <div class="col-md-10">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-calendar font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">All Event</span>
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
                                                    <th> Action </th>
                                                </tr>
                                                </thead>
                                                @foreach ($events as $event)
                                                    <tbody>
                                                    <tr>
                                                        <td> 1 </td>
                                                        <td> {{$event->name}} </td>
                                                        <td> {{$event->groups->count('id')}} Team </td>
                                                        <td> <a href="">Start Event</a> </td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <a href="/admin/event">See More ...</a>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <h3>Total Event</h3>
                                    </div>
                                    <div class="portlet-body">
                                        <h1 style="text-align:center">{{ $events->count('id') }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--View for Admin Management--}}
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

                </div>
            </div>
        </div>
        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script')

@endsection