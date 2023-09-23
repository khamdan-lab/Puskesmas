<?php include 'koneksi.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <link rel="stylesheet" href="gaya.css"> -->
        <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
        <title>Login</title>
        <style>
        body{
            /* background-image: url(hospital.jpg); */
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        </style>
        <style type="text/css">
                .alert{
                    background: #e44e4e;
            color: white;
            padding: 10px;
            text-align: center;
            border:1px solid #b32929;
                }
        </style>
    </head>
 <body>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
	<script type="dist/js/jquery.min.js"></script>
	<script type="dist/js/bootstrap.min.js"></script> 
    <div class="container mt-5">
        <div class="col-md-4 mx-auto text-center">
			<br><br><br>
            <h3> <font color="white"> Silakan Login terlebih Dahulu </font></h3>
			<br>
			<div class="col-auto text-center">
                <form role="form" action="" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="username" required="" name="username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="password" required="" name="password">
					</div>
					<button type="submit" class="btn btn-primary btn-block" name="masuk"> Login </button>
				</form>
			</div>
		</div>
	</div>
 </body>
 <?php 	
        if(isset($_POST['masuk'])){
            include 'koneksi.php';
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $ambil = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");
            $cocok =mysqli_num_rows($ambil);
            if($cocok > 0){
                $data =mysqli_fetch_assoc($ambil);
                if($data['sebagai'] == "Admin"){
                    $_SESSION ['username'] = $username;
                    $_SESSION ['sebagai'] = 'Admin';
                    header("location:admin/menu.php");
                }else if($data['sebagai'] == "Dokter"){
                    $_SESSION ['username'] = $username;
                    $_SESSION ['sebagai'] = 'Dokter';
                    header("location:dokter/menu.php");
                }else if($data['sebagai'] == "Apoteker"){
                    $_SESSION ['username'] = $username;
                    $_SESSION ['sebagai'] = 'Apoteker';
                    header("location:apoteker/menu.php");
                }else{
                    header("location:index.php?pesan=gagal");
                }
            }else{
                header("location:index.php?pesan=gagal");
            }
        }
        ?>

</html>