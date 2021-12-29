<?php 
    include '../koneksi.php';
?>
 <h2 class="text-center"> Ubah Data Pasien </h2>

 
<?php $ambil= $koneksi->query("SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Kepala_keluarga"> Kepala Keluarga </label>
            <select name="kepala_keluarga" id="" class="form-control" value="<?php echo $tampil['kepala_keluarga']?>">
                <option > -Pilih Kepala Keluarga- </option>
                <?php $ambil=$koneksi->query("SELECT * FROM kepala_keluarga ORDER BY nama ASC") ?>
                <?php while ($tampil = $ambil->fetch_assoc()) { ?>
                        <option <?php  if ($tampil['nama'] == $pecah['nama_kp']){
                            echo "selected";
                        }?>><?php echo $tampil['nama']?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="Jenis_kelamin"> Jenis Kelamin </label>
            <select name="jenis_kelamin" id="" class="form-control">
                <option value="laki laki"<?php if ($pecah['jenis_kelamin'] == "laki laki"){
                    echo "selected";
                }?>>Laki Laki</option>
                <option value="perempuan"<?php if ($pecah['jenis_kelamin'] == "perempuan"){
                    echo "selected";
                }?>>Perempuan</option>
            </select>
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="No_ktp"> NO. KTP </label>
            <input type="number" class="form-control" name="no_ktp" value="<?php echo $pecah['no_ktp']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="Tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $pecah['umur']?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Nama"> Nama </label>
            <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="Agama"> Agama </label>
            <input type="text" class="form-control" name="agama" value="<?php echo $pecah['agama']?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Pekerjaan"> Pekerjaan </label>
            <input type="text" class="form-control" name="pekerjaan" value="<?php echo $pecah['pekerjaan']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="Tinggi_badan"> Tinggi Badan </label>
            <input type="number" class="form-control" name="tinggi_badan" value="<?php echo $pecah['tinggi_badan']?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Alamat"> Alamat </label>
           <textarea name="alamat" id="" rows="4" class="form-control"><?php echo $pecah['alamat']?>"</textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="Berat_badan"> Berat Badan </label>
            <input type="number" class="form-control" name="berat_badan" value="<?php echo $pecah['berat_badan']?>">
            <label for="Jenis_pembayaran"> Jenis Pasien </label>
            <select name="jenis_pembayaran" id="" class="form-control">
                <option value="BPJS"<?php if ($pecah['jenis'] == "BPJS" ){
                    echo "selected";
                } ?>> BPJS </option>
                <option value="Umum"<?php if ($pecah['jenis'] == "Umum" ){
                    echo "selected";
                }?>> Umum </option>
            </select>
            <br>    
            <button class="btn btn-primary" name="simpan"> Simpan </button>
            <a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali </a>
        </div>
    </div>
 </form>
    <?php 
    if(isset($_POST['simpan'])){
        $kp = $_POST['kepala_keluarga'];
        $no_ktp = $_POST['no_ktp'];
        $jk = $_POST['jenis_kelamin'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $tinggi = $_POST['tinggi_badan'];
        $berat = $_POST['berat_badan'];
        $jp = $_POST['jenis_pembayaran'];
    
        $koneksi->query("UPDATE pasien SET no_ktp = '$nama', nama = '$nama', nama_kp = '$kp', pekerjaan = '$pekerjaan', alamat = '$alamat',
         jenis_kelamin = '$jk', umur = '$tanggal', agama = '$agama', tinggi_badan = '$tinggi', berat_badan = '$berat',jenis = '$jp' 
         WHERE id_pasien = '$_GET[id]'");

        echo " <br><div class='alert alert-success text-center'> Data Pasien Berhasil disimpan</div> ";
        echo " <meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'> ";
    }
    ?> 
   
  