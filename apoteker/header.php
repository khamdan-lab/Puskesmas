<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Halaman | <?php echo $_SESSION ['sebagai']; ?></title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../dist/css/style4.css">

    <!-- Font Awesome JS -->
    <script defer src="../dist/js/solid.js" crossorigin="anonymous"></script>
    <script defer src="../dist/js/fontawesome.js" crossorigin="anonymous"></script>
    <style type="text/css">
      #sidebar {
        background-color: #042331;
      }
      #sidebar .sidebar-header{
        background-color: #063146;
      }
    </style>

</head>

<body>
  <?php
if(!isset($_SESSION['sebagai'])){
    echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
    echo "<script >location='../index.php'</script>";
}
 ?>

<?php if ($_SESSION ['sebagai'] == 'Admin') {
    echo "<script >alert('Bukan Hak Anda')</script>";
    echo "<script >location='../admin/menu.php'</script>";
} elseif ($_SESSION ['sebagai'] == 'Dokter') {
    echo "<script >alert('Bukan Hak Anda')</script>";
    echo "<script >location='../dokter/menu.php'</script>";
}

 ?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" >
                <h3>Puskesmas</h3>
                <strong>PS</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                	<a href="menu.php?halaman=obat">
                        <i class="fas fa-briefcase"></i>
                        Obat
                    </a>
                    <a href="menu.php?halaman=info">
                        <i class="fas fa-briefcase"></i>
                        Rekam Medis
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../keluar.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../dist/js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="../dist/js/popper.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="../dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>