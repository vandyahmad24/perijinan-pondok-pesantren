@extends('layouts.admin')
@section('title','Dashboard Admin')

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
                          @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                         @if (session('delete'))
                            <div class="alert alert-danger">
                                {{ session('delete') }}
                            </div>
                        @endif
                    </div>
                    <div id="main-wrapper">
                      
                        <div class="row">
                            <div class="col-lg-10 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">Daftar User</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nis</th>
                                                    <th>Nama</th>
                                                    <th>Foto</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Provinsi</th>
                                                    <th>Kabupaten</th>
                                                    <th>Alamat</th>
                                                    <th>Level</th>
                                               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($profiles as $profil)
                                                <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                    <td>{{$profil->nis}}</td>
                                                    <td>{{$profil->fullname}}</td>
                                                   <td>
                                                    <img src="{{ asset('foto/'.$profil->foto) }}" id="showgambar" style="max-width:70px;max-height:70px;float:left;" />
                                                </td>
                                                    <td>{{$profil->jenis_kelamin}}</td>
                                                    <td>{{$profil->provinsi}}</td>
                                                    <td>{{$profil->kabupaten}}</td>
                                                    <td>{{$profil->alamat}}</td>
                                                    @if($profil->user->level=='admin')
                                                    <td> <span class="label label-danger">{{$profil->user->level}}</span></td>
                                                    @elseif($profil->user->level=='pengurus')
                                                    <td> <span class="label label-success">{{$profil->user->level}}</span></td>
                                                    @else
                                                    <td> <span class="label label-warning">{{$profil->user->level}}</span></td>
                                                    @endif
                                                  
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $profiles->links() }}
                                        <ul> 
                                        <li> Jumlah Santri {{$santri}}</li>
                                        <li> Jumlah Admin {{$admin}}</li>
                                        <li> Jumlah pengurus{{$pengurus}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div><!-- Row -->
                        <div class="col-lg-4 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">Jumlah Perijinan</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">
                                        </div>
                                        <div>Jumlah Perijinan {{$perijinan}}</div>
                                        <div>Jumlah Belum di Konfirmasi {{$pending}}</div>
                                        <div>Jumlah di Setujui {{$setuju}}</div>
                                        <div>Jumlah di Tolak {{$tolak}}</div>
                                    </div>
                                </div>
                            </div>
                      <div class="col-md-12">

                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Mata Pelajaran</h4>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Tambah Mapel</button>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Deskripsi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($mapel as $map)
                                                <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>{{$map->nama}}</td>
                                                    <td>{{$map->deskripsi}}</td>
                                                    <td> <a href="/admin/delete-daftar-mapel/{{$profil->id}}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
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
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Pelajaran</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('add-daftar-mapel')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                          <div class="form-group">
                            <label for="mapel">Nama Mapel</label>
                            <input type="text" class="form-control" id="mapel" name="mapel">
                          </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Add Mapel</button>
                    </div>
                </form>
                </div>
            </div>

@endsection