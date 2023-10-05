<?php include '../koneksi.php';
$ambil = mysqli_query($koneksi,"SELECT * FROM rekam WHERE id = '$_GET[id]'");
$tampil = mysqli_fetch_assoc($ambil);


mysqli_query($koneksi,"DELETE FROM rekam WHERE id_rekam = '$_GET[id]'");
echo "<script>location='menu.php?halaman=info'</script>";
 ?>