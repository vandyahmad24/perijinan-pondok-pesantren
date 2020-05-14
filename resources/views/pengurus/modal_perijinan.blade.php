<div class="panel panel-white">
    <div class="panel-heading clearfix">
    <h4 class="panel-title">Detail Data {{$perijinan->user->name}}</h4>
    </div>
    <div class="panel-body">
    <form action="{{route('put-perijinan')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}                        
        <input type="hidden" name="id" value="{{$perijinan->id}}">
        <input type="hidden" name="user_id" value="{{$perijinan->user_id}}">
        <div class="form-group">
            <label for="name">Nama</label>
        <input type="text" class="form-control" value="{{$perijinan->user->name}}" name="name" id="name" readonly>
        </div>
        <div class="form-group">
            <label for="name">Tujuan</label>
        <input type="text" class="form-control" value="{{$perijinan->tujuan}}" name="tujuan" id="name" readonly>
        </div>
        <div class="form-group">
            <label for="name">Alasan</label>
        <input type="text" class="form-control" value="{{$perijinan->alasan}}" name="alasan" id="name" readonly>
        </div>
        <div class="form-group">
            <label for="name">Mulai Ijin</label>
        <input type="date" class="form-control" value="{{$perijinan->mulai_ijin}}" name="mulai_ijin"  >
        </div>
        <div class="form-group">
            <label for="name">Waktu Kembali</label>
        <input type="date" class="form-control" value="{{$perijinan->akhir_ijin}}" name="akhir_ijin">
        </div>
        <div class="form-group">
            <label for="name">No Hp</label>
        <input type="text" class="form-control" value="{{$perijinan->no_hp}}" name="no_hp" id="name" readonly>
        </div>
        <div class="form-group">
            <label for="name">Status</label>
            <select class="form-control" name="status">
                <option value="menunggu" @if($perijinan->status == 'menunggu') selected @endif >Menunggu</option>
                <option value="setuju" @if($perijinan->status == 'setuju') selected @endif >Di Setuju</option>
                <option value="tolak" @if($perijinan->status == 'setuju') selected @endif >Di Tolak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Status</label>
            <textarea name="catatan" cols="30" rows="10" class="form-control" ></textarea>
        </div>
       
        <div class="modal-footer mt-5">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Rubah Data</button>
          </div>
    </form>
       
        </div>
    </div>
</div>



