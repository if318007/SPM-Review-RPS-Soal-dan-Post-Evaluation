<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
require'functions.php';
$id = $_GET['id'];
$data = query("SELECT * FROM konfirmasi_layak_cetak 
			   INNER JOIN dokumen ON konfirmasi_layak_cetak.id_file = dokumen.id_file 
			   INNER join forum ON forum.id_forum = dokumen.id_file 
			   INNER JOIN dosen ON dokumen.nidn = dosen.nidn
			   where konfirmasi_layak_cetak.id_file =$id")[0]; 
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$html = '<!DOCTYPE html>
<html>
<head>
	<title>Konfirmasi Layak Cetak</title>
</head>
<body>
<table width="100%">
	<tr>
		<td>
			<img src="logokecil.png">
		</td>
		<td>
			<h2>Sistem Penjaminan Mutu</h2>
			<h2>Institut Teknologi Del</h2>
		</td>
	</tr>
</table>
<hr>
<h3 style="text-align: center">Formulir Konfirmasi Layak Cetak</h3>
<table border="1" width="100%" style="text-align: center">
	<tr>
		<td>Hari/Tanggal</td>
		<td>:</td>
		<td>'.$data["waktu"].'</td>
	</tr>
	<tr>
		<td>Nama Reviewer</td>
		<td>:</td>
		<td>'.$data["nama"].'</td>
	</tr>
	<tr>
		<td>Nama Berkas</td>
		<td>:</td>
		<td>'.$data["dokumen_final"].'</td>
	</tr>
</table>

<br>
<p>Kami mengkonfirmasi bahwa berkas <u>'.$data["dokumen_final"].'</u> telah sesuai dengan hasil review yang kami
lakukan pada tanggal <u>'.$data["waktu"].'</u> menyatakan bahwa berkas final sudah layak cetak.</p>
<p><b>Apabila terdapat kesalahan dalam berkas tersebut akan menjadi tanggung jawab dosen
pengampu dan reviewer.</b></p>
<br>
<b>Dosen Pengampu/Penulis</b>
<br>
<br>
<br>
<br>
<p><b>('.$data["nama"].')<b></p>
</body>
</html>
';
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
?>