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
        if (isset($_POST["submit"])) {
            if (editprofil($_POST) > 0 ) {
                echo "<script>
                        alert('Data berhasil diubah!');
                        document.location.href ='profil.php';
                      </script>";
            }
            else{
                echo "<script>
                        alert('Data gagal diubah!');
                        document.location.href ='profil.php';
                      </script>";   
            }
        }
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profil Saya</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-12" style="border: solid black; padding-bottom: 25px; font-weight: bold; font-size: 13pt;" >
            <center>
                <form action="" method="post">
                    <table>
                    <h1>Edit Data Diri</h1>
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
                            <td>
                                <select class="form-control" name="golongan" id="jenisfile" style="width:280px;">
                                    <option value="<?= $dos["golongan"];?>"><?= $dos["golongan"];?></option>
                                    <option value="III-A">III-A</option>
                                    <option value="III-B">III-B</option>
                                    <option value="III-C">III-C</option>
                                    <option value="III-D">III-D</option>
                                    <option value="IV-A">IV-A</option>
                                    <option value="IV-B">IV-B</option>
                                    <option value="IV-C">IV-C</option>
                                    <option value="IV-D">IV-D</option>
                                    <option value="IV-E">IV-E</option>
                                </select>    
                                
                            </td>
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
                            <td><input type="text" name="email" value="<?= $dos["email"];?>"></td>
                        </tr>
                        <tr>
                            <td>Matakuliah Utama </td>
                            <td> : </td>
                            <td><input type="text" name="matkul1" value="<?= $dos["matkul1"];?>"></td>
                        </tr>
                        <tr>
                            <td>Matakuliah Lain-1</td>
                            <td> : </td>
                            <td><input type="text" name="matkul2" value="<?= $dos["matkul2"];?>"></td>
                        </tr>
                        <tr>
                            <td>Matakuliah Lain-2</td>
                            <td> : </td>
                            <td><input type="text" name="matkul3" value="<?= $dos["matkul3"];?>"></td>
                        </tr>    
                    </table>
                    <br>
                    <button type="submit" name="submit">Selesai</button>
                </form>
            </center>
        </div>
    </div>
</body>
</html>

<?php
    require_once('layout/footer.php');
}
?>