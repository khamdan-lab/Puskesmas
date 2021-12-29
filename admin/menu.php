<?php
session_start();
include 'header.php'
 ?>
<div class="content-wrapper">
	<section class="content container-fluid">
		<?php 
		if(isset($_GET ['halaman'])){
			if($_GET ['halaman']=='user'){
				include 'user/user.php';
			}elseif ($_GET ['halaman'] == 'tambah_user') {
				include 'user/tambah_user.php';
			}elseif ($_GET ['halaman'] == 'hapus_user') {
				include 'user/hapus_user.php';
			}elseif ($_GET ['halaman'] == 'edit_user') {
				include 'user/edit_user.php';
			}elseif ($_GET ['halaman'] == 'kepala_keluarga') {
				include 'kp/kepala_keluarga.php';
			}elseif ($_GET ['halaman'] == 'tambah_kp') {
				include 'kp/tambah_kp.php';
			}elseif ($_GET ['halaman'] == 'hapus_kp') {
				include 'kp/hapus_kp.php';
			}elseif ($_GET ['halaman'] == 'edit_kp') {
				include 'kp/edit_kp.php';
			}elseif ($_GET ['halaman'] == 'pasien') {
				include 'pasien/pasien.php';
			}elseif ($_GET ['halaman'] == 'tambah_pasien') {
				include 'pasien/tambah_pasien.php';
			}elseif ($_GET ['halaman'] == 'hapus_pasien') {
				include 'pasien/hapus_pasien.php';
			}elseif ($_GET ['halaman'] == 'edit_pasien') {
				include 'pasien/edit_pasien.php';
			}elseif ($_GET ['halaman'] == 'tambah_rekam') {
				include 'rekam/tambah_rekam.php';
			}elseif ($_GET ['halaman'] == 'info') {
				include 'rekam/info.php';
			}elseif ($_GET ['halaman'] == 'laporan') {
				include '../laporan/laporan.php';
			}
		}else{
			include 'home.php';
		}

		 ?>
		
	</section>
</div>
