<?php include '../koneksi.php'; ?>
<div class="card">
	<div class="card-body">
		<div class="mb-3">
			<div class="row">
				<div class="col">
					<h5 class="card-title">Data Users</h5>
				</div>
				<div class="col">
					<a href="menu.php?halaman=tambah_user" class="btn btn-primary float-right"> [+] Tambah User </a>
				</div>
			</div>
		</div>
		<table class="table ">
			<thead class="thead-dark text-center">
				<tr>
					<th> Nama Lengkap </th>
					<th> Username </th>
					<th> Email </th>
					<th> No Telp </th>
					<th> Sebagai </th>
					<th> Aksi </th>
				</tr>
			</thead>
			<tbody>
				<?php $ambil = mysqli_query($koneksi, "SELECT * FROM user"); ?>
				<?php while ($tampil =   mysqli_fetch_assoc($ambil)) {
				?>
					<tr>
						<td><?php echo $tampil['nama_lengkap']; ?></td>
						<td><?php echo $tampil['username']; ?></td>
						<td><?php echo $tampil['email']; ?></td>
						<td><?php echo $tampil['no_telp']; ?></td>
						<td><?php echo $tampil['sebagai']; ?></td>
						<td><a href="menu.php?halaman=edit_user&id=<?php echo $tampil['id'] ?>" class="btn btn-info"> Edit </a>
							<a href="menu.php?halaman=hapus_user&id=<?php echo $tampil['id'] ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus user ini?')"> Hapus </a>
						</td>
					</tr>
			</tbody>
		<?php } ?>
		</table>
	</div>
</div>