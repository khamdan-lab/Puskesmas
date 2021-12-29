<?php include '../koneksi.php'; ?>
<h2 class="text-center"> Info Rekam </h2><br>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th> No Urut </th>
			<th> Pasien </th>
			<th> Tanggal </th>
			<th> Diagnosa </th>
			<th> Jenis </th>
			<th> Status </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = mysqli_query($koneksi,"SELECT * FROM rekam ");
		while ($tampil = mysqli_fetch_assoc($ambil)) {
			# code...
		 ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $tampil ['pasien']; ?></td>
			<td><?php echo $tampil ['tanggal']; ?></td>
			<td><?php echo $tampil ['diagnosa']; ?></td>
			<td><?php echo $tampil ['jenis']; ?></td>
			<td><?php echo $tampil ['status']; ?></td>
			<td>
				<?php if ($tampil ['status'] == 'Telah Di Periksa'){ ?>
				<a href="menu.php?halaman=buat_resep&id=<?php echo $tampil ['id_rekam'] ?>" class="btn btn-info"> Buat Resep </a>
			<?php } ?>

			<!--tombol untuk membuka modal-->
			<?php if ($tampil ['status'] !== 'Belum Di Periksa') {?>
			<button class="btn btn-primary" data-toggle="modal" data-target="#Id<?php echo $tampil ['id_rekam']; ?>"> Laporan </button>
		
			<!--modal-->
			<div class="modal" id="Id<?php echo $tampil ['id_rekam']; ?>">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<!--judul-->
						<div class="modal-header">
							<h4 class="modal-title"> Laporan Singkat </h4>
							<button class="close" type="button" data-dismiss="modal">&times;</button>
						<!--modal body-->
						</div>
						<div class="modal-body">
							<table class="table-borderless">
								<tr>
									<th><br></th>
									<th> Diagnosa </th>
									<th> Obat </th>
									<th> Keterangan </th>
									<th> Status</th>
								</tr>
								<tr>
									<td><hr></td>
									<td><?php echo $tampil ['diagnosa']; ?></td>
									<td><?php echo $tampil ['obat']; ?></td>
									<td><?php echo $tampil ['keterangan']; ?> Hari </td>
									<td><?php echo $tampil ['status']; ?></td>
								</tr>
							</table>	
						</div>
						<!--modal footer-->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup </button>
							<?php if ($tampil ['status'] == 'Obat Telah Di Berikan'){?>
							<a href="menu.php?halaman=laporan&id=<?php echo $tampil ['id_rekam'] ?>" class="btn btn-primary"> Lebih Lengkap </a>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if ($tampil['status'] == 'Belum Di Periksa') { ?>
		<a href="" > Tunggu Dokter Memeriksa </a>
			<?php } ?>
			</td>
		</tr>
	</tbody>
	<?php $nomor++; ?>
<?php } ?>
</table>