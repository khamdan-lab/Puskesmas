<?php
include '../koneksi.php';
?>

<div class="card">
	<div class="card-body">
		<h2 class="card-title">Tambah Kepala Keluarga</h2>
		<hr>
		<form action="" method="POST" erctype="mutlipart/form-data">
			<div class="form-group">
				<label for="ktp"> No KTP </label>
				<input type="number" class="form-control" name="no_ktp" max_length="16">
			</div>
			<div class="form-group">
				<label for="nama"> Nama </label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label for="pekerjaan"> Pekerjaan </label>
				<input type="text" class="form-control" name="pekerjaan">
			</div>
			<div class="form-group">
				<label for="alamat"> Alamat </label>
				<textarea class="form-control" cols="3" name="alamat"></textarea>
			</div>
			<div class="form-group">
				<label for="jenis"> Jenis Kelamin </label>
				<select class="form-control" name="jenis_kelamin">
					<option style="display: none;"> Pilih Jenis Kelamin </option>
					<option value="Laki-laki"> Laki-laki </option>
					<option value="Perempuan"> Perempuan </option>
				</select>
			</div>
			<div class="form-group">
				<label for="tanggal'"> Tanggal lahir </label>
				<input type="date" name="tanggal_lahir" class="form-control">
			</div>
			<div class="form-group">
				<label for="agama"> Agama </label>
				<select class="form-control" id="agama" name="agama">
					<option style="display: none;"> Pilih Agama </option>
					<option value="Islam"> Islam </option>
					<option value="Budha"> Budha </option>
					<option value="Kristen"> Kristen </option>
					<option value="Hindhu"> Hindhu </option>
				</select>
			</div>
			<div class="form-group">
				<label for="tinggi"> Tinggi Badan </label>
				<input type="number" name="tinggi_badan" class="form-control">
			</div>
			<div class="form-group">
				<label for="berat"> Berat Badan </label>
				<input type="number" name="berat_badan" class="form-control">
			</div>
			<button class="btn btn-primary" name="simpan"> Simpan </button>
			<a href="menu.php?halaman=kepala_keluarga" class="btn btn-secondary"> Kembali </a>

		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {

	$no_ktp 	= $_POST['no_ktp'];
	$nama 		= $_POST['nama'];
	$jenis 		= $_POST['jenis_kelamin'];
	$tanggal 	= $_POST['tanggal_lahir'];
	$pekerjaan 	= $_POST['pekerjaan'];
	$agama	 	= $_POST['agama'];
	$alamat 	= $_POST['alamat'];
	$tinggi 	= $_POST['tinggi_badan'];
	$berat 		= $_POST['berat_badan'];

	mysqli_query($koneksi, "INSERT INTO kepala_keluarga (no_ktp, nama, jenis_kelamin, tanggal_lahir, pekerjaan, agama, alamat,tinggi_badan, berat_badan)
	VALUES('$no_ktp','$nama','$jenis','$tanggal','$pekerjaan','$agama','$alamat','$tinggi','$berat')");
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=kepala_keluarga'>";
	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
}


?>