@extends('layouts.admin')
@section('title','Change Password')

@section('content')

 <!-- Page Content -->
  <div class="page-content">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a class="logo-box" href="#"><span>Ponpes</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                        
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Welcome,    {{Auth::user()->name}} </a>
                                        <ul class="dropdown-menu">
                                          
                                            <li><a href="{{route('change-password')}}">Change Password</a></li>
                                            <li><a href="{{route('keluar')}}">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- /Page Header -->
                <!-- Page Inner -->
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Ganti Password</h3>
                    </div>
                    <div id="main-wrapper">
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        @if (session()->has('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                 
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password-update') }}">
                 
                                        {{ csrf_field() }}

                 
                                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                            <label for="current_password" class="col-md-4 control-label">Current Password</label>
                 
                                            <div class="col-md-6">
                                                <input id="current_password" type="password" class="form-control" name="current_password" autofocus>
                                                <span class="help-block">{{ $errors->first('current_password') }}</span>
                                            </div>
                                        </div>
                 
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">New Password</label>
                 
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password">
                                                <span class="help-block">{{ $errors->first('password') }}</span>
                                            </div>
                                        </div>
                 
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password_confirmation" class="col-md-4 control-label">New Password Confirmation</label>
                 
                                            <div class="col-md-6">
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                            </div>
                                        </div>
                 
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Change Password
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div><!-- Row -->
                      
                    </div><!-- Main Wrapper -->
                    <div class="page-footer">
                        <p>Made with <i class="fa fa-heart"></i>Zuhrof Karimah Hamida</p>
                    </div>
                </div><!-- /Page Inner -->
                
            </div><!-- /Page Content -->
@endsection