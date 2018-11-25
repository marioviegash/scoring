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

                        <h1 class="page-title"> Admin Dashboard
                            <small>Reports</small>
                        </h1>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-user font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Group Table</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Group Name </th>
                                                        <th> Participant 1 </th>
                                                        <th> Participant 2 </th>
                                                        <th> Participant 3 </th>
                                                        <th> Status </th>
                                                        <th> Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($groups as $group )
                                                        
                                                        <tr>
                                                            <td> {{$group->id}} </td>
                                                            <td> {{$group->name}} </td>
                                                            <td> {{$group->amoebas[0]->user->name}} </td>
                                                            <td> {{$group->amoebas[1]->user->name}} </td>
                                                            <td> {{$group->amoebas[2]->user->name}} </td>
                                                            <td>
                                                                <span class="label label-sm {{$group->approve_at !== null ? 'label-success' : 'label-info'}}"> 
                                                                    {{$group->approve_at !== null ? 'Approved' : 'Pending' }} </span>
                                                            </td>
                                                            <td>
                                                                <form action={{url('/group/'.$group->id.'/approve')}} method="post">
                                                                    {{csrf_field()}}
                                                                    <input type="submit" class="btn btn-default" value="Approve" 
                                                                    {{ $group->approve_at !== null ? 'disabled' : ''}}/>
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

            @include('shared.footer')
        </div>
    </body>
@endsection

@section('script')

@endsection