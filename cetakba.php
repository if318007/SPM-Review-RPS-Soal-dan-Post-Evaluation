<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
require'functions.php';
$id = $_GET['id'];
$data = query("SELECT * FROM berita_acara INNER JOIN dokumen ON berita_acara.id_file = dokumen.id_file inner join dosen on dokumen.nidn = dosen.nidn where berita_acara.id_file =$id")[0]; 
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$html = '<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara</title>
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
<h3 style="text-align: center">Formulir Berita Acara</h3>
<table border="1" width="100%" style="text-align: center">
	<tr>
		<td>Jenis Review</td>
		<td>:</td>
		<td>'.$data["jenis"].'</td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td>'.$data["tanggal"].'</td>
	</tr>
	<tr>
		<td>Nama Berkas</td>
		<td>:</td>
		<td><b>Online Meeting</b></td>
	</tr>
</table>

<br>
<p>Telah dilaksanakan Review <b>'.$data["jenis"].'</b> sesuai dengan prosedur yang ditetapkan. Perbaikan harus dilakukan sesuai dengan feedback yang diberikan oleh reviewer</p>
<p><b><u>GBK:</u>________________________</b></p>
<br>
<h3 style="text-align: center">PESERTA :</h3>
<table border="1" style="text-align:center;" width="100%">
	<tr>
		<td>No</td>
		<td>Nama</td>
		<td>Peran</td>
		<td>Tanda tangan</td>
	</tr>
		<tr>
		<td>1</td>
		<td>'.$data["nama"].'</td>
		<td>Dosen Pengampu</td>
		<td>_</td>
	</tr>
	</tr>
		<tr>
		<td>2</td>
		<td>'.$data["undangdosen1"].'</td>
		<td>Dosen</td>
		<td>_</td>
	</tr>
	</tr>
		<tr>
		<td>3</td>
		<td>'.$data["undangdosen2"].'</td>
		<td>Dosen</td>
		<td>_</td>
	</tr>
	</tr>
		<tr>
		<td>4</td>
		<td>'.$data["undangdosen3"].'</td>
		<td>Dosen</td>
		<td>_</td>
	</tr>
	</tr>
		<tr>
		<td>5</td>
		<td>'.$data["undangdosen4"].'</td>
		<td>Dosen</td>
		<td>_</td>
	</tr>
	</tr>
		<tr>
		<td>6</td>
		<td>'.$data["undangdosen5"].'</td>
		<td>Dosen</td>
		<td>_</td>
	</tr>
</table>
<br>
<h3 style="text-align: center">DAFTAR MATA KULIAH :</h3>
<table border="1" style="text-align:center;" width="100%">
	<tr>
		<td>No</td>
		<td>Matakuliah (MK)</td>
		<td>Dosen Utama</td>
		<td>Reviewer</td>
	</tr>
		<tr>
		<td>1</td>
		<td>'.$data["matkul1"].'</td>
		<td>'.$data["nama"].'</td>
		<td>_</td>
</table>
</body>
</html>
';
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
?>