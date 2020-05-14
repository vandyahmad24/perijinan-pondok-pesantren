<div class="modal fade" id="ijinkegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Ijin Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="{{route('create-perijinan')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
        <input type="hidden" name="id" value="{{Auth::user()->id}}">
        <input type="hidden" name="type" value="ijin_kegiatan">
		  <div class="form-group">
		    <label for="tanggal">Tanggal Ijin</label>
		    <input type="date" class="form-control" id="tanggal_ijin" name="tanggal_ijin">
		  </div>
		  <div class="form-group">
		    <label for="tanggal">Tanggal Selesai</label>
		    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
		  </div>
		  <div class="form-group">
		    <label for="alamat">Alasan</label>
		    <textarea class="form-control" id="alasan" rows="3" name="alasan"></textarea>
		  </div>
		  <div class="form-group">
		    <label for="tanggal">Upload Surat Kegiatan</label>
		    <input type="file" class="form-control" id="upload" name="upload">
		  </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>