<?php
    include '../koneksi.php'; 
?>
<h2 class="text-center"> Tambah Data Kepala Keluarga  </h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="ktp"> NO. KTP</label>
            <input type="number" class="form-control" name="no_ktp">
        </div>
        <div class="form-group col-md-6">
            <label for="nama"> Jenis Kelamin </label>
            <select name="jenis_kelamin" id="" class="form-control">
                <option value="Laki-Laki">Laki Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama"> Nama Lengkap</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group col-md-6">
            <label for="Tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir">     
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Pekerjaan"> Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan">
        </div>
        <div class="form-group col-md-6">
            <label for="Agama"> Agama </label>
            <input type="text" class="form-control" name="agama">     
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Alamat"> Alamat </label>
            <textarea name="alamat" id="" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="Tinggi_badan"> Tinggi Badan </label>
            <input type="number" class="form-control" name="tinggi_badan">
            <label for="Berat_badan"> Berat Badan </label>
            <input type="number" class="form-control" name="berat_badan">
            <br>    
            <button class="btn btn-primary" name="simpan"> Simpan </button>
            <a href="" class="btn btn-warning"> Kembali </a>
        </div>
    </div>

    <?php 
    if(isset($_POST['simpan'])){
        $no_ktp = $_POST['no_ktp'];
        $jk = $_POST['jenis_kelamin'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $tinggi = $_POST['tinggi_badan'];
        $berat = $_POST['berat_badan'];
    
        $koneksi->query("INSERT INTO kepala_keluarga(no_ktp, nama , pekerjaan, alamat, jenis_kelamin, umur, agama, tinggi_badan, berat_badan)
         VALUES ('$no_ktp', '$nama','$pekerjaan', '$alamat', '$jk', '$tanggal', '$agama', '$tinggi', '$berat')");

        echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=kepala_keluarga'>";
    }
    ?> 
</form>          