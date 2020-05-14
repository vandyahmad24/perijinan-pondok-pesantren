@extends('layouts.admin')
@section('title','Tambah Santri')
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
                        <h3 class="breadcrumb-header">Daftar Santri</h3>
                    </div>
                    <div id="main-wrapper">
                        <div class="page-inner">
                        <div id="main-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-white">
                                        <div class="panel-heading clearfix d-inline ">
                                            <h4 class="panel-title">Daftar Santri </h4>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adduser">
                                                Tambah Santri
                                              </button>
                                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importsantri">
                                                Import Santri
                                              </button>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
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
                                                            <th>Aksi</th>
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
                                                            <td>
                                                              
                                                            <a href="/admin/delete-daftar-santri/{{$profil->id}}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                                                            <a href="#" value="{{ action('AdminController@ShowSantri',['id'=>$profil->id]) }}" class="btn btn-success editModal" title="Show Data" data-toggle="modal" data-target="#editModal"> <i class="fa fa-edit"></i> </a>
     
                                                            </td>
                                                        </tr> 
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $profiles->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            </div><!-- Row -->
                    <div class="page-footer">
                        <p>Made with <i class="fa fa-heart"></i> Zuhrof Karimah Hamida</p>
                    </div>
                </div><!-- /Page Inner -->

                  <!-- Modal -->
                  <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduser" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">Tambah Data Santri</h4>
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{route('post-daftar-santri')}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}                        
                                            <div class="-auto my-5">	
                                                @if(count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                    {{ $error }} <br/>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                        <div class="form-group">
                                            <label for="name">NIS</label>
                                            <input type="text" class="form-control" name="nis" id="nis" placeholder="nis">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Nama Lengkap</label>
                                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="fullname">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">laki-laki</option>
                                                <option value="perempuan">perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <select name="provinsi" id="provinsi" class="form-control provinsi">
                                                <option value="">Pilih Provinsi</option>
                                                @foreach ($province as $prov)
                                                <option value="{{$prov->name}}">{{$prov->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kabupaten">Kabupaten / Kota</label>
                                            <select name="kabupaten" id="kabupaten" id="kabupaten" class="form-control kabupaten">
                                                <option value="">Pilih Provinsi Dahulu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat Lengkap</label>
                                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">Pilih Level</option>
                                            <option value="pengurus">Pengurus</option>
                                            <option value="santri">Santri</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" name="foto" id="foto" class="form-control">
                                        </div>
                                       
                                        </div>
                                    </div>
                                </div>
                        
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  {{-- Edit Modal --}}
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

                  <div class="modal fade" id="importsantri" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Import Data Santri</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" >
                        <form method="post" action="{{route('import-santri')}}" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-body">
                                    {{ csrf_field() }}
                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                

           <script>
            $( document ).ready(function() {

               $(".provinsi").change(function(){
                var prov_id = $(this).val();
                console.log(prov_id);
                   $.ajax({
                    url: "{{route('get-kabupaten')}}",
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        prov_id:prov_id
                    },
                    success: function(data) {
                        $('.kabupaten').empty()
                        $.each(data.data, function (key, val) {
                                $('.kabupaten').append(`<option value="${val.name}"> 
                                       ${val.name} 
                                  </option>`); 
                            });
                    }
                       
                   });
                });
            });
            $(".editModal").on("click",function(){
                $('#modalEditContent').load($(this).attr('value'));
                
                
            });
         

           </script>

@endsection