<?php include '../koneksi.php';	 ?>
<?php $ambil = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$_GET[id]'");
$tampil = mysqli_fetch_assoc($ambil);
?>
<!--<pre><?php print_r($tampil); ?></pre>-->
<div class="card">
	<div class="card-body">
		<h2 class="card-title">Edit User</h2>
		<hr>
		<form action="" method="POST" erctype="mutlipart/form-data">
			<div class="form-group">
				<label for="Nama"> Nama Lengkap </label>
				<input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="nama_lengkap" value="<?php echo $tampil['nama_lengkap'] ?>">
			</div>
			<div class="form-group">
				<label for="Email"> Email </label>
				<input type="email" placeholder="Masukan Email" class="form-control" name="email" value="<?php echo $tampil['email'] ?>">
			</div>
			<div class="form-group">
				<label for="No"> No Telp </label>
				<input type="text" class="form-control" placeholder="Masukan No telp" name="no_telp" value="<?php echo $tampil['no_telp'] ?>">
			</div>
			<div class="form-group">
				<label for="Username"> Username </label>
				<input type="text" class="form-control" placeholder="Masukan Username" name="username" value="<?php echo $tampil['username'] ?>">
			</div>
			<div class="form-group">
				<label for="Password"> Password </label>
				<input type="password" class="form-control" placeholder="Masukan Password" name="password" value="<?php echo $tampil['password'] ?>">
			</div>
			<div class="form-group">
				<label for="jenis_user"> Jenis user </label>
				<select class="form-control" id="Jenis_user" name="jenis_user">
					<option> Pilih Jenis User </option>
					<option value="Admin" <?php if ($tampil['sebagai'] == "Admin") {
												echo "selected";
											} ?>>Admin</option>
					<option value="Dokter" <?php if ($tampil['sebagai'] == "Dokter") {
												echo "selected";
											} ?>>Dokter</option>
					<option value="Apoteker" <?php if ($tampil['sebagai'] == "Apoteker") {
													echo "selected";
												} ?>>Apoteker</option>
				</select>
			</div>
			<button class="btn btn-primary" name="simpan"> Simpan </button>
			<a href="menu.php?halaman=user" class="btn btn-warning"> Kembali </a>

		</form>
		<form action="" method="POST" erctype="mutlipart/form-data">
			<div class="form-group">
				<label for="Nama"> Nama Lengkap </label>
				<input type="text" class="form-control" name="nama_lengkap" value="<?php echo $tampil['nama_lengkap'] ?>">
			</div>
			<div class="form-group">
				<label for="Email"> Email </label>
				<input type="email"  class="form-control" name="email" value="<?php echo $tampil['email'] ?>">
			</div>
			<div class="form-group">
				<label for="No"> No Telp </label>
				<input type="text" class="form-control"  name="no_telp" value="<?php echo $tampil['no_telp'] ?>">
			</div>
			<div class="form-group">
				<label for="Username"> Username </label>
				<input type="text" class="form-control" name="username" value="<?php echo $tampil['username'] ?>">
			</div>
			<div class="form-group">
				<label for="Password"> Password </label>
				<input type="password" class="form-control" name="password" value="<?php echo $tampil['password'] ?>">
			</div>
			<div class="form-group">
				<label for="jenis_user"> Jenis user </label>
				<select class="form-control" id="Jenis_user" name="jenis_user">
					<option> Pilih Jenis User </option>
					<option value="Admin" <?php if ($tampil['sebagai'] == "Admin") {
												echo "selected";
											} ?>>Admin</option>
					<option value="Dokter" <?php if ($tampil['sebagai'] == "Dokter") {
												echo "selected";
											} ?>>Dokter</option>
					<option value="Apoteker" <?php if ($tampil['sebagai'] == "Apoteker") {
													echo "selected";
												} ?>>Apoteker</option>
				</select>
			</div>
			<button class="btn btn-primary" name="simpan"> Simpan </button>
			<a href="menu.php?halaman=user" class="btn btn-secondary"> Kembali </a>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$nama = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$no_telp = $_POST['no_telp'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$jenis = $_POST['jenis_user'];

	mysqli_query($koneksi, "UPDATE user SET nama_lengkap = '$nama', email = '$email', no_telp = '$no_telp', username = '$username', password = '$password', sebagai = '$jenis' WHERE id = '$_GET[id]'");
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=user'>";
	echo "<div class='alert alert-success text-center'> Data Berhasil Diedit </div>";
}
?>