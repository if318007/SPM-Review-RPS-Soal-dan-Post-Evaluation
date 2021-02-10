<?php
    require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
        include("login.php");
            session_start();
    }
    else {
?>
        <?php           
            //koneksi database
            $user = $_SESSION["username"];
            $conn = mysqli_connect("localhost","root","","pa2");
            $akun=mysqli_query($conn,"SELECT * FROM akun where username='".$_SESSION['username']."'");
            $row=mysqli_fetch_assoc($akun);
            $id_akun = $row['id_akun'];
            require 'functions.php';
            $id = $_GET["id"];
            $dat = query("SELECT * FROM dokumen WHERE id_file = $id")[0];
            if($conn->connect_error){
                die("Fatal Error: Can't connect to database: ". $conn->connect_error);
            }
            if(isset($_POST["submit"])){
                if($_FILES['lampiran']['name'] !="")
                {
                    $file = $_FILES['lampiran'];
                    $file_name = $file['name'];
                    $file_temp = $file['tmp_name'];

                    $namafiles = explode('.', $file_name);
                    $path = "tanggapan/".$file_name;
                
                //$namafile = $_POST["namafile"];
                $idforum = $_POST["idforum"];
                //$prodi = $_POST["prodi"];
                //$upload = $_POST["upload"];
                $komentar = $_POST["komentar"];

                $query = "INSERT INTO tanggapan(id_tanggapan,id_forum,komentar,lampiran,nidn) VALUES('',$id,'$komentar','$path',$id_akun)";
                mysqli_query($conn,$query);
                move_uploaded_file($file_temp, $path);
                header('location:forum.php? id='.$id);
                }
            }
            ?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->

<center><h3><b> <img src="img/rps.png" style="width:25px; height:25px;">Komentar / Tanggapan</b></h3></center>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-10">
                  
    <form action=" " method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
            <tr>
                <td><h4><b>Komentar </b></h4></td>
                <td>
                        <textarea rows="5" cols="60" name="komentar" id="komentar"></textarea><br/> 
                </td>
            </tr>
            <tr> 
                <td><h4><b>Upload File</b></h4></td>
                <td>
                <input class="form-control" type="file" name="lampiran" id="lampiran" style="width:280px;"/>
                </td>
            </tr>            
            <br>
            <br>
            <tr>
                <td colspan="2">
                    <a href="forum.php?id=<?= $dat['id_file'];?>"><button type='submit' name="submit" class='btn btn-success center-block' style="margin-bottom:20px;">Tanggapi</button></a>
                </td>
            </tr>     
    
        </table>
    </form>
    

<br>
</div>
</div>
</div>
</div>

<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
}
?>

