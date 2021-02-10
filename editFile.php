<?php
    require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
            session_start();
        include("login.php");
    }
    else {
?>
        <?php
        include'functions.php';
            //koneksi database
            $conn = mysqli_connect("localhost","root","","pa2");
            $id=$_GET["id"];
            if (isset($_POST["submit"])) {
                header('location:forum.php? id='.$id);
            }
            ?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->

<div class="container" style="border: solid black;">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="ganti">
        <button type="submit" name="submit">Update</button>
    </form>
</div>

<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
}
?>

