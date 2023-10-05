<?php include '../koneksi.php'; ?>
<div class="card">
	<div class="card-body">
		<h2 class="card-title">Info Rekam</h2>
		<hr>
		<table class="table">
			<thead class="thead-dark text-center">
				<tr>
					<th> No </th>
					<th> Pasien </th>
					<th> Tanggal </th>
					<th> Diagnosa </th>
					<th> Jenis </th>
					<th> Status </th>
					<th> Aksi </th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php $nomor = 1; ?>
				<?php $ambil = mysqli_query($koneksi, "SELECT * FROM rekam ");
				while ($tampil = mysqli_fetch_assoc($ambil)) {
				?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $tampil['pasien']; ?></td>
						<td><?php echo $tampil['tanggal']; ?></td>
						<td><?php echo $tampil['diagnosa']; ?></td>
						<td><?php echo $tampil['jenis_pasien']; ?></td>
						<td><?php echo $tampil['status_pasien']; ?></td>
						<td>
							<?php if ($tampil['status_pasien'] == 'Belum Di Periksa') {
								echo "<label> Tunggu Dokter Memeriksa </label>";
							} ?>
							<!--tombol untuk membuka modal-->
							<?php if ($tampil['status'] !== 'Belum Di Periksa') { ?>
								<button class="btn btn-primary ml-3" data-toggle="modal" data-target="#Id<?php echo $tampil['id']; ?>"> Laporan </button>

								<!--modal-->
								<div class="modal" id="Id<?php echo $tampil['id']; ?>">
									<div class="modal-dialog modal-dialog-centered modal-lg">
										<div class="modal-content">
											<!--judul-->
											<div class="modal-header">
												<h4 class="modal-title"> Laporan Singkat </h4>
												<button class="close" type="button" data-dismiss="modal">&times;</button>
												<!--modal body-->
											</div>
											<div class="modal-body">
												<table class="table">
													<tr>
														<th><br></th>
														<th> Diagnosa </th>
														<th> Obat </th>
														<th> Keterangan </th>
														<th> Status</th>
													</tr>
													<tr>
														<td>
															<hr>
														</td>
														<td><?php echo $tampil['diagnosa']; ?></td>
														<td><?php echo $tampil['obat']; ?></td>
														<td><?php echo $tampil['keterangan']; ?> Hari </td>
														<td><?php echo $tampil['status_pasien']; ?></td>
													</tr>
												</table>
											</div>
											<!--modal footer-->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup </button>
												<?php if ($tampil['status'] == 'Obat Telah Di Berikan') { ?>
													<a href="menu.php?halaman=laporan&id=<?php echo $tampil['id_rekam'] ?>" class="btn btn-primary"> Lebih Lengkap </a>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</td>
					</tr>
			</tbody>
			<?php $nomor++; ?>
		<?php } ?>
		</table>
	</div>
</div>