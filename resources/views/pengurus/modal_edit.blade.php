<div class="panel panel-white">
    <div class="panel-heading clearfix">
    <h4 class="panel-title">Edit Pengurus {{$profiles->user->name}}</h4>
    </div>
    <div class="panel-body">
        <form action="{{route('post-pengurus')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}                        
        <input type="hidden" name="id" value="{{$profiles->id}}">
        <div class="form-group">
            <label for="name">Nama</label>
        <input type="text" class="form-control" value="{{$profiles->user->name}}" name="name" id="name" placeholder="name">
        </div>
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" id="fullname" name="fullname" value="{{$profiles->fullname}}" class="form-control" placeholder="fullname">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="{{$profiles->user->email}}" name="email" placeholder="email" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">Pilih Jenis Kelamin</option>
                
                <option value="laki-laki" @if($profiles->jenis_kelamin=='laki-laki') selected @endif >laki-laki</option>
                
                <option value="perempuan"  @if($profiles->jenis_kelamin=='perempuan') selected @endif >perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <select name="provinsi" id="provinsi" class="form-control provinsi">
                @foreach ($province as $prov)
                <option value="{{$prov->name}}"
                    @if ($profiles['provinsi'] == $prov->name)
                        selected
                    @endif>
                    {{$prov->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="kabupaten">Kabupaten / Kota</label>
            <select name="kabupaten" id="kabupaten" id="kabupaten" class="form-control kabupaten">
               
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
        <input type="text" id="alamat" value="{{$profiles->alamat}}" name="alamat" class="form-control" placeholder="alamat">
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
        {{-- <input type="file" name="foto" id="foto" class="form-control" /><span>{{$profiles->foto}}</span> --}}
        <input type="file" name="foto" id="foto" class="form-control" /> 
        <br>
        <img src="{{ asset('foto/'.$profiles->foto) }}" id="showgambar" style="max-width:1500px;max-height:150px;float:left;" />
        </div>
        <div class="modal-footer mt-5">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ganti Data</button>
          </div>
    </form>
       
        </div>
    </div>
</div>



<script>
  
  $('.kabupaten').append(` <option value="{{$profiles->kabupaten}}">{{$profiles->kabupaten}}</option>`);
  
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
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#foto").change(function(){
        $("#showgambar").empty();
        readURL(this);
    });

</script>