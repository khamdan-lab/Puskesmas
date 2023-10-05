<?php include '../koneksi.php'; ?>
<div class="card">
	<div class="card-body">
		<h2 class="card-title">Tambah Obat</h2>
		<hr>
		<form method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label> Nama Obat </label>
						<input type="text" name="obat" class="form-control">
						<label for=""> Jenis Obat </label>
						<select name="jenis_obat" class="form-control">
							<option style="display: none;"> Pilih Jenis Obat </option>
							<option value="Tube">Tube</option>
							<option value="Botol">Botol</option>
							<option value="Sachet">Sachet</option>
							<option value="Kaplet">Kaplet</option>
							<option value="Tablet">Tablet</option>
						</select>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label> Stok Obat </label>
						<input type="number" class="form-control" name="stok_obat">
						<label> Tanggal Kadaluarsa </label>
						<input type="date" name="tanggal_kadarluasa" class="form-control">
					</div>
				</div>
			</div>
			<button class="btn btn-primary" name="tambah"> Simpan </button>
			<a href="menu.php?halaman=obat" class="btn btn-secondary"> Kembali </a>
		</form>
	</div>
</div>

<?php if (isset($_POST['tambah'])) {
	$nama = $_POST['obat'];
	$jenis = $_POST['jenis_obat'];
	$stok = $_POST['stok_obat'];
	$tanggal = $_POST['tanggal_kadarluasa'];

	mysqli_query($koneksi, "INSERT INTO obat (obat,jenis_obat,stok_obat,tanggal_kadarluasa)VALUES('$nama','$jenis','$stok','$tanggal')");
	echo "<div class='alert alert-success'> Data Berhasil Di Tambah </div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=obat'>";
}
?>