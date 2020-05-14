<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		
			<table class="table table-borderless">
			  <tbody>
			    <tr>
			      <th></th> 
			      <td class="text-center"><h5>Surat Perijinan {{$perijinan->type}}</h5><br>
			      		<p>Pondok Pesantren Wahid Hasyim Semarang</p>
			      </td>
			      <td></td>
			    </tr>
			  </tbody>
			</table>
	</center>
 
	<table class='table table-borderless'>
		<tbody class="text-left">
			<tr>
		      <td>Nama Santri</td>
		      <td>{{$profil->fullname}}</td>
		    </tr>
		    <tr>
		      <td>Jenis Ijin</td>
		      <td>{{$perijinan->type}}</td>
		    </tr>
		     <tr>
		      <td>Mulai Ijin</td>
		      <td>{{$perijinan->mulai_ijin}}</td>
		    </tr>
		    @if($perijinan->type=='ijin_madin')
		     <tr>
		      <td>Ijin Mapel</td>
		      <td>{{$perijinan->mapel}}</td>
		    </tr>
		    @elseif($perijinan->type=='ijin_kegiatan' || $perijinan->type=='ijin_pulang')
		     <tr>
		      <td>Tanggal Kembali</td>
		      <td>{{$perijinan->akhir_ijin}}</td>
		    </tr>
		    @endif
		    
		</tbody>
	</table>
 
</body>
</html>