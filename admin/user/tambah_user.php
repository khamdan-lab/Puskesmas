<?php include '../koneksi.php';	 ?>
<div class="card">
	<div class="card-body">
		<h2 class="card-title">Tambah User</h2>
		<hr>
		<form action="" method="POST" erctype="mutlipart/form-data">
			<div class="form-group">
				<label for="Nama"> Nama Lengkap </label>
				<input type="text" class="form-control" name="nama_lengkap">
			</div>
			<div class="form-group">
				<label for="Email"> Email </label>
				<input type="email" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="No"> No Telp </label>
				<input type="text" class="form-control" name="no_telp">
			</div>
			<div class="form-group">
				<label for="Username"> Username </label>
				<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label for="Password"> Password </label>
				<input type="password" class="form-control" name="password">
			</div>
			<div class="form-group">
				<label for="jenis_user"> Jenis user </label>
				<select class="form-control" id="Jenis_user" name="jenis_user">
					<option style="display: none;"> Pilih Jenis User </option>
					<option value="Admin">Admin</option>
					<option value="Dokter">Dokter</option>
					<option value="Apoteker">Apoteker</option>
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

	mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, email, no_telp, username, password, sebagai)VALUES('$nama','$email','$no_telp','$username','$password','$jenis')");
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=user'>";
	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
}
?>