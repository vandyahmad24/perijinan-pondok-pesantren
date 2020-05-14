<div class="modal fade" id="ijin_pulangmalam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Ijin Pulang Malam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('santri-put-perijinan')}}" id="edit_pulangmalam" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="perijinan_id" id="perijinan_id">
        <input type="hidden" name="type" value="ijin_pulangmalam">
		  <div class="form-group">
		    <label for="tanggal_ijin">Tanggal Ijin</label>
		    <input type="date" class="form-control" id="tanggal_ijin" name="tanggal">
		  </div>
		  <div class="form-group">
		    <label for="time">Jam Pulang</label>
		    <input type="time" id="time" name="time" class="form-control">
		  </div>
		  <div class="form-group">
		    <label for="alasan">Alasan</label>
		    <textarea class="form-control" id="alasan" rows="3" name="alasan"></textarea>
		  </div>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Buat Ijin</button>
      </div>
        </form>
    </div>
  </div>
</div>