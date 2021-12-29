<?php include '../koneksi.php'; ?>
<h2 class="text-center">Data User</h2>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th> Username </th>
			<th> Email </th>
			<th> Nama Lengkap </th>
			<th> No Telp </th>
			<th> Sebagai </th>
			<th> aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $ambil = mysqli_query($koneksi,"SELECT * FROM user"); ?>
		<?php while ($tampil =   mysqli_fetch_assoc($ambil)) {
		 ?>
		<tr>
			<td><?php echo $tampil ['username']; ?></td>
			<td><?php echo $tampil ['email']; ?></td>
			<td><?php echo $tampil ['nama_lengkap']; ?></td>
			<td><?php echo $tampil ['no_telp']; ?></td>
			<td><?php echo $tampil ['sebagai']; ?></td>
			<td><a href="menu.php?halaman=edit_user&id=<?php echo $tampil ['id_user'] ?>" class="btn btn-info"> Edit Data </a>
				<a href="menu.php?halaman=hapus_user&id=<?php echo $tampil ['id_user'] ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus user ini?')"> Hapus </a></td>
		</tr>
	</tbody>
<?php } ?>
</table>
<a href="menu.php?halaman=tambah_user" class="btn btn-primary"> [+] Tambah User </a>