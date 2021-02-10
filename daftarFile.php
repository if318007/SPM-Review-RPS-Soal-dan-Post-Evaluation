<?php
    require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
        include("login.php");
           session_start();
    }
    else {
?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->


<div class="col-md-12">
    <center><h3><b> <img src="img/rps.png" style="width:25px; height:25px;">Daftar File</b></h3></center>
    &nbsp;
</div>

<div class="col-md-1">
<button type="submit" name="Submit"  class="btn btn-primary" style="background-color:#548FF6; border: 1px solid #000000; border-radius: 4px; font-size:12px;"><img src="img/rps.png" style="width:20px; height:20px;">&nbsp; Hasil Review File</button>
</div>

<div class="col-md-2 col-md-offset-10">
    <input class="form-control" type="search" placeholder="Cari Dokumen...">
    <br>
</div>

<table class="table table-stripped">
    <thead>
    
    <tr>
        <th class="text-center">Nama File</th>
        <th class="text-center">Dosen Pengampu</th>
        <th class="text-center">Jenis File
        <th class="text-center">Program Studi</th>
		<th class="text-center">File</th>
        <th class="text-center">Deskripsi</th>
	    <th colspan=2><center>Opsi</center></th>
    </tr>


    <tr>  
        <td class="text-center">Pemograman Teknologi .NET</td>
        <td class="text-center">Lit Malem Ginting M.T</td>
        <td class="text-center">File RPS</td>
        <td class="text-center">S1 Informatika</td>
        <td class="text-center"><a href="#">Pemograman Teknologi .NET.docx</td>
        <td class="text-center">Ini adalah file RPS</td>

        <td align=right width=70px><a href="editFile.php" class="btn btn-block" style="height:28px; font-size:11px; border-radius : 5px;  background-color:#AB2FEC; color:#ffffff;">Update</a></td>
        <td align=right width=70px><a href=""class="btn btn-block" style="height:28px; background-color:#EE2222; border-radius : 5px; font-size:11px; color:#ffffff;">Hapus</a></td>
    </tr>


    <tr>
        <td class="text-center">Pengujian Perangkat Lunak</td>
        <td class="text-center">Dr. Arnaldo Marulitua Sinaga, <br>ST., M.InfoTech.</td>
        <td class="text-center">File Soal</td>
        <td class="text-center">D3 Teknologi Informasi</td>
        <td class="text-center"><a href="#">Pengujian Perangkat Lunak.docx</td>
        <td class="text-center">Ini adalah file Soal</td>

        
        <td align=right width=70px><a href="#" class="btn btn-block" style="height:28px; font-size:11px; border-radius : 5px;  background-color:#AB2FEC; color:#ffffff;">Update</a></td>
        <td align=right width=70px><a href=""class="btn btn-block" style="height:28px; background-color:#EE2222; border-radius : 5px; font-size:11px; color:#ffffff;">Hapus</a></td>
    </tr>


    <tr>
        <td class="text-center">Praktikum Rangkaian Elektrik</td>
        <td class="text-center">I Gde Eka Dirgayussa, <br>S.Pd,M.Si</td>
        <td class="text-center">File Post Evaluation </td>
        <td class="text-center">S1 Teknik Elektro</td>
        <td class="text-center"><a href="#">Praktikum Rangkaian Elektrik.docx</td>
        <td class="text-center">Ini adalah file post evaluation</td>

        <td align=right width=70px><a href="#" class="btn btn-block" style="height:28px; font-size:11px; border-radius : 5px;  background-color:#AB2FEC; color:#ffffff;">Update</a></td>
        <td align=right width=70px><a href=""class="btn btn-block" style="height:28px; background-color:#EE2222; border-radius : 5px; font-size:11px; color:#ffffff;">Hapus</a></td>
    </tr>


    
</thead>
</table>

<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
}
?>


        
