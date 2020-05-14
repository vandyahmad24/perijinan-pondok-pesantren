@extends('layouts.admin')
@section('title','Menu Perijinan')

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
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix" >
                                        <p class="panel-title">Selamat Datang, {{Auth::user()->name}} </p>
                                    </div>


                                   <div class="panel-body">
                                       <h4>Daftar Pengajuan Ijin</h4>
                                        <div class="panel panel-white">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">Data Perijinan</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#" data-toggle="modal" data-target="#ijinmadin">Ijin Madin</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#ijinpulang">Ijin Pulang</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#ijinkegiatan">Ijin Kegiatan</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#ijinpulangmalam">Ijin Pulang Malam</a></li>
                                            </ul>
                                        </div>
                                          @include('pengurus.modal.madin')
                                          @include('pengurus.modal.kegiatan')
                                          @include('pengurus.modal.pulang')
                                          @include('pengurus.modal.pulangmalam')
                                      
                                       <br>
                                        @if(count($perijinans) > 0)
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Santri</th>
                                            <th scope="col">Ijin</th>
                                            <th scope="col">Tanggal Ijin</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Catatan</th>
                                            <th scope="col">Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($perijinans as $item)
                                          <tr>
                                          <th scope="row">{{$loop->iteration}}</th>
                                           <td>{{$item->user->name}}</td>
                                            <td>{{$item->type}}</td>

                                            <td>{{$item->mulai_ijin}}</td>
                                            <td>
                                                @if($item->status =='menunggu')
                                                <span class="label label-warning ">Menunggu Konfirmasi</span>
                                                @elseif($item->status =='setuju')
                                                <span class="label label-success ">Perijinan di Setujui</span>
                                                @else
                                                <span class="label label-danger ">Perijinan di Tolak</span>
                                                @endif
                                            </td>
                                             <td>{{$item->catatan}}</td>
                                            <td>
                                            <a href="#" value="{{$item->id}}" type-ijin="{{$item->type}}" class="btn btn-primary editModal" title="Edit Perijinan" data-toggle="modal" data-target="#{{$item->type}}"> Edit</a>
                                            @if($item->status =='setuju' && $item->no_hp!='')
                                            <a href="/send-wa/{{$item->id}}" target="_blank" class="btn btn-success">Send Message</a>
                                            @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                      </table>      
                                    @else
                                      <h3> Kamu Belum Membuat Perijinan</h3>
                                      @endif
                                  </div>
                                </div>
                            </div>
                          
                        </div><!-- Row -->
                    </div>
                 
                    <div class="page-footer">
                        <p>Made with <i class="fa fa-heart"></i> Zuhrof Karimah Hamida</p>
                    </div>
                    {{-- Modal Edit --}}
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
                </div><!-- /Page Inner -->
                
            </div><!-- /Page Content -->
            @include('pengurus.modal_edit.edit_madin')
            @include('pengurus.modal_edit.edit_pulang')
            @include('pengurus.modal_edit.edit_kegiatan')
            @include('pengurus.modal_edit.edit_pulangmalam')


            <script>
                $(".editModal").on("click",function(){
                var type = $(this).attr("type-ijin");
                var id = $(this).attr("value");
                switch(type) {
                  case "ijin_madin":
                    $.ajax({
                        type:"get",
                        url:"{{route('pengurus-edit-perijinan')}}"+"?id="+id+"&type="+type,
                        success:function(data){
                            console.log(data);
                           $("#edit_madin #edit_tanggal_ijin").val(data.mulai_ijin);
                           $("#edit_madin #perijinan_id").val(data.id);
                           $("#edit_madin #edit_mapel").val(data.mapel);
                           $("#edit_madin #edit_alasan").val(data.alasan);
                           $("#edit_madin #status").val(data.status);
                           $("#edit_madin #catatan").val(data.catatan);
                        }
                        
                    });
                    break;
                  case "ijin_pulang":
                     $.ajax({
                        type:"get",
                        url:"{{route('pengurus-edit-perijinan')}}"+"?id="+id+"&type="+type,
                        success:function(data){
                            console.log(data);
                           $("#edit_pulang #perijinan_id").val(data.id);
                           $("#edit_pulang #tanggal_ijin").val(data.mulai_ijin);
                           $("#edit_pulang #tanggal_kembali").val(data.akhir_ijin);
                           $("#edit_pulang #alamat").val(data.alamat);
                           $("#edit_pulang #status").val(data.status);
                           $("#edit_pulang #catatan").val(data.catatan);
                           $("#edit_pulang #no_hp").val(data.no_hp);
                        }
                        
                    });
                    break;
                  case "ijin_kegiatan":
                  $.ajax({
                        type:"get",
                        url:"{{route('pengurus-edit-perijinan')}}"+"?id="+id+"&type="+type,
                        success:function(data){
                            console.log(data);
                           $("#edit_kegiatan #perijinan_id").val(data.id);
                           $("#edit_kegiatan #tanggal_ijin").val(data.mulai_ijin);
                           $("#edit_kegiatan #tanggal_kembali").val(data.akhir_ijin);
                           $("#edit_kegiatan #alasan").val(data.alasan);
                           $("#edit_kegiatan #status").val(data.status);
                           $("#edit_kegiatan #catatan").val(data.catatan);
                           $("#edit_kegiatan .after_upload").after(`<p> Sudah Melakukan Upload File <a href="{{asset('perijinan/')}}/${data.gambar}" target="_blank"> Download</a> </p>`);
                        }
                        
                    });
                  case "ijin_pulangmalam":
                   $.ajax({
                        type:"get",
                        url:"{{route('pengurus-edit-perijinan')}}"+"?id="+id+"&type="+type,
                        success:function(data){
                            console.log(data);
                           $("#edit_pulangmalam #perijinan_id").val(data.id);
                           $("#edit_pulangmalam #tanggal_ijin").val(data.mulai_ijin);
                           $("#edit_pulangmalam #time").val(data.mapel);
                           $("#edit_pulangmalam #alasan").val(data.alasan);
                           $("#edit_pulangmalam #status").val(data.status);
                           $("#edit_pulangmalam #catatan").val(data.catatan);
                        }
                        
                    });
                  break;

                    // code block
                }

            });
             </script>
@endsection