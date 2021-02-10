<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
require'functions.php';
$id = $_GET['id'];
$data = query("SELECT * FROM daftar_hadir INNER JOIN dosen ON daftar_hadir.nidn = dosen.nidn where daftar_hadir.nidn =$id")[0]; 
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$html = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar Hadir</title>
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
<h3 style="text-align: center">Formulir Daftar Hadir </h3>


<br>

<br>
<p><b>Berikut adalah hasil daftar dosen yang dinyatakan hadir atau turut serta dalam mereview dokumen</b></p>
<table border="1" style="text-align:center;" width="100%">
	<tr>
		<td>No</td>
		<td>Status Hadir</td>
		<td>Daftar yang hadir</td>
		<td>Tanda tangan</td>
	</tr>
		<tr>
		<td>1</td>
		<td>'.$data["statushadir"].'</td>
		<td>'.$data["daftaryanghadir"].'</td>
		<td>_</td>
	</tr>
	
</table>
<br>

</body>
</html>
';
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
?>