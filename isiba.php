<?php
    require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
        include("login.php");
            session_start();
    }
    else {
?>
<?php
            $conn = mysqli_connect("localhost","root","","pa2");
            $id = $_GET['id'];
            $akun=mysqli_query($conn,"SELECT * FROM akun where username='".$_SESSION['username']."'");
            $row=mysqli_fetch_assoc($akun);
            $id_akun = $row['id_akun'];
            $conn = mysqli_connect("localhost","root","","pa2");
            if($conn->connect_error){
                die("Fatal Error: Can't connect to database: ". $conn->connect_error);
            }
            if(isset($_POST["submit"])){
                //$namafile = $_POST["namafile"];
                $tanggal = $_POST["badate"];
                $idfile = $_POST["idfile"];
                $nidn = $_POST["nidn"];
                $query = "INSERT INTO berita_acara values('','$tanggal','$id_akun',$id)";
                mysqli_query($conn,$query);
                header("location: reviewFile.php");
                }
            ?>
<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara</title>
</head>
<body>
	<form action="" method="post">
        <center>
            <h3>BERITA ACARA</h3>
        <div class="container" style=" border: solid #195CDE; padding: 50px;">
		<table>
			<!--
			<tr>
				<td>Tanggal Pengesahan KLC</td>
				<td>:</td>
				<td><input type="date" name="klcdate"></td>
			</tr>
			<tr>
				<td>ID File</td>
				<td>:</td>
				<td><input type="text" name="idfile"></td>
			</tr>
			<tr>
				<td>NIDN Dosen Pengampu</td>
				<td>:</td>
				<td><input type="text" name="nidn"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		-->
		<tr>
				<td><h4><b>Tanggal Pembuatan Berita Acara </b></h4></td>
				<td><input type="date" name="badate"></td>
			</tr>
            <tr>
                <td>
                  <td><input class="btn btn-success" type="submit" name="submit" value="Submit"></td>
                </td>
            </tr>     
		</table>
        </div>
	</form>
</body>
</html>
<?php
   require_once('layout/footer.php');
}
?>