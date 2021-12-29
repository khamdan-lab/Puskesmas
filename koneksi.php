 <!-- koneksi terhadap database -->

<?php $koneksi = mysqli_connect('localhost','khamdan','Kh@mdan1','puskesmas');
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 ?>