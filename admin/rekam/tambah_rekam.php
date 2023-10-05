<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Rekam </h2>
<?php $ambil = mysqli_query($koneksi,"SELECT * FROM pasien WHERE id = '$_GET[id]'");
	  $tampil = mysqli_fetch_assoc($ambil);
?>
<form method="POST" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label> Tanggal </label>
		<input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly="">
	</div>
	<div class="form-group">
		<label> Pasien </label>
		<input type="text" name="pasien" value="<?php echo $tampil ['nama'] ?>" class="form-control" readonly="">
	</div>
	<div class="form-group">
		<label> Jenis Pasien </label>
		<input type="text" name="jenis_pasien" value="<?php echo $tampil ['jenis_pasien'] ?>" class="form-control" readonly="">
	</div>
	<input type="hidden" name="diagnosa" value="">
	<input type="hidden" name="status_pasien" value="Belum Di Periksa">
	<button class="btn btn-success" name="rekam"> Rekam </button>
	<a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali </a>
</form>
<?php if (isset($_POST['rekam'])) {
	$pasien = $_POST ['pasien'];  
	$tanggal = $_POST ['tanggal'];
	$diagnosa = $_POST ['diagnosa'];
	$jenis_pasien = $_POST ['jenis_pasien'];
	$status_pasien = $_POST['status_pasien'];

	mysqli_query($koneksi,"INSERT INTO rekam (pasien,tanggal,diagnosa,jenis_pasien,status_pasien) VALUES ('$pasien','$tanggal','$diagnosa','$jenis_pasien','$status_pasien')");
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";

} ?>
