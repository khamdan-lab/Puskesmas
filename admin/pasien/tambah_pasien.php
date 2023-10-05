<?php include '../koneksi.php'; ?>
<div class="card">
	<div class="card-body">
		<h2 class="card-title">Tambah Data Pasien</h2>
		<hr>
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="kepala_keluarga"> Kepala Keluarga </label>
					<select class="form-control" name="kepala_keluarga_id">
						<option> Pilih Kepala Kelarga </option>
						<?php $ambil = mysqli_query($koneksi, "SELECT * FROM kepala_keluarga ORDER BY nama ASC") ?>
						<?php while ($tampil = mysqli_fetch_assoc($ambil)) { ?>
							<option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for=""> Jenis Kelamin </label>
					<select class="form-control" name="jenis_kelamin">
						<option value="Laki-laki"> Laki-laki </option>
						<option value="Perempuan"> Perempuan </option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=""> No Ktp </label>
					<input type="number" name="no_ktp" max_length="16" class="form-control">
				</div>
				<div class="form-group col-md-6">
					<label for=""> Tanggal Lahir </label>
					<input type="date" name="tanggal_lahir" class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=""> Nama </label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="form-group col-md-6">
					<label for=""> Agama </label>
					<select class="form-control" name="agama">
						<option> Pilih Agama </option>
						<option value="Islam"> Islam </option>
						<option value="Hindhu"> Hindhu </option>
						<option value="Budha"> Budha </option>
						<option value="Kristen"> Kristen </option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=""> Pekerjaan </label>
					<input type="text" name="pekerjaan" class="form-control">
				</div>
				<div class="form-group col-md-6">
					<label for=""> Tinggi Badan </label>
					<input type="number" name="tinggi_badan" class="form-control">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=""> Alamat </label>
					<textarea rows="4" name="alamat" class="form-control"></textarea>
				</div>
				<div class="form-group col-md-6">
					<label for=""> Berat Badan </label>
					<input type="number" name="berat_badan" class="form-control">
					<label> Pilih Jenis </label>
					<div class="form-group">
						<select class="form-control" name="jenis_pasien">
							<option style="display:none" value=""></option>
							<option value="BPJS"> BPJS </option>
							<option value="UMUM"> UMUM </option>
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
	$pekerjaan_pasien = $_POST['pekerjaan'];
	$jenis = $_POST['jenis_pasien'];

	echo "no ktp" . $no_ktp;
	echo "nama" . $nama;
	echo "nama_kp" . $nama_kp;
	echo "jenis kelamin" . $jenis_kelamin;
	echo "tanggal_lahir" . $tanggal_lahir;
	echo "agama" . $agama;
	echo "alamat" . $alamat;
	echo "tinggi" . $tinggi;
	echo "berat" . $berat;
	echo "jenis" . $jenis;

	mysqli_query($koneksi, "INSERT INTO pasien (no_ktp,nama,kepala_keluarga_id
			,jenis_kelamin,tanggal_lahir,agama,alamat,tinggi_badan,berat_badan,pekerjaan,jenis_pasien)VALUES('$no_ktp','$nama','$nama_kp','$jenis_kelamin','$tanggal_lahir','$agama','$alamat','$tinggi','$berat','$pekerjaan_pasien','$jenis')");
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
}

?>