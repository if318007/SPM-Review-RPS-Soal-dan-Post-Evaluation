<?php
// koneksi ke mysql 
$conn =$conn = mysqli_connect("localhost","root","","pa2");
 
// membaca tanggal sekarang
$tanggal = date("Y-m-d");
 
// membaca keterangan
$ket = $_POST['ket'];
  
// membaca nama file
$fileName = $_FILES['userfile']['name'];     
  
// membaca nama file temporary
$tmpName  = $_FILES['userfile']['tmp_name']; 
  
// membaca size file
$fileSize = $_FILES['userfile']['size'];
  
// membaca tipe file
$fileType = $_FILES['userfile']['type'];
  
// membaca isi file yang diupload
$fp  = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
 
// query SQL untuk menyimpan isi file dan informasi lainnya ke database
  
$query = "INSERT INTO upload (name, size, type, content, dateupload, keterangan) 
          VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$tanggal', '$ket')";
 
$hasil = mysql_query($query);
 
// konfirmasi proses upload
if ($hasil)  echo "<p>File ".$fileName." telah terupload</p>";
else echo "<p>File ".$fileName." gagal diupload</p>";
  
?>