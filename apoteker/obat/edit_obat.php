<?php include '../koneksi.php'; ?>
<?php $ambil = mysqli_query($koneksi, "SELECT * FROM obat WHERE id = '$_GET[id]'");
$tampil = mysqli_fetch_assoc($ambil);
?>
<div class="card">
	<div class="card-body">
		<h2 class="card-title">Edit Data Obat</h2>
		<hr>
		<form method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label> Nama Obat </label>
						<input type="text" name="obat" class="form-control" value="<?php echo $tampil['obat'] ?>">
						<label for="">Jenis Obat</label>
						<select name="jenis_obat" class="form-control">
							<option style="display: none;"> Pilih Jenis Obat</option>
							<option value="Tube" <?php if ($tampil['jenis_obat'] == 'Tube') {
														echo "selected";
													} ?>>Tube</option>
							<option value="Botol" <?php if ($tampil['jenis_obat'] == 'Botol') {
														echo "selected";
													} ?>>Botol</option>
							<option value="Sachet" <?php if ($tampil['jenis_obat'] == 'Sachet') {
														echo "selected";
													} ?>>Sachet</option>
							<option value="Kaplet" <?php if ($tampil['jenis_obat'] == 'Kaplet') {
														echo "selected";
													} ?>>Kaplet</option>
							<option value="Tablet" <?php if ($tampil['jenis_obat'] == 'Tablet') {
														echo "selected";
													} ?>>Tablet</option>
						</select>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label> Stok Obat </label>
						<input type="number" class="form-control" name="stok_obat" value="<?php echo $tampil['stok_obat'] ?>">
						<label> Tanggal Kadaluarsa </label>
						<input type="date" name="tanggal_kadarluasa" class="form-control" value="<?php echo $tampil['tanggal_kadarluasa'] ?>">
					</div>
				</div>
			</div>
			<button class="btn btn-primary" name="tambah"> Update </button>
			<a href="menu.php?halaman=obat" class="btn btn-secondary"> Kembali </a>
		</form>
	</div>
</div>

<?php if (isset($_POST['tambah'])) {
	$nama = $_POST['obat'];
	$jenis = $_POST['jenis_obat'];
	$stok = $_POST['stok_obat'];
	$tanggal = $_POST['tanggal_kadarluasa'];

	mysqli_query($koneksi, "UPDATE obat SET obat = '$nama' , jenis_obat = '$jenis' , stok_obat = '$stok' , tanggal_kadarluasa = '$tanggal' WHERE id = '$_GET[id]'");

	echo "<div class='alert alert-success'> Data Berhasil Di Update </div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=obat'>";
}
?>