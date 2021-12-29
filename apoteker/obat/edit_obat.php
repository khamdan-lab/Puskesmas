<?php include '../koneksi.php'; ?>

<h2 class="text-center"> Edit Obat </h2>
<?php $ambil = mysqli_query($koneksi,"SELECT * FROM obat WHERE id_obat = '$_GET[id]'");
      $tampil = mysqli_fetch_assoc($ambil);
 ?>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group col-md-4">
		<label> Nama Obat </label>
		<input type="text" name="nama_obat" class="form-control" value="<?php echo $tampil ['nama_obat'] ?>">
	</div>
	<div class="form-group col-md-4">
		<select name="jenis_obat" class="form-control">
			<option value="Belum Di isi"> ---Jenis Obat--- </option>
			<option value="Tube" <?php if ($tampil ['jenis_obat'] == 'Tube') {
				echo "selected";
			} ?>>Tube</option>
			<option value="Botol" <?php if ($tampil ['jenis_obat'] == 'Botol') {
				echo "selected";
			} ?>>Botol</option>
			<option value="Sachet" <?php if ($tampil ['jenis_obat'] == 'Sachet') {
				echo "selected";
			} ?>>Sachet</option>
			<option value="Kaplet" <?php if ($tampil ['jenis_obat'] == 'Kaplet') {
				echo "selected";
			} ?>>Kaplet</option>
			<option value="Tablet" <?php if ($tampil ['jenis_obat'] == 'Tablet') {
				echo "selected";
			} ?>>Tablet</option>
		</select>
	</div>
	<div class="form-group col-md-4">
		<label> Stok Obat </label>
		<input type="number" class="form-control" name="stok_obat" value="<?php echo $tampil ['stok_obat'] ?>">
	</div>
	<div class="form-group col-md-4">
		<label> Tanggal Kadaluarsa </label>
		<input type="date" name="tanggal_kadaluarsa" class="form-control" value="<?php echo $tampil ['tanggal_kadaluarsa'] ?>">
	</div>
	<button class="btn btn-primary" name="tambah"> Update Obat </button>
	<a href="menu.php?halaman=obat" class="btn btn-warning"> Kembali </a>
</form>
<?php if (isset($_POST ['tambah'])) {
	$nama = $_POST['nama_obat'];
	$jenis = $_POST['jenis_obat'];
	$stok = $_POST['stok_obat'];
	$tanggal = $_POST['tanggal_kadaluarsa'];

	mysqli_query($koneksi,"UPDATE obat SET nama_obat = '$nama' , jenis_obat = '$jenis' , stok_obat = '$stok' , tanggal_kadaluarsa = '$tanggal' WHERE id_obat = '$_GET[id]'");

	echo "<div class='alert alert-success'> Data Berhasil Di Update </div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=obat'>";

}
 ?>
