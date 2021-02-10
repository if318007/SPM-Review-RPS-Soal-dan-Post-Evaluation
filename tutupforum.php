<?php
    require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
            session_start();
        include("login.php");
    }
    else {
?>
<?php
require 'functions.php'; 
$id = $_GET["id"];
        $dat = query("SELECT * FROM dokumen WHERE id_file = $id")[0];
?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->

<center><h3><b> <img src="img/rps.png" style="width:25px; height:25px;">Buat Laporan Pertemuan</b></h3></center>
<div class="container" style=" border: solid #195CDE; padding: 50px;">
    <center>
        <table  width="40%" style="">
            <tr>
                <td>Kofirmasi layak cetak</td>
                <td>=></td>
                <td><a href="isiklc.php?id=<?= $dat['id_file'];?>" style="margin: 5px;" class="btn btn-success">Buat KLC</a></td>
            </tr>
            <tr>
                <td>Berita acara</td>
                <td>=></td>
                <td><a href="isiba.php?id=<?= $dat['id_file'];?>" style="margin: 5px;" class="btn btn-success">Berita Acara</a></td>
            </tr>
            <tr>
                <td>Daftar hadir</td>
                <td>=></td>
                <td><a href="isidh.php" style="margin: 5px;" class="btn btn-success">Daftar Hadir</a></td>
            </tr>
            <tr>
                <td colspan="3"><center><a href="reviewFile.php"><button style="margin: 10px;" class="btn btn-primary" type="submit" name="submit">Selesai</button></a></center></td>
            </tr>

        </table>
    </center>
</div>
    

<br>

<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
}
?>

