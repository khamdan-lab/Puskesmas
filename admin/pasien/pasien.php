<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Data Pasien </h2>
<table class="table table-bordered text-center ">
	<thead>
		<tr>
			<th> No Ktp </th>
			<th> Nama </th>
			<th> Nama Kepala Keluarga </th>
			<th> Pekerjaan </th>
			<th> Alamat </th>
			<th> Jenis Kelamin </th>
			<th> Umur </th>
			<th> Agama </th>
			<th> Tinggi Badan </th>
			<th> Berat Badan </th>
			<th> Jenis </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $ambil = mysqli_query($koneksi,"SELECT * FROM pasien") ?>
		<?php while ($tampil = mysqli_fetch_assoc($ambil)) {
		?>
		<tr>
			<td><?php echo $tampil ['no_ktp'] ?></td>
			<td><?php echo $tampil ['nama']; ?></td>
			<td><?php echo $tampil ['nama_kp']; ?></td>
			<td><?php echo $tampil ['pekerjaan']; ?></td>
			<td><?php echo $tampil ['alamat']; ?></td>
			<td><?php echo $tampil ['jenis_kelamin']; ?></td>
			<td><?php // tanggal lahir
						$tanggal = new DateTime($tampil['umur']);

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
			<td><?php echo $tampil ['agama']; ?></td>
			<td><?php echo $tampil ['tinggi']; ?></td>
			<td><?php echo $tampil ['berat']; ?></td>
			<td><?php echo $tampil ['jenis']; ?></td>
			<td>
				<a href="menu.php?halaman=tambah_rekam&id=<?php echo $tampil ['id_pasien'] ?>" class="btn btn-success"> Rekam </a>
				<a href="menu.php?halaman=edit_pasien&id=<?php echo $tampil ['id_pasien'] ?>" class="btn btn-warning"> Edit </a>
				<a href="menu.php?halaman=hapus_pasien&id=<?php echo $tampil ['id_pasien'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>

			</td>
		</tr>
	</tbody>
	<?php } ?>
</table>
<a href="menu.php?halaman=tambah_pasien" class="btn btn-primary"> [+] Tambah Data </a>