<?php
include '../koneksi.php';
?>
<div class="card">
	<div class="card-body">
		<div class="mb-3">
			<div class="row">
				<div class="col">
					<h5 class="card-title">Data Kepala Keluarga</h5>
				</div>
				<div class="col">
					<a href="menu.php?halaman=tambah_kp" class="btn btn-primary float-right"> [+] Tambah Data </a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table">
				<thead class="thead-dark text-center">
					<tr>
						<th> No Ktp </th>
						<th> Nama </th>
						<th> Pekerjaan </th>
						<th> Alamat </th>
						<th> JK </th>
						<th> Umur </th>
						<th> Agama </th>
						<th> TB </th>
						<th> BB </th>
						<th> Aksi </th>
					</tr>
				</thead>
				<tbody>
					<?php $ambil = mysqli_query($koneksi, "SELECT * FROM kepala_keluarga"); ?>
					<?php while ($tampil = mysqli_fetch_assoc($ambil)) { ?>
						<tr>
							<td><?php echo $tampil['no_ktp']; ?></td>
							<td><?php echo $tampil['nama']; ?></td>
							<td><?php echo $tampil['pekerjaan']; ?></td>
							<td><?php echo $tampil['alamat']; ?></td>
							<td><?php echo $tampil['jenis_kelamin']; ?></td>
							<td><?php
								// tanggal lahir
								$tanggal = new DateTime($tampil['tanggal_lahir']);

								// tanggal hari ini
								$today = new DateTime('today');

								// tahun
								$y = $today->diff($tanggal)->y;

								// bulan
								$m = $today->diff($tanggal)->m;

								// hari
								$d = $today->diff($tanggal)->d;
								echo  $y . " tahun ";
								?></td>
							<td><?php echo $tampil['agama']; ?></td>
							<td><?php echo $tampil['tinggi_badan']; ?></td>
							<td><?php echo $tampil['berat_badan']; ?></td>
							<td> <a href="menu.php?halaman=edit_kp&id=<?php echo $tampil['id'] ?>" class="btn btn-info"> Edit </a>
								<a href="menu.php?halaman=hapus_kp&id=<?php echo $tampil['id'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
							</td>
						</tr>
				</tbody>
			<?php } ?>
			</table>
		</div>
	</div>
</div>