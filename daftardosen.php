<?php
    require_once('Layout/header.php');
    session_start();
    if(!isset($_SESSION['login'])) {
        include("login.php");
    }
    else {
?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->


<div class="col-md-12">
    <center><h3><b><img src="img/dosen.png" style="width:25px; height:25px;">&nbsp; Daftar Dosen</b></h3></center>
    &nbsp;
</div>


<table class="table table-hover text-center">
    <thead>
        <th class="text-center">Nama</th>
        <th class="text-center">Program Studi</th>
        <th class="text-center">Data Diri</th>
        <th class="text-center">Status</th>
    </thead>

<tbody class="table-hover">
    <tr>
        <td>Litmalem Ginting</td>
        <td>S1 Informatika</td>
        <td><a href="#">Buka</td>
        <td style="color:#3FDF6A;">Telah Diundang</td>
    </tr>

    <tr>
        <td>Ike Fitriansyah</td>
        <td>D3 Teknologi Informasi</td>
        <td><a href="#">Buka</td>
        <td style="color:#3FDF6A;">Telah Diundang</td>
    </tr>

    <tr>
        <td>Indra Tambunan</td>
        <td>S1 Teknik Elektro</td>
        <td><a href="#">Buka</td>
        <td style="color:#EE2222;">Belum Diundang</td>
    </tr>
</tbody>
</table>


<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
    }
?>


        
