<?php include '../koneksi.php'; 

$ambil = mysqli_query($koneksi,"SELECT * FROM rekam WHERE id_rekam = '$_GET[id]'");
$tampil = mysqli_fetch_assoc($ambil);

mysqli_query($koneksi,"UPDATE rekam SET status = 'Obat Telah Di Berikan' WHERE id_rekam = '$_GET[id]'");
echo "<script>alert('Obat Telah Di Buat, Dan Obat Telah Di Berikan Kepada Pasien')</script>";
echo "<script>location='menu.php?halaman=info';</script>";
?>
