<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Rekam </h2>
<?php $ambil = mysqli_query($koneksi,"SELECT * FROM rekam WHERE id = '$_GET[id]'");
	  $tampil = mysqli_fetch_assoc($ambil);
?>
<form method="POST" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label> Tanggal </label>
		<input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly="">
	</div>
	<div class="form-group">
		<label> Pasien </label>
		<input type="text" name="pasien" value="<?php echo $tampil ['pasien'] ?>" class="form-control" readonly="">
	</div>
	<div class="form-group">
		<label> Jenis Pasien </label>
		<input type="text" name="jenis_pasien" value="<?php echo $tampil ['jenis_pasien'] ?>" class="form-control" readonly="">
	</div>
	<div class="form-group">
		<label> Diagnosa </label>
		<textarea class="form-control" name="diagnosa" rows="4"></textarea>
	</div>
	<button class="btn btn-primary" name="proses"> Tambah Resep </button><br>
	<br><?php if (isset($_POST ['proses'])) {?>
	<div class="form-row">
		<div class="form-group col-md-4">
			<select name="obat" class="form-control">
				<option style="display: none;">Pilih Obat</option>
				<?php $ambil = mysqli_query($koneksi,"SELECT * FROM obat ORDER BY obat ASC") ?>
				<?php while ($obat = mysqli_fetch_assoc($ambil)) {?>
					<option><?php echo $obat ['obat']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-4">
			<select name="jenis_obat" class="form-control">
				<option style="display: none;">Pilih Jenis Obat</option>
				<?php $ambil = mysqli_query($koneksi,"SELECT * FROM obat ORDER BY jenis_obat ASC") ?>
				<?php while ($obat = mysqli_fetch_assoc($ambil)) {?>
					<option><?php echo $obat ['jenis_obat']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-4">
			<input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
		</div>
	</div>
	<?php } ?>
	<button class="btn btn-success" name="rekam"> Periksa </button>
	<a href="menu.php?halaman=info" class="btn btn-warning"> Kembali </a>
</form>
 <?php if (isset($_POST['rekam'])) {
	$tanggal = $_POST ['tanggal'];
	$pasien = $_POST ['pasien'];
	$jenis_pasien = $_POST ['jenis_pasien'];
	$diagnosa = $_POST ['diagnosa'];
	$obat = $_POST ['obat'];
	$jenis_obat = $_POST ['jenis_obat'];
	$keterangan = $_POST ['keterangan'];

	print_r($_POST);

	mysqli_query($koneksi,"UPDATE rekam SET tanggal = '$tanggal' , pasien = '$pasien', jenis_pasien = '$jenis_pasien', diagnosa = '$diagnosa', obat = '$obat', jenis_obat = '$jenis_obat', keterangan = '$keterangan', status_pasien = 'Telah Di Periksa' WHERE id = '$_GET[id]'");
	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
	echo "<script>location='menu.php?halaman=info'</script>";

} ?>

