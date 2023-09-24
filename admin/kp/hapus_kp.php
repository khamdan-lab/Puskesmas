<?php include '../koneksi.php';
  $ambil = mysqli_query($koneksi,"SELECT * FROM kepala_keluarga WHERE id = '$_GET[id]'");
  $tampil = mysqli_fetch_assoc($ambil);

  mysqli_query($koneksi,"DELETE FROM kepala_keluarga WHERE id = '$_GET[id]'");


 ?>
 <script>location='menu.php?halaman=kepala_keluarga';</script>