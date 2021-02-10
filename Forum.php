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

        $dat = query("SELECT * FROM dokumen inner join dosen on dokumen.nidn = dosen.nidn WHERE id_file = $id")[0];
        $tang = query("SELECT * FROM tanggapan inner join dosen on tanggapan.nidn = dosen.nidn where id_forum = $id order by id_tanggapan desc");
        error_reporting(0);
        $frum = query("SELECT * FROM forum where id_forum = $id")[0];
        if(isset($_POST["submit"])){
                if($_FILES['filefinal']['name'] !="")
                {
                    $file = $_FILES['filefinal'];
                    $file_name = $file['name'];
                    $file_temp = $file['tmp_name'];

                    $namafile = explode('.', $file_name);
                    $path = "dokumenfinal/".$file_name;
                
                //$namafile = $_POST["namafile"];
               
                $id_forum = $_POST["id_forum"];
                $query = "INSERT INTO forum(id_forum,dokumen_final) VALUES($id,'$path')";
                mysqli_query($conn,$query);
                move_uploaded_file($file_temp, $path);
                $now = date("Y-m-d") ;
                $foruminvite = 'forum.php?id='.$id;
                $query1 = "INSERT INTO notifikasi (id_notifikasi,pesan,waktu) VALUES($id,'$foruminvite','$now')";	
                mysqli_query($conn,$query1);
                echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
                }
            }

       //while( $hasil = mysqli_fetch_assoc($result))
       //{
         //   var_dump($hasil);
       //}
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<center>
		<h1 style="color:#195CDE; font-weight: bold;">Forum</h1>
	</center>
	<div class="container" style="border:solid #195CDE; border-radius: 20px 90px 90px 90px; padding: 15px;"> 
		<div class="col-md-4">
			<center>
				<h3 style="font-weight: bold;color:#195CDE;">Dokumen yang akan direvisi</h3><hr style="color:#195CDE; "><br>
				<?php 
				        $namafile = explode('/', $dat['upload']);
				    ?>
				<a href="download.php?upload=<?php echo $namafile[1]?>">
					<img src="img/docs.png" style="width: 250px;height: 250px"><br>
						
					<b><i><?= $dat["upload"];?></i></b>
				</a>
			</center>
		</div>
		<div class="col-md-4">
			<center>
				<h3 style="font-weight: bold;color:#195CDE;">Deskripsi Forum</h3>
			</center>
			<hr>
				<table border="1" style="font-size: 15pt;">
					<tr>
						<td>File</td>
						<td style="padding-left: 8px;"> : </td>
						<td style="padding-left: 15px;font-size: 11pt;"><?= $dat["nama_file"];?></td>
					</tr>
					<tr>
						<td>Dosen</td>
						<td style="padding-left: 8px;"> : </td>
						<td style="padding-left: 15px;"><?= $dat["nama"];?></td>
					</tr>
					<tr>
						<td>Jenis</td>
						<td style="padding-left: 8px;"> : </td>
						<td style="padding-left: 15px;"><?= $dat["jenis"];?></td>
					</tr>
					<tr>
						<td>Prodi</td>
						<td style="padding-left: 8px;"> : </td>
						<td style="padding-left: 15px;"><?= $dat["prodiutama"];?></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td style="padding-left: 8px;"> : </td>
						<td style="padding-left: 15px;font-size: 13pt;"><?= $dat["deskripsi"];?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td style="padding-left: 8px;"> : </td>
						<td style="padding-left: 15px;">		
							<?php 
			                		$batas =$dat["tanggalselesai"];
			                		$sekarang = date('Y-m-d');
			                		if($batas < $sekarang){
			                  				echo "<b class='btn btn-success' style='padding:5px;font-size: 13pt;'> Sudah Lewat</b>";
		                									}
		                			else{
		                  					echo "<b class='btn btn-warning' style='padding:5px;font-size: 13pt;'> Sedang berlangsung</b>";
		                				}
		           ?>
						</td>
					</tr>
					<tr>
						<td>TA/ Semester</td>
						<td> :</td>
						<td><?= $dat["tahunajaran"];?> / <?= $dat["semester"];?></td>
					</tr>
					<tr>
						<td style="text-align: left;">Partisipan</td>
						<td style="padding-left: 8px;"> : </td>
						<td style="padding-left: 5px; font-size: 10pt; font-weight: bold;">
														  - <?= $dat["undangdosen1"];?><br>
														  - <?= $dat["undangdosen2"];?><br>
														  - <?= $dat["undangdosen3"];?><br>
														  - <?= $dat["undangdosen4"];?><br>
														  - <?= $dat["undangdosen5"];?><br>												
						</td>
					</tr>
				</table>
		</div>
		<div class="col-md-4">
			<center>
				<h3 style="font-weight: bold;color:#195CDE;">Dokumen final hasil revisi</h3>
				<hr>
				<?php	if(empty($frum)){ 
							echo '<h4 class="btn btn-danger">Dokumen update masih belum dimasukkan! <br> Silahkan masukkan dokumen untuk memulai diskusi.</h4>'; 
										} 
						else{
							echo '<h4 class="btn btn-success">Dokumen update sudah dimasukkan !</h4>';
						}				
				?>
				<br><br>
				<form action="" method="post" enctype="multipart/form-data">
					<table width="100%" style="text-align: center;">
						<tr>
						<!--	<td>Upload </td>
							<td colspan="2"><input type="file" name="filefinal"></td> -->
							<input class="form-control" type="file" name="filefinal" id="upload" style="width:280px;"/>
						</tr>
						<br>
						<tr>
							<td><b>Dokumen final : </b></td>
							<td><a href="downloaddf.php?upload=<?php echo $frum["dokumen_final"];?>"><?= $frum["dokumen_final"];?></a></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;"><button class="btn btn-primary" type="submit" name="submit">Masukkan Dokumen final</button> &nbsp <a href="editFile.php?id=<?= $id?>" class="btn btn-primary" type="submit" name="submit">edit</button></td>
						</tr>
					</table>
				</form>
			</center>
		</div>
	</div>
	<?php $row = $dat; ?>
	<div class="container" style="text-align: center;padding-top: 10px;">
	
	</div>
	<div class="container">
		<center><h1 style="color:#195CDE; font-weight: bold;color:#195CDE;">Tanggapan personal</h1></center>
		<?php if (empty($tang)) {
			echo "<center><h4>Belum ada tanggapan...</h4></center>";
		} ?>	
		<?php foreach ($tang as $tan) :?>

		<div class="container" style="border:solid #195CDE; border-radius: 20px 90px 90px 90px; padding: 15px; margin-bottom: 15px;">
			<table width="100%" style="text-align: center;">
			<tr>
				<td><h5><b><?= $tan["nama"]; ?></b></h5></td>
				<td>
				<p>Komentar :</p><?= $tan["komentar"]; ?>
				</td>
				<td>
					<p>Melampirkan</p>
					<a href="downloadt.php?upload=<?= $tan["lampiran"];?>"><?= $tan["lampiran"]; ?></a>
				</td>
			</tr>
			</table>
		</div>
		<?php endforeach ?>
		<div class="col-md-3" style="padding-top: 20px; text-align: center;">
			<a href="tanggapan.php?id=<?= $dat['id_file'];?>"><p class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>&nbsp;Tanggapi</p></a>
		</div>
		<div class="col-md-6" style="padding-top: 20px;"></div>
		<div class="col-md-3" style="padding-top: 20px; text-align: center;">
			<a href="tutupforum.php?id=<?= $dat['id_file'];?>"><button class="btn btn-danger" type="submit"><span class="
glyphicon glyphicon-remove"></span>&nbsp;Tutup Forum</button></a>	
		</div>
	</div>
</body>
</html>

<?php
    require_once('layout/footer.php');
}
?>