<?php
    require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
        include("login.php");
            session_start();
    }
    else {
?>
    <?php
    require 'functions.php';
        $dos = query("SELECT * FROM akun inner join dosen on akun.id_akun = dosen.nidn where username='".$_SESSION['username']."'")[0];
       //while( $hasil = mysqli_fetch_assoc($result))
       //{
         //   var_dump($hasil);
       //}
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Profil Saya</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-12" style="border: solid black; padding-bottom: 25px; font-weight: bold; font-size: 13pt;" >
            <center>
                <table>
                <h1>Data Diri</h1>
                    <tr>
                        <td>No.Nidn</td>
                        <td> : </td> 
                        <td><?= $dos["nidn"];?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td> 
                        <td> : </td>
                        <td><?= $dos["nama"];?></td>
                    </tr>
                    <tr>    
                        <td>Jabatan</td>
                        <td> : </td>
                        <td><?= $dos["jabatan"];?></td>
                    </tr>
                    <tr>
                        <td>Program Studi</td>
                        <td> : </td>
                        <td><?= $dos["prodiutama"];?></td>
                    </tr>
                    <tr>
                        <td>Golongan</td>
                        <td> : </td>
                        <td><?= $dos["golongan"];?></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td> : </td>
                        <td><?= $dos["pendidikan"];?></td>
                    </tr>
                    <tr>
                        <td>Mulai Pendidikan S1</td>
                        <td> : </td>
                        <td><?= $dos["mulai_s1"];?></td>
                    </tr>
                    <tr>
                        <td>Selesai Pendidikan S1</td>
                        <td> : </td>
                        <td><?= $dos["lulus_s1"];?></td>
                    </tr>
                    <tr>
                        <td>Mulai Pendidikan S2</td>
                        <td> : </td>
                        <td><?= $dos["mulai_s2"];?></td>
                    </tr>
                    <tr>
                        <td>Selesai Pendidikan S2</td>
                        <td> : </td>
                        <td><?= $dos["lulus_s2"];?></td>
                    </tr>
                    <tr>
                        <td>Mulai Pendidikan S3</td>
                        <td> : </td>
                        <td><?= $dos["mulai_s3"];?></td>
                    </tr>
                    <tr>
                        <td>Selesai Pendidikan S3</td>
                        <td> : </td>
                        <td><?= $dos["lulus_s3"];?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td><?= $dos["email"];?></td>
                    </tr>
                    <tr>
                        <td>Matakuliah Utama </td>
                        <td> : </td>
                        <td><?= $dos["matkul1"];?></td>
                    </tr>
                    <tr>
                        <td>Matakuliah Lain-1</td>
                        <td> : </td>
                        <td><?= $dos["matkul2"];?></td>
                    </tr>
                    <tr>
                        <td>Matakuliah Lain-2</td>
                        <td> : </td>
                        <td><?= $dos["matkul3"];?></td>
                    </tr>    
                </table>
                <br>
                <a href="editprofil.php" class="btn btn-primary">Edit</a>
            </center>
        </div>
    </div>
</body>
</html>

<?php
    require_once('layout/footer.php');
}
?>