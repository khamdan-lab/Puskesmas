<?php include '../koneksi.php'; ?>
<div class="card">
	<div class="card-body">
		<div>
			<div class="row">
				<div class="col">
					<h2 class="card-title">Data Obat</h2>
				</div>
				<div class="col">
					<a href="menu.php?halaman=tambah_obat" class="btn btn-primary float-right"> [+] Tambah Obat </a>
				</div>
			</div>
		</div>
		<table class="table">
			<thead class="thead-dark text-center">
				<tr>
					<th> No </th>
					<th> Nama Obat </th>
					<th> Jenis Obat </th>
					<th> Stok Obat </th>
					<th> Tanggal Kadaluarsa </th>
					<th> Aksi </th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php $nomor = 1; ?>
				<?php $ambil = mysqli_query($koneksi, "SELECT * FROM obat");
				while ($tampil = mysqli_fetch_assoc($ambil)) { ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $tampil['obat']; ?></td>
						<td><?php echo $tampil['jenis_obat']; ?></td>
						<td><?php echo $tampil['stok_obat']; ?></td>
						<td><?php echo $tampil['tanggal_kadarluasa']; ?></td>
						<td>
							<a href="menu.php?halaman=edit_obat&id=<?php echo $tampil['id'] ?>" class="btn btn-success"> Edit </a>
							<a href="menu.php?halaman=hapus_obat&id=<?php echo $tampil['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data obat ini?')" class="btn btn-danger"> Hapus </a>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
		</table>
	</div>
</div>