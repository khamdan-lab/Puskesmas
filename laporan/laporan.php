<?php include '../koneksi.php';

$id = $_GET ['id'];

$ambil = mysqli_query($koneksi,"SELECT * FROM rekam WHERE id_rekam = '$_GET[id]'");
$tampil = mysqli_fetch_assoc($ambil);
$gabung = mysqli_query($koneksi,"SELECT * FROM rekam INNER JOIN pasien ON rekam.pasien = pasien.nama WHERE id_rekam = '$id'");
$satu = mysqli_fetch_assoc($gabung);

if (!isset($id)) {
	echo "<script>alert('Belum Memilih Data')</script>";
	echo "<script>location='menu.php?halaman=info'</script>";
}
 ?>
 <h2> Detail Laporan </h2>
 <table class="table table-borderless col-md-5">
 	<tr>
 		<td> Nama Pasien </td>
 		<td> : </td>
 		<td><?php echo $satu ['nama']; ?></td>
 	</tr>
 	<tr>
 		<td> Tanggal Berobat </td>
 		<td> : </td>
 		<td><?php echo $tampil ['tanggal']; ?></td>
 	</tr>
 	<tr>
 		<td> Penyakit Yang Di Di Derita </td>
 		<td> : </td>
 		<td><?php echo $tampil ['diagnosa']; ?></td>
 	</tr>
 </table>
<label><strong> Keterangan Obat </strong></label>
<table class="table table-bordered">
	<tr>
		<th> Obat </th>
		<th> Jenis Obat </th>
		<th> Keterangan </th>
	</tr>
	<tr>
		<td><?php echo $tampil ['obat']; ?></td>
		<td><?php echo $tampil ['jenis_obat']; ?></td>
		<td><?php echo $tampil ['keterangan']; ?></td>
	</tr>
	
</table>