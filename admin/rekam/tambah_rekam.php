<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Rekam </h2>
<?php $ambil = mysqli_query($koneksi,"SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
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
		<input type="text" name="jenis" value="<?php echo $tampil ['jenis'] ?>" class="form-control" readonly="">
	</div>
	<button class="btn btn-success" name="rekam"> Rekam </button>
	<a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali </a>
</form>
<?php if (isset($_POST['rekam'])) {
	$tanggal = $_POST ['tanggal'];
	$pasien = $_POST ['pasien'];
	$jenis = $_POST ['jenis'];

	mysqli_query($koneksi,"INSERT INTO rekam (tanggal,pasien,jenis,status) VALUES ('$tanggal','$pasien','$jenis','Belum Di Periksa')");
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";

} ?>
