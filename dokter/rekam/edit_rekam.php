<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Edit Data Rekam </h2>
<?php $ambil = mysqli_query($koneksi,"SELECT * FROM rekam WHERE id_rekam = '$_GET[id]'");
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
		<input type="text" name="jenis" value="<?php echo $tampil ['jenis'] ?>" class="form-control" readonly="">
	</div>
	<div class="form-group">
		<label> Diagnosa </label>
		<textarea class="form-control" name="diagnosa" rows="4"><?php echo $tampil ['diagnosa']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="proses"> Tambah Resep </button><br>
	<br><?php if (isset($_POST ['proses'])) {?>
	<div class="form-row">
		<div class="form-group col-md-4">
			<select name="obat" class="form-control">
				<option>---Obat---</option>
				<?php $ambil = mysqli_query($koneksi,"SELECT * FROM obat ORDER BY nama_obat ASC") ?>
				<?php while ($obat = mysqli_fetch_assoc($ambil)) {?>
					<option <?php if ($obat ['nama_obat'] == $tampil ['obat']) {
						echo "selected";
					} ?>><?php echo $obat ['nama_obat']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-4">
			<select name="jenis_obat" class="form-control">
				<option>---Jenis Obat---</option>
				<?php $ambil = mysqli_query($koneksi,"SELECT * FROM obat ORDER BY jenis_obat ASC") ?>
				<?php while ($obat = mysqli_fetch_assoc($ambil)) {?>
					<option <?php if ($obat ['jenis_obat'] == $tampil ['jenis_obat']) {
						echo "selected";
					} ?>><?php echo $obat ['jenis_obat']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-4">
			<input type="text" name="keterangan" placeholder="Keterangan" value="<?php echo $tampil ['keterangan'] ?>" class="form-control">
		</div>
	</div>
	<?php } ?>
	<button class="btn btn-success" name="rekam"> Update </button>
	<a href="menu.php?halaman=info" class="btn btn-warning"> Kembali </a>
</form>
<?php if (isset($_POST['rekam'])) {
	$tanggal = $_POST ['tanggal'];
	$pasien = $_POST ['pasien'];
	$jenis = $_POST ['jenis'];
	$diagnosa = $_POST ['diagnosa'];
	$obat = $_POST ['obat'];
	$jenis_obat = $_POST ['jenis_obat'];
	$keterangan = $_POST ['keterangan'];

	mysqli_query($koneksi,"UPDATE rekam SET tanggal = '$tanggal' , pasien = '$pasien', jenis = '$jenis', diagnosa = '$diagnosa', obat = '$obat', jenis_obat = '$jenis_obat', keterangan = '$keterangan', status = 'Telah Di Periksa' WHERE id_rekam = '$_GET[id]'");
	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";

} ?>
