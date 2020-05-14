<div class="modal fade" id="ijinpulang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Ijin Pulang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
  <thead class="thead-success">
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal Pulang</th>
      <th scope="col">Tanggal Kembali</th>
      <th scope="col">Alamat</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pulang as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$item->user->name}}</td>
      <td>{{$item->mulai_ijin}}</td>
      <td>{{$item->akhir_ijin}}</td>
      <td>{{$item->alamat}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>