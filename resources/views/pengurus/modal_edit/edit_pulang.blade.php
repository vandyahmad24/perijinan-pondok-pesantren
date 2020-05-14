<div class="modal fade" id="ijin_pulang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Ijin Pulang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('pengurus-put-perijinan')}}" id="edit_pulang" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
        <input type="hidden" name="perijinan_id" id="perijinan_id">
        <input type="hidden" name="type" value="ijin_pulang">
		  <div class="form-group">
		    <label for="tanggal">Tanggal Ijin</label>
		    <input type="date" class="form-control" id="tanggal_ijin" name="tanggal_ijin" readonly>
		  </div>
		    <div class="form-group">
		    <label for="tanggal">Tanggal Kembali</label>
		    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" readonly>
		  </div>
		  <div class="form-group">
		    <label for="alamat">Alamat</label>
		    <textarea class="form-control" id="alamat" rows="3" name="alamat" readonly></textarea>
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
        <label for="no_hp">No HP Orang tua</label>
        <input type="number" class="form-control" id="no_hp" name="no_hp" readonly>
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