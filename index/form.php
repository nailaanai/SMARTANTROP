<?php
include "koneksi.php"; 
if(isset ($_POST["submit"])){
$nama = $_POST["fname"];
$tglLahir = $_POST["tglLahir"];
$jk = $_POST["jk"];
$namaOrtu = $_POST["ortun"];
$nik = $_POST["nik"];
$notelp = $_POST["no"];
$alamat = $_POST["alamat"];
$provinsi = $_POST["provinsi"];
$kota = $_POST["kota"];
$kabupaten = $_POST["kabupaten"];
$kecamatan = $_POST["kecamatan"];
$kelurahan = $_POST["kelurahan"];
$domisili = "$provinsi, $kota, $kabupaten, $kecamatan, $kelurahan";
$sql = "insert into daftarortu values ('$nama','$tglLahir','$jk','$namaOrtu','$nik','$notelp','$alamat','$domisili')";
mysqli_query($koneksi,$sql);
header("location: ../dashboard/spekAnak.php");
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
            <ul id="progressbar">
                <li class="active">Data Anak</li>
                <li>Data Orangtua</li>
            </ul>
            
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Data Anak</h2>
                <h3 class="fs-subtitle">Silahkan Isi Dengan Data Anak Anda</h3>
                
                <!-- <label for="fname" id="nama-anak-label">Nama Anak : </label> -->
                <!-- <input type="text" id="fname" name="fname"  placeholder="Nama Anak"/> -->
                <label style="text-align:left" for="fname">Nama Anak</label>
                <input type="text" name="fname" required />

                <label style="text-align:left" for="tglLahir">Tanggal Lahir</label>
                <input type="date" name="tglLahir" required />
                
                <label style="text-align:left" for="jk">Jenis Kelamin</label>
                <br>
                <br><select class="form-control" style="width: 550px; padding:3.5px" name="jk" id="jk" required>
                    <option value=""></option>
                    <option value="laki-laki">Laki - laki</option>
                    <option value="perempuan">Perempuan</option>
                </select><br><br>
                <!-- <label for="male">Laki-laki</label>
                <input type="radio" name="jk" id="male" value="Laki-laki"/>
                <label for="female">Perempuan</label>
                <input type="radio" name="jk" id="female" value="Perempuan"/> -->
                
                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Data Orangtua</h2>
                <h3 class="fs-subtitle">Silahkan Isi Dengan Data Anda</h3>
                <label style="text-align:left" for="ortun">Nama Orangtua/Wali</label>
                <input type="text" name="ortun" required/>

                <label style="text-align:left" for="nik">NIK</label>
                <input type="text" name="nik" required />

                <label style="text-align:left" for="no">Nomor Telepon</label>
                <input type="tel" name="no" required />

                <label style="text-align:left" for="alamat">Alamat</label>
                <input type="text" name="alamat" required/>

                <label for="domisili">Domisili</label>
                
                <!-- Dropdown untuk Provinsi -->
                <br>
                <br>
                <select name="provinsi" id="provinsi" required>
                    <option value="">Pilih Provinsi</option>
                    <option value="provinsi1">Jawa Barat</option>
                    <!-- Tambahkan opsi provinsi sesuai dengan kebutuhan Anda -->
                </select>

                <!-- Dropdown untuk Kota -->
                <select name="kota" id="kota" required>
                    <option value="">Pilih Kota</option>
                    <!-- Opsi kota akan diisi menggunakan JavaScript berdasarkan pilihan provinsi -->
                </select>

                <!-- Dropdown untuk Kabupaten -->
                <select name="kabupaten" id="kabupaten" required>
                    <option value="">Pilih Kabupaten</option>
                    <!-- Opsi kabupaten akan diisi menggunakan JavaScript berdasarkan pilihan provinsi -->
                </select>

                <!-- Dropdown untuk Kecamatan -->
                <select name="kecamatan" id="kecamatan" required>
                    <option value="">Pilih Kecamatan</option>
                    <!-- Opsi kecamatan akan diisi menggunakan JavaScript berdasarkan pilihan kabupaten -->
                </select>

                <!-- Dropdown untuk Kelurahan -->
                <select name="kelurahan" id="kelurahan" required>
                    <option value="">Pilih Kelurahan</option>
                    <!-- Opsi kelurahan akan diisi menggunakan JavaScript berdasarkan pilihan kabupaten -->
                </select>
                
                <!-- <div class="button-container"> -->
                    <br>

                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <button type="submit" name="submit" class="action-button">Submit</button>
                    
                <!-- </div> -->
            </fieldset>


            <!-- <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                <input type="text" name="email" placeholder="Email"/>
                <input type="password" name="pass" placeholder="Password"/>
                <input type="password" name="cpass" placeholder="Confirm Password"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset> -->
        </form>
        <!-- link to designify.me code snippets -->
        
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="jsForm/Scripts.js"></script>
</body>
</html>
