@extends('layouts.admin')
@section('title','Profil Santri')

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
                                      <a href="#" value="{{ action('SantriController@editData',['id'=>$profile->id]) }}" class="btn btn-success editModal" title="Show Data" data-toggle="modal" data-target="#editModal"> Edit Profil </a>
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

                        {{-- Modal --}}
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
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
                     
                    </div><!-- Main Wrapper -->
                    <div class="page-footer">
                        <p>Made with <i class="fa fa-heart"></i> Zuhrof Karimah Hamida</p>
                    </div>
                </div><!-- /Page Inner -->
                
            </div><!-- /Page Content -->
            <script>
            $(".editModal").on("click",function(){
                $('#modalEditContent').load($(this).attr('value'));
            });
            </script>
@endsection