<?php include '../koneksi.php'; 
$ambil = mysqli_query($koneksi,"SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
$tampil = mysqli_fetch_assoc($ambil);
		mysqli_query($koneksi,"DELETE FROM pasien WHERE id_pasien = '$_GET[id]'");

?>
<script >location='menu.php?halaman=pasien'</script>
