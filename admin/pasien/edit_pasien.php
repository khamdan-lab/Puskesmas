<?php include '../koneksi.php'; ?>
<?php 
	$ambil = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id = '$_GET[id]'");
	$pecah = mysqli_fetch_assoc($ambil);

?>
<div class="card">
	<div class="card-body">
		<h2 class="card-title">Edit Data Pasien</h2>
		<hr>
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="kepala_keluarga"> Kepala Keluarga </label>
					<select class="form-control" name="kepala_keluarga_id">
						<option style="display: none;"> Pilih Kepala Kelarga </option>
						<?php $ambil = mysqli_query($koneksi, "SELECT * FROM kepala_keluarga ORDER BY nama ASC") ?>
						<?php while ($tampil = mysqli_fetch_assoc($ambil)) { ?>
							<option value="<?php echo $pecah['kepala_keluarga_id']?>" <?php if ($tampil['id'] == $pecah['kepala_keluarga_id'] ) {
										echo "selected";
									} ?>><?php echo $tampil['nama']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for=""> Jenis Kelamin </label>
					<select class="form-control" name="jenis_kelamin">
						<option value="Laki-laki" <?php if ($pecah['jenis_kelamin'] == 'Laki-laki') {
														echo "selected";
													} ?>> Laki-laki </option>
						<option value="Perempuan" <?php if ($pecah['jenis_kelamin'] == 'Perempuan') {
														echo "selected";
													} ?>> Perempuan </option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=""> No Ktp </label>
					<input type="number" name="no_ktp" class="form-control" value="<?php echo $pecah['no_ktp']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for=""> Tanggal Lahir </label>
					<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $pecah['tanggal_lahir']; ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=""> Nama </label>
					<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for=""> Agama </label>
					<select class="form-control" name="agama">
						<option style="display: none;"> Pilih Agama </option>
						<option value="Islam" <?php if ($pecah['agama'] == 'Islam') {
													echo "selected";
												} ?>> Islam </option>
						<option value="Hindhu" <?php if ($pecah['agama'] == 'Hindhu') {
													echo "selected";
												} ?>> Hindhu </option>
						<option value="Budha" <?php if ($pecah['agama'] == 'Budha') {
													echo "selected";
												} ?>> Budha </option>
						<option value="Kristen" <?php if ($pecah['agama'] == 'Kristen') {
													echo "selected";
												} ?>> Kristen </option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=""> Pekerjaan </label>
					<input type="text" name="pekerjaan" class="form-control" value="<?php echo $pecah['pekerjaan']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for=""> Tinggi Badan </label>
					<input type="number" name="tinggi_badan" class="form-control" value="<?php echo $pecah['tinggi_badan']; ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=""> Alamat </label>
					<textarea rows="4" name="alamat" class="form-control"><?php echo $pecah['alamat']; ?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label for=""> Berat Badan </label>
					<input type="number" name="berat_badan" class="form-control" value="<?php echo $pecah['berat_badan']; ?>">
					<label> Pilih Jenis </label>
					<div class="form-group">
						<select class="form-control" name="jenis_pasien">
							<option value="BPJS" <?php if ($pecah['jenis_pasien'] == 'BPJS') {
														echo "selected";
													} ?>> BPJS </option>
							<option value="UMUM" <?php if ($pecah['jenis_pasien'] == 'UMUM') {
														echo "selected";
													} ?>> UMUM </option>
							
						</select>
					</div>
					<br>
					<div class="text-center">
						<button class="btn btn-primary" name="simpan"> Simpan </button>
						<a href="menu.php?halaman=pasien" class="btn btn-secondary"> Kembali </a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$no_ktp = $_POST['no_ktp'];
	$nama = $_POST['nama'];
	$nama_kp = $_POST['kepala_keluarga_id'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$tinggi = $_POST['tinggi_badan'];
	$berat = $_POST['berat_badan'];
	$pekerjaan = $_POST['pekerjaan'];
	$jenis = $_POST['jenis_pasien'];

	mysqli_query($koneksi, "UPDATE pasien SET no_ktp = '$no_ktp',nama = '$nama', kepala_keluarga_id = '$nama_kp',jenis_kelamin = '$jenis_kelamin',tanggal_lahir = '$tanggal_lahir',agama = '$agama',alamat = '$alamat',tinggi_badan = '$tinggi',berat_badan = '$berat',pekerjaan = '$pekerjaan',jenis_pasien = '$jenis' WHERE id = '$_GET[id]'");
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
	echo "<div class='alert alert-success text-center'> Data Berhasil Diupdate </div>";
}
?>