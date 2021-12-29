<?php include '../koneksi.php';
$ambil = mysqli_query($koneksi,"SELECT * FROM obat WHERE id_obat = '$_GET[id]'");
$tampil = mysqli_fetch_assoc($ambil);


mysqli_query($koneksi,"DELETE FROM obat WHERE id_obat = '$_GET[id]'");
echo "<script>location='menu.php?halaman=obat'</script>";
 ?>
