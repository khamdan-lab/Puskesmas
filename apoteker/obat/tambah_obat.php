<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Tambah Obat </h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group col-md-4">
		<label> Nama Obat </label>
		<input type="text" name="nama_obat" class="form-control">
	</div>
	<div class="form-group col-md-4">
		<select name="jenis_obat" class="form-control">
			<option value="Belum Di isi"> ---Jenis Obat--- </option>
			<option value="Tube">Tube</option>
			<option value="Botol">Botol</option>
			<option value="Sachet">Sachet</option>
			<option value="Kaplet">Kaplet</option>
			<option value="Tablet">Tablet</option>
		</select>
	</div>
	<div class="form-group col-md-4">
		<label> Stok Obat </label>
		<input type="number" class="form-control" name="stok_obat">
	</div>
	<div class="form-group col-md-4">
		<label> Tanggal Kadaluarsa </label>
		<input type="date" name="tanggal_kadaluarsa" class="form-control">
	</div>
	<button class="btn btn-primary" name="tambah"> Tambah Obat </button>
	<a href="menu.php?halaman=obat" class="btn btn-warning"> Kembali </a>
</form>
<?php if (isset($_POST ['tambah'])) {
	$nama = $_POST['nama_obat'];
	$jenis = $_POST['jenis_obat'];
	$stok = $_POST['stok_obat'];
	$tanggal = $_POST['tanggal_kadaluarsa'];

	mysqli_query($koneksi,"INSERT INTO obat (nama_obat,jenis_obat,stok_obat,tanggal_kadaluarsa)VALUES('$nama','$jenis','$stok','$tanggal')");
	echo "<div class='alert alert-success'> Data Berhasil Di Tambah </div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=obat'>";
}
 ?>
