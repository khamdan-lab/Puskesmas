<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Tambah Data Pasien </h2>
<form method="POST" action="" enctype="multipart/form-data">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="kepala_keluarga"> Kepala Keluarga </label>
			<select class="form-control" name="kepala_keluarga">
				<option> Pilih Kepala Kelarga </option>
				<?php $ambil = mysqli_query($koneksi,"SELECT * FROM kepala_keluarga ORDER BY nama ASC") ?>
				<?php while ($tampil = mysqli_fetch_assoc($ambil)) { ?>
					<option><?php echo $tampil ['nama']; ?></option>
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
			<input type="number" name="no_ktp" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label for=""> Tanggal Lahir </label>
			<input type="date" name="tanggal" class="form-control">
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
			<input type="text" name="pekerjaan_pasien" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<label for=""> Tinggi Badan </label>
			<input type="number" name="tinggi" class="form-control">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for=""> Alamat </label>
			<textarea rows="4" name="alamat" class="form-control"></textarea>
		</div>
		<div class="form-group col-md-6">
			<label for=""> Berat Badan </label>
			<input type="number" name="berat" class="form-control">
			<label> Pilih Jenis </label>
				<div class="form-group">
					<select class="form-control" name="jenis_pasien">
						<option value="BPJS"> BPJS </option>
						<option value="1"> CONTOH1 </option>
						<option value="2"> CONTOH2 </option>
						<option value="3"> CONTOH3 </option>
					</select>
				</div>
				<br>
				<div class="text-center">
					<button class="btn btn-primary" name="simpan"> Simpan </button>
					<a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali </a>
				</div>
		</div>
	</div>

</form>
<?php 
	if (isset($_POST['simpan'])) {
		$no_ktp = $_POST ['no_ktp'];
		$nama = $_POST ['nama'];
		$nama_kp = $_POST ['kepala_keluarga'];
		$jenis_kelamin = $_POST ['jenis_kelamin'];
		$tanggal_lahir = $_POST ['tanggal'];
		$agama = $_POST ['agama'];
		$alamat = $_POST ['alamat'];
		$tinggi = $_POST ['tinggi'];
		$berat = $_POST ['berat'];
		$pekerjaan_pasien = $_POST ['pekerjaan_pasien'];
		$jenis = $_POST ['jenis_pasien'];

		mysqli_query($koneksi,"INSERT INTO pasien (no_ktp,nama,nama_kp
			,jenis_kelamin,umur,agama,alamat,tinggi,berat,pekerjaan,jenis)VALUES('$no_ktp','$nama','$nama_kp','$jenis_kelamin','$tanggal_lahir','$agama','$alamat','$tinggi','$berat','$pekerjaan_pasien','$jenis')");
		echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
		echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
	}

 ?>