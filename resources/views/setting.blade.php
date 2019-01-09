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
                                <a href="">Settings</a>
                            </li>
                        </ul>
                    </div>

                    <h1 class="page-title"> Settings
                    </h1>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_1" data-toggle="tab"> Profile </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_2" data-toggle="tab"> Team </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_3" data-toggle="tab"> Members </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content portlet light bordered">
                                                <div class="tab-pane fade active in" id="tab_1_1">
                                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Profile Picture</label>
                                                                <br>
                                                                <img src="{{ asset('assets/logo/logo_event.png') }}" alt="" width="100">
                                                                <input class="form-control spinner" type="file" placeholder="Input Your Picture"
                                                                       name="picture"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input class="form-control spinner" type="text" placeholder="Input Your Name"
                                                                       name="name"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Position</label>
                                                                <input class="form-control spinner" type="text" placeholder="Input Your Position"
                                                                       name="position"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Location</label>
                                                                <input class="form-control spinner" type="text" placeholder="Input Your Location"
                                                                       name="location"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Batch</label>
                                                                <input class="form-control spinner" type="text" placeholder="Input Your Batch"
                                                                       name="batch"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions text-center">
                                                            <button type="reset" class="btn btn-warning">Reset</button>
                                                            <button type="submit" class="btn green-meadow">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="tab_1_2">
                                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Team Logo</label>
                                                                <br>
                                                                <img src="{{ asset('assets/logo/logo_event.png') }}" alt="" width="100">
                                                                <input class="form-control spinner" type="file" placeholder="Input Team Logo"
                                                                       name="picture"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Team Name</label>
                                                                <input class="form-control spinner" type="text" placeholder="Input Team Name"
                                                                       name="name"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Team Description</label>
                                                                <textarea class="form-control spinner" name="description" placeholder="Input Team Description"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions text-center">
                                                            <button type="reset" class="btn btn-warning">Reset</button>
                                                            <button type="submit" class="btn green-meadow">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="tab_1_3">
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <form action="" class="row">
                                                                <div class="col-md-9"></div>
                                                                <div class="col-md-2">
                                                                    <select name="" id="" class="form-control">
                                                                        <option value="">Filter</option>
                                                                        <option value="">Nama Asc</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input type="submit" class="btn green-meadow" value="Filter">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row portlet light bordered">
                                                        {{-- Loop Member --}}
                                                        <div class="col-md-2 text-center">
                                                            {{-- Photo Member --}}
                                                            <img src="{{ asset('assets/logo/logo_event.png') }}" alt="" width="50">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5>
                                                                <b>Username</b>
                                                            </h5>
                                                            Position
                                                        </div>
                                                        <div class="col-md-2">
                                                            <br>
                                                            <button type="button" class="btn green-meadow">Details</button>
                                                        </div>
                                                        {{-- End Loop --}}
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <a href="#member" data-toggle="modal">
                                                                <span class="fa fa-user-plus"></span>
                                                                Add Member
                                                            </a>
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
                </div>
            </div>
        </div>
        <div class="modal fade" id="member" tabindex="-1" role="member" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Member</h4>
                    </div>
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Profile Picture</label>
                                    <input class="form-control spinner" type="file" placeholder="Input Member Picture"
                                           name="picture"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control spinner" type="text" placeholder="Input Member Name"
                                           name="name"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Position</label>
                                    <input class="form-control spinner" type="text" placeholder="Input Member Position"
                                           name="position"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input class="form-control spinner" type="text" placeholder="Input Member Location"
                                           name="location"/>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Batch</label>
                                    <input class="form-control spinner" type="text" placeholder="Input Member Batch"
                                           name="batch"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn green" value="Save changes" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('shared.footer')
    </div>
    </body>
@endsection

@section('script')

@endsection