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
            if($conn->connect_error){
                die("Fatal Error: Can't connect to database: ". $conn->connect_error);
            }
            if(isset($_POST["submit"])){
                //$namafile = $_POST["namafile"];
                $status = $_POST["status_hadir"];
                $daftar = $_POST["daftaryanghadir"];
                $nidn = $_POST["nidn"];
                $query = "INSERT INTO daftar_hadir values('','$status_hadir','$daftaryanghadir','$nidn')";
                mysqli_query($conn,$query);
                header("location: reviewFile.php");
                }
            ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Hadir</title>
</head>
<body>
	<form action="" method="post">
        <center>
            <h3>Daftar Hadir</h3>
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
				<td><h4><b>Status Hadir</b></h4></td>
                <td><input type="text" name="status" id="daftar" placeholder="status..." size="20" required></td>
			</tr>
			 <tr> 
                <td><h4><b>Daftar yang hadir</b></h4></td>
                <td><input type="text" name="daftar" id="daftar" placeholder="hadir..." size="20" required></td>
            </tr>
            <tr> 
                <td><h4><b>NIDN Dosen Pengampu</b></h4></td>
                <td><input type="text" name="nidn" id="nidn" placeholder="NIDN Dosen Pengampu..." size="20" required></td>
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