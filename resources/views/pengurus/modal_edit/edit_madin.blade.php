<div class="modal fade" id="ijin_madin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Ijin Madin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('pengurus-put-perijinan')}}" id="edit_madin" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
        <input type="hidden" name="perijinan_id" id="perijinan_id">
        <input type="hidden" name="type" value="ijin_madin">
		  <div class="form-group">
		    <label for="tanggal">Tanggal Ijin</label>
		    <input type="date" class="form-control" id="edit_tanggal_ijin" name="tanggal" readonly>
		  </div>
		 <div class="form-group">
		    <label for="Mapel">Mata Pelajaran</label>
		    <select class="form-control" id="edit_mapel" name="mapel" readonly>
		    @foreach ($mapel as $map)
			 <option value="{{$map->nama}}">{{$map->nama}}</option>
			@endforeach
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="alasan">Alasan </label>
		    <select class="form-control" id="edit_alasan" name="alasan" readonly>
		      <option value="pulang">Pulang</option>
		      <option value="kegiatan">Kegiatan Kampus</option>
		    </select>
		  </div>
        <div class="form-group">
        <label for="status">Status </label>
        <select class="form-control" id="status" name="status">
          <option value="menunggu">Menunggu</option>
          <option value="setuju">di Setujui</option>
          <option value="tolak">di Tolak</option>
        </select>
      </div>
      <div class="form-group">
        <label for="catatan">Catatan</label>
        <input type="text" class="form-control" name="catatan" id="catatan">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Buat Perijinan</button>
      </div>
      </form>
    </div>
  </div>
</div>