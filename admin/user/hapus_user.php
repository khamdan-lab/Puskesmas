<?php include '../koneksi.php';
  $ambil = mysqli_query($koneksi,"SELECT * FROM user WHERE id = '$_GET[id]'");
  $tampil = mysqli_fetch_assoc($ambil);

  mysqli_query($koneksi,"DELETE FROM user WHERE id = '$_GET[id]'");


 ?>
 <script>location='menu.php?halaman=user';</script>