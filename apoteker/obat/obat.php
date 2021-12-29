<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Data Obat </h2>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th> No </th>
			<th> Nama Obat </th>
			<th> Jenis Obat </th>
			<th> Stok Obat </th>
			<th> Tanggal Kadaluarsa </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = mysqli_query($koneksi,"SELECT * FROM obat");
			while ($tampil = mysqli_fetch_assoc($ambil)) {?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $tampil ['nama_obat']; ?></td>
			<td><?php echo $tampil ['jenis_obat']; ?></td>
			<td><?php echo $tampil ['stok_obat']; ?></td>
			<td><?php echo $tampil ['tanggal_kadaluarsa']; ?></td>
			<td>
				<a href="menu.php?halaman=edit_obat&id=<?php echo $tampil ['id_obat'] ?>" class="btn btn-warning"> Edit </a>
				<a href="menu.php?halaman=hapus_obat&id=<?php echo $tampil ['id_obat'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data obat ini?')" class="btn btn-danger"> Hapus </a>
			</td>
		</tr>
	</tbody>
<?php $nomor++; ?>
<?php } ?>
</table>
<a href="menu.php?halaman=tambah_obat" class="btn btn-info"> [+] Tambah Obat </a>