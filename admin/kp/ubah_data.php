<?php
    include '../koneksi.php'; 
?>
<h2 class="text-center"> Ubah Data Kepala Keluarga  </h2>

<?php $ambil= $koneksi->query("SELECT * FROM kepala_keluarga WHERE id = '$_GET[id]'");
    $tampil = $ambil->fetch_assoc();
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="ktp"> NO. KTP</label>
            <input type="number" class="form-control" name="no_ktp" value="<?php echo $tampil['no_ktp']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="nama"> Jenis Kelamin </label>
            <select name="jenis_kelamin" id="" class="form-control">
                <option value="Laki-Laki" <?php if ($tampil['jenis_kelamin'] == "Laki-laki"){
                    echo "selected";
                }?>>Laki Laki</option>
                <option value="Perempuan"<?php if ($tampil['jenis_kelamin'] == "Perempuan"){
                    echo "selected";
                }?>>Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama"> Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="Tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $tampil['umur']?>">     
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Pekerjaan"> Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" value="<?php echo $tampil['pekerjaan']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="Agama"> Agama </label>
            <input type="text" class="form-control" name="agama" value="<?php echo $tampil['agama']?>">     
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Alamat"> Alamat </label>
            <textarea name="alamat" id="" rows="4" class="form-control"><?php echo $tampil['alamat']?></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="Tinggi_badan"> Tinggi Badan </label>
            <input type="number" class="form-control" name="tinggi_badan" value="<?php echo $tampil['tinggi_badan']?>">
            <label for="Berat_badan"> Berat Badan </label>
            <input type="number" class="form-control" name="berat_badan" value="<?php echo $tampil['berat_badan']?>">
            <br>    
            <button class="btn btn-primary" name="edit"> Edit </button>
            <a href="" class="btn btn-warning"> Kembali </a>
        </div>
    </div>

    <?php 
    if(isset($_POST['edit'])){
        $no_ktp = $_POST['no_ktp'];
        $jk = $_POST['jenis_kelamin'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $tinggi = $_POST['tinggi_badan'];
        $berat = $_POST['berat_badan'];
    
        $koneksi->query("UPDATE kepala_keluarga SET no_ktp = '$no_ktp', nama = '$nama', pekerjaan = '$pekerjaan', alamat = '$alamat',
                        jenis_kelamin = '$jk', umur = '$tanggal', agama = '$agama', tinggi_badan = '$tinggi', berat_badan = '$berat'
                        WHERE id = '$_GET[id]'");

        echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=kepala_keluarga'>";
    }
    ?>  