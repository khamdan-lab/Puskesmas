<?php include '../koneksi.php'; ?>

<h2 class="text-center"> Edit Data Kepala Keluarga</h2>
<?php $ambil = mysqli_query($koneksi,"SELECT * FROM kepala_keluarga WHERE id_kp = '$_GET[id]'");
	  $tampil = mysqli_fetch_assoc($ambil);
 ?>
<!--<pre><?php print_r($tampil); ?></pre>-->
<form action="" method="POST" erctype="mutlipart/form-data">
	<div class="form-group">
		<label for="ktp"> No KTP </label>
		<input type="number" class="form-control" name="no_ktp" value="<?php echo $tampil ['no_ktp']; ?>">
	</div>
	<div class="form-group">
		<label for="nama"> Nama </label>
		<input type="text" class="form-control" name="nama" value="<?php echo $tampil ['nama']; ?>">
	</div>
	<div class="form-group">
		<label for="pekerjaan"> Pekerjaan </label>
		<input type="text" class="form-control" name="pekerjaan" value="<?php echo $tampil ['pekerjaan']; ?>">
	</div>
	<div class="form-group">
		<label for="alamat"> Alamat </label>
		<textarea class="form-control" cols="3" name="alamat"><?php echo $tampil ['alamat']; ?></textarea>
	</div>
	<div class="form-group">
		<label for="jenis"> Jenis Kelamin </label>
		<select class="form-control" name="jenis_kelamin">
			<option> Pilih Jenis Kelamin </option>
			<option value="Laki-laki" <?php if ($tampil['jenis_kelamin'] == 'Laki-laki') {
				echo "selected";
			} ?> > Laki-laki </option>
			<option value="Perempuan" <?php if ($tampil['jenis_kelamin'] == 'Perempuan') {
				echo "selected";
			}?> > Perempuan </option>
		</select>
	</div>
	<div class="form-group">
		<label for="tangga'"> Tanggal lahir </label>
		<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $tampil ['umur']; ?>">
		
	</div>
	<div class="form-group">
		<label for="agama"> Agama </label>
		<select class="form-control" id="agama" name="agama">
		<option> Pilih Agama </option>
		<option value="Islam" <?php if ($tampil['agama'] == 'Islam') {
				echo "selected";
			}?>> Islam </option>
		<option value="Budha" <?php if ($tampil['agama'] == 'Budha') {
				echo "selected";
			}?>> Budha </option>
		<option value="Kristen" <?php if ($tampil['agama'] == 'Kristen') {
				echo "selected";
			}?>> Kristen </option>
		<option value="hindhu" <?php if ($tampil['agama'] == 'Hindhu') {
				echo "selected";
			}?>> Hindhu </option>
	  </select>
	</div>
	<div class="form-group">
		<label for="tinggi"> Tinggi Badan </label>
		<input type="number" name="tinggi_badan" class="form-control" value="<?php echo $tampil ['tinggi_badan']; ?>">
	</div>
	<div class="form-group">
		<label for="berat"> Berat Badan </label>
		<input type="number" name="berat_badan" class="form-control" value="<?php echo $tampil ['berat_badan']; ?>">
	</div>
	<button class="btn btn-primary" name="edit"> Update Data </button>
	<a href="menu.php?halaman=kepala_keluarga" class="btn btn-warning"> Kembali </a>


</form>
<?php  
if (isset($_POST['edit'])) {
	$no_ktp = $_POST ['no_ktp'];
	$nama = $_POST ['nama'];
	$jenis = $_POST ['jenis_kelamin'];
	$tanggal = $_POST ['tanggal_lahir'];
	$pekerjaan = $_POST ['pekerjaan'];
	$agama = $_POST ['agama'];
	$alamat = $_POST ['alamat'];
	$tinggi = $_POST ['tinggi_badan'];
	$berat = $_POST ['berat_badan'];

	mysqli_query($koneksi,"UPDATE kepala_keluarga SET no_ktp = '$no_ktp', nama = '$nama', jenis_kelamin = '$jenis', umur = '$tanggal', pekerjaan = '$pekerjaan', agama = '$agama', alamat = '$alamat', tinggi_badan = '$tinggi', berat_badan = '$berat' WHERE id_kp = '$_GET[id]'");
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=kepala_keluarga'>";
	echo "<div class='alert alert-success text-center'> Data Berhasil Diupdate </div>";

}
?>