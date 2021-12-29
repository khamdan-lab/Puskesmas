<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Edit Data Pasien </h2>
<?php $ambil = mysqli_query($koneksi,"SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
	  $pecah = mysqli_fetch_assoc($ambil);

 ?>
<form method="POST" action="" enctype="multipart/form-data">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="kepala_keluarga"> Kepala Keluarga </label>
			<select class="form-control" name="kepala_keluarga">
				<option> Pilih Kepala Kelarga </option>
				<?php $ambil = mysqli_query($koneksi,"SELECT * FROM kepala_keluarga ORDER BY nama ASC") ?>
				<?php while ($tampil = mysqli_fetch_assoc($ambil)) { ?>
					<option <?php if ($pecah['nama_kp']) {
						echo "selected";
					} ?>><?php echo $tampil ['nama']; ?></option>
					<?php } ?>
			</select>
		</div>
		<div class="form-group col-md-6">
			<label for=""> Jenis Kelamin </label>
			<select class="form-control" name="jenis_kelamin">
				<option value="Laki-laki" <?php if ($pecah ['jenis_kelamin'] = 'Laki-laki') {
					echo "selected";
				} ?>> Laki-laki </option>
				<option value="Perempuan" <?php if ($pecah ['jenis_kelamin'] = 'Perempuan') {
					echo "selected";
				} ?>> Perempuan </option>
			</select>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for=""> No Ktp </label>
			<input type="number" name="no_ktp" class="form-control" value="<?php echo $pecah ['no_ktp']; ?>">
		</div>
		<div class="form-group col-md-6">
			<label for=""> Tanggal Lahir </label>
			<input type="date" name="tanggal" class="form-control" value="<?php echo $pecah ['umur']; ?>">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for=""> Nama </label>
			<input type="text" name="nama" class="form-control" value="<?php echo $pecah ['nama']; ?>">
		</div>
		<div class="form-group col-md-6">
			<label for=""> Agama </label>
			<select class="form-control" name="agama">
				<option> Pilih Agama </option>
				<option value="Islam" <?php if ($pecah ['agama'] = 'Islam') {
					echo "selected";
				} ?>> Islam </option>
				<option value="Hindhu" <?php if ($pecah ['agama'] = 'Hindhu') {
					echo "selected";
				} ?>> Hindhu </option>
				<option value="Budha" <?php if ($pecah ['agama'] = 'Budha') {
					echo "selected";
				} ?>> Budha </option>
				<option value="Kristen" <?php if ($pecah ['agama'] = 'Kristen') {
					echo "selected";
				} ?>> Kristen </option>
			</select>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for=""> Pekerjaan </label>
			<input type="text" name="pekerjaan" class="form-control" value="<?php echo $pecah ['pekerjaan']; ?>">
		</div>
		<div class="form-group col-md-6">
			<label for=""> Tinggi Badan </label>
			<input type="number" name="tinggi" class="form-control" value="<?php echo $pecah ['tinggi']; ?>">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for=""> Alamat </label>
			<textarea rows="4" name="alamat" class="form-control"><?php echo $pecah ['alamat']; ?></textarea>
		</div>
		<div class="form-group col-md-6">
			<label for=""> Berat Badan </label>
			<input type="number" name="berat" class="form-control" value="<?php echo $pecah ['berat']; ?>">
			<label> Pilih Jenis </label>
				<div class="form-group">
					<select class="form-control" name="jenis_pasien">
						<option value="BPJS" <?php if ($pecah ['jenis'] = 'BPJS') {
					echo "selected";
				} ?>> BPJS </option>
						<option value="1" <?php if ($pecah ['jenis'] = '1') {
					echo "selected";
				} ?>> CONTOH1 </option>
						<option value="2" <?php if ($pecah ['jenis'] = '2') {
					echo "selected";
				} ?>> CONTOH2 </option>
						<option value="3" <?php if ($pecah ['jenis'] = '3') {
					echo "selected";
				} ?>> CONTOH3 </option>
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
		$pekerjaan = $_POST ['pekerjaan'];
		$jenis = $_POST ['jenis_pasien'];

		mysqli_query($koneksi,"UPDATE pasien SET no_ktp = '$no_ktp',nama = '$nama',nama_kp = '$nama_kp',jenis_kelamin = '$jenis_kelamin',umur = '$tanggal_lahir',agama = '$agama',alamat = '$alamat',tinggi = '$tinggi',berat = '$berat',pekerjaan = '$pekerjaan',jenis = '$jenis' WHERE id_pasien = '$_GET[id]'");

		echo "<div class='alert alert-success text-center'> Data Berhasil Diupdate </div>";

}
 ?>