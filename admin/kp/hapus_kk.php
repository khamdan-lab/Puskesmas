<?php 
    include '../koneksi.php';

    $ambil= $koneksi->query("SELECT * FROM kepala_keluarga WHERE id = '$_GET[id]'");
    $tampil= $ambil->fetch_assoc();

    $koneksi->query("DELETE FROM kepala_keluarga WHERE id = '$_GET[id]'");
    echo "<script>location='menu.php?halaman=kepala_keluarga';</script>";
?>