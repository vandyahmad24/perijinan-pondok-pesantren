@extends('layouts.admin')
@section('title','Dashboard Pengurus')

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
                                    <a class="logo-box" href="index.html"><span>Ponpes</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                        
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a></li>
                                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>
                                    <li><a href="javascript:void(0)" id="search-button"><i class="fa fa-search"></i></a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i></a>
                                        <ul class="dropdown-menu dropdown-lg dropdown-content">
                                            <li class="drop-title">Notifications<a href="#" class="drop-title-link"><i class="fa fa-angle-right"></i></a></li>
                                            <li class="slimscroll dropdown-notifications">
                                                <ul class="list-unstyled dropdown-oc">
                                                    <li>
                                                        <a href="#"><span class="notification-badge bg-primary"><i class="fa fa-photo"></i></span>
                                                            <span class="notification-info">Finished uploading photos to gallery <b>"South Africa"</b>.
                                                                <small class="notification-date">20:00</small>
                                                            </span></a>
                                                    </li>
                                                    {{-- notif --}}
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Welcome,    {{Auth::user()->name}} </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Ganti Password</a></li>
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
                        <h3 class="breadcrumb-header">Dashboard</h3>
                    </div>
                    <div id="main-wrapper">
                        
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix" >
                                        <p class="panel-title">Selamat Datang, {{Auth::user()->name}} </p>
                                    </div>
                                   <div class="panel-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                          <tr>
                                            <td>NIS</td>
                                            <td>{{$profile->nis}}</td>
                                          </tr>
                                          <tr>
                                            <td>Nama</td>
                                            <td>{{$user->name}}</td>
                                          </tr>
                                          <tr>
                                            <td>Nama Lengkap</td>
                                            <td>{{$profile->fullname}}</td>
                                          </tr>
                                          <tr>
                                            <td>Email</td>
                                            <td>{{$user->email}}</td>
                                          </tr>
                                          <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>{{$profile->jenis_kelamin}}</td>
                                          </tr>
                                          <tr>
                                            <td>Provinsi</td>
                                            <td>{{$profile->provinsi}}</td>
                                          </tr>
                                          <tr>
                                            <td>Kabupaten</td>
                                            <td>{{$profile->kabupaten}}</td>
                                          </tr>
                                          <tr>
                                            <td>Alamat Lengkap</td>
                                            <td>{{$profile->alamat}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <a href="#" value="{{ action('PengurusController@editData',['id'=>$profile->id]) }}" class="btn btn-success modalEdit" title="Show Data" data-toggle="modal" data-target="#modalEdit"> Edit Profil </a>
                                   </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">Foto Profil, {{Auth::user()->name}} </h4>
                                    </div>
                                   <div class="panel-body">
                                    <img src="{{ asset('foto/'.$profile->foto) }}" id="showgambar" style="max-width:1500px;max-height:150px;float:left;" />
                                </div>
                                </div>
                            </div>
                        </div><!-- Row -->
                    </div>
                 
                    <div class="page-footer">
                        <p>Made with <i class="fa fa-heart"></i> Zuhrof Karimah Hamida</p>
                    </div>
                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" id="modalEditContent">
                            Mohon Tunggu . . .
                            </div>
                            <div class="modal-footer">
                               <br>
                              </div>
                          </div>
                        </div>
                      </div>
                </div><!-- /Page Inner -->
                
            </div><!-- /Page Content -->
            <script>
                $(".modalEdit").on("click",function(){
                    $('#modalEditContent').load($(this).attr('value'));
                });
             </script>
@endsection