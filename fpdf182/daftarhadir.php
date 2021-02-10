
<?php 

$server = "localhost";
$user = "root";
$pass = "";

$database = "pa2";

$conect = mysqli_connect($server,$user,$pass,$database) or die("Error Connection Network, Check Your Database");

if(!$conect){
	echo "Koneksi Gagal";
}

// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru

$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->Image('../img/LogoDel.jpg',15,15,15,15);
$pdf->SetFont('Arial','B',16);// mencetak string 
$pdf->Cell(190,7,'Sistem Review RPS,Soal dan Post Evaluation',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,7,'INSTITUT TEKNOLOGI DEL',0,1,'C');
$pdf->SetFont('Arial','B',15);
$pdf->Cell(190,20,'Daftar Hadir',0,1,'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,1,'',0,1);
$pdf->SetLeftMargin(40);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NO',1,0);
$pdf->Cell(40,6,'Status Hadir',1,0);
$pdf->Cell(40,6,'Nama',1,0);
$pdf->Cell(25,6,'NIDN',1,1);

$pdf->SetFont('Arial','',10);


$hadir = mysqli_query($conect, "select * from daftar_hadir");
while ($row = mysqli_fetch_array($hadir)){
    $pdf->Cell(20,6,$row['id_daftar_hadir'],1,0);
    $pdf->Cell(40,6,$row['status_hadir'],1,0);
    $pdf->Cell(40,6,$row['daftaryanghadir'],1,0);
    $pdf->Cell(25,6,$row['nidn'],1,1); 
}

$pdf->Output();
?>

