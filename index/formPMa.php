<?php
include "koneksi.php"; 
if(isset ($_POST["submit"])){
$name = $_POST["pos"];
$pas = $_POST["pass"];
$sql = "insert into petugas2 values ('$name','$pas','NULL')";
mysqli_query($koneksi,$sql);
header("location: ../dashboard/dataAnak.php");
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Smart Anthro</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="cssForm/ui.css">
</head>
<body>
<div class="row">
    <div class="col-md-8 col-md-offset-3">
        <form id="msform" method="post">
            <!-- progressbar -->
            <!-- <ul id="progressbar">
                <li class="active">Data Petugas</li>
                <li>Data Orangtua</li>
            </ul> -->
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Data Petugas</h2>
                <h3 class="fs-subtitle">Silahkan Isi Dengan Data Anda</h3>
                <label style="text-align:left" for="pos">Nama Posyandu</label>
                <input type="text" name="pos" required />
                
                <label style="text-align:left" for="pass">Password</label>
                <input type="password" name="pass" required />

            
                <h3 class="fs-subtitle">Belum punya akun? <a href="formP.php">Daftar sekarang!</a></h3>

                <button type="submit" name="submit" class="action-button">Submit</button>
                <!-- <a href="dashboard/dashboard_petugas.php" class="submit action-button">Submit</a> -->

                
            </fieldset>

        </form>
        
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="jsForm/Scripts.js"></script>
</body>
</html>
