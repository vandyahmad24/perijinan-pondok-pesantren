<form action="{{route('put-perijinan')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
<input type="hidden" name="id" value="{{Auth::user()->id}}">
<input type="hidden" name="perijinan_id" value="{{$perijinan->id}}">
<div class="form-group">
    <label for="name">Tujuan Ijin</label>
<input type="text" class="form-control" value="{{$perijinan->tujuan}}" name="tujuan" id="tujuan" placeholder="Tujuan Ijin">
</div>
<div class="form-group">
    <label for="name">Tanggal Ijin</label>
    <input type="date" name="mulai_ijin" value="{{$perijinan->mulai_ijin}}" class="form-control">
</div>
<div class="form-group">
    <label for="name">Tanggal Selesai</label>
    <input type="date" name="akhir_ijin" value="{{$perijinan->akhir_ijin}}"  class="form-control">
</div>
<div class="form-group">
    <label for="name">Alasan Ijin</label>
    <textarea class="form-control" name="alasan" id="exampleFormControlTextarea1" rows="3"> {{$perijinan->alasan}} </textarea>
</div>
<div class="form-group">
    <label for="name">Nomer Hp</label>
    <input type="text" class="form-control" value="{{$perijinan->no_hp}}"  name="no_hp" id="no_hp" placeholder="Nomer Hp">
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>