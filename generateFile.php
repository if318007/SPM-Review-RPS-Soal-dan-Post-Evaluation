<?php
require_once('Layout/header.php');
	session_start();
    if(!isset($_SESSION['login'])) {
        include("login.php");
    }
    else {
?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->

<center><h3><b><img src="img/rps.png" style="width:25px; height:25px;">Generate File</b></h3></center>


<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
}
?>