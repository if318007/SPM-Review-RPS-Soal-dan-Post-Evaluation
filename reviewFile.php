<?php
    require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
        include("login.php");
            session_start();
    }
    else {
?>
    <?php
    require 'functions.php';
        $dokumen = query("SELECT * FROM dokumen inner join dosen on dokumen.nidn = dosen.nidn order BY dokumen.id_file DESC");
       if(isset($_POST["cari"])){
        $dokumen = cari($_POST["keyword"]);
       }
       //while( $hasil = mysqli_fetch_assoc($result))
       //{
         //   var_dump($hasil);
       //}
    ?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->



<div class="col-md-12">
    <center><h2 style="color:#195CDE; font-weight: bold;"><b>History Forum</b></h2></center>
    &nbsp;
</div>
<!--
        <div class="col-md-2 col-md-offset-10">
        <form action="" method="post">
          <input class="form-control" type="search" name="keyword" placeholder="Dosen pengampu...">
          <button class="btn btn-primary" type="submit" name="cari"  style="width:45px; height: 30px; font-size: 12px; padding-left: 8px;">Cari</button>
        </form>  
          <br>
        </div>
-->


<div class="container">
  <div class="row">
    <div class="col-md-2 col-md-offset-10">
      <form action="" method="POST">
        <div class="input-group"  style="width: 222px;">
          <select class="form-control" name="keyword" id="jenisfile" style="width:250px;">
                            <option value=" ">-- Program Studi --</option>
                            <option value="DIII-TEKNOLOGI INFORMASI">DIII-TEKNOLOGI INFORMASI</option>
                            <option value="DIV-TEKNIK REKAYASA PERANGKAT LUNAK">DIV-TEKNIK REKAYASA PERANGKAT LUNAK</option>
                            <option value="DIII-TEKNOLOGI KOMPUTER">DIII-TEKNOLOGI KOMPUTER</option>
                            <option value="S1-INFORMATIKA">S1-INFORMATIKA</option>
                            <option value="S1-SISTEM INFORMASI">S1-SISTEM INFORMASI</option>
                            <option value="S1-TEKNIK ELEKTRO">S1-TEKNIK ELEKTRO</option>
                    </select>
            <input type="submit" name="cari" value="Cari" class="btn btn-primary" data-disable-with="Search" >
          </span> 
        </div>
      </form>
    </div>
  </div>
</div>

<br>
<table class="table table-hover text-center" width="100%">
    <thead style="background-color: #a3bef5">
    <th class="text-center">Nama File</th>
        <th class="text-center">Dosen pengampuh | Partisipan lain</th>
        <th class="text-center">Detail Forum</th>
        <th class="text-center">Deadline | Status</th>
        <th class="text-center">Generate</th>
        <th class="text-center">Aksi</th>
</thead>

<tbody class="table-hover">
    <?php foreach ($dokumen as $row ) :?>
        <?php 
        $namafile = explode('/', $row['upload']);
        ?>
    <tr>
    <td class="text-center"><?= $row["nama_file"]; ?><br><a href="Forum.php?id=<?=$row['id_file']; ?>"><button class="btn btn-success" style="width:45px; height: 30px; font-size: 12px; padding-left: 7px;">Lihat</button></a></td>
        <td class="text-center">
          <b>Dosen Pengampuh</b><p><?= $row["nama"]; ?></p><br>
          <b>Partisipan lain</b>
          <ol>
            <li><?= $row["undangdosen1"]; ?></li>
            <li><?= $row["undangdosen2"]; ?></li>
            <li><?= $row["undangdosen3"]; ?></li>
            <li><?= $row["undangdosen4"]; ?></li>
            <li><?= $row["undangdosen5"]; ?></li>
          </ol>  
        </td>
        <td class="text-center">
          <b>Prodi</b><br><?= $row["prodiutama"]; ?><hr>
          <b>Jenis file</b><br><?= $row["jenis"]; ?><hr>
          <b>Tahun Ajaran / Semester</b><br><?= $row["tahunajaran"]; ?> / <?= $row["semester"]; ?><hr>
          <b>Matakuliah</b><br><?= $row["matkul1"]; ?><hr>
          <p><b>Dokumen Awal </b>  </p><a href="download.php?upload=<?php echo $namafile[1]?>"><?= $row["upload"]; ?></a><hr>
          <b>Deskripsi</b><br><?= $row["deskripsi"]; ?><br>
        </td>
        <td class="text-center">
          <b><?= $row["tanggalselesai"]; ?></b><br><br>
          <?php 
                $batas =$row["tanggalselesai"];
                $sekarang = date('Y-m-d');
                if($batas < $sekarang){
                  echo "<b class='btn-success' style='padding:5px;'> Sudah Direview</b>";
                }
                else{
                  echo "<b class='btn-warning' style='padding:5px;'> Sedang berlangsung</b>";
                }
           ?>
        </td>
        <td class="text">
            <a href="cetakba.php?id=<?= $row["id_file"]?>" target="blank"><button type="submit" class="btn btn-primary" style="width:75px; font-size:12px; padding-left:3px;">Berita Acara</button></a><br><br>
            <a href="./fpdf182/daftarhadir.php" target="blank"><button type="submit" class="btn btn-primary" style="width:75px; font-size:12px; padding-left:3px;">Daftar Hadir</button></a><br><br>
            <a href="cetakklc.php?id=<?= $row["id_file"]; ?>" target="blank"><button type="submit" class="btn btn-primary" style="width:75px; font-size:12px; padding-left:3px;">Konfirmasi <br>Layak Cetak</button></a>
        </td>
        <td class="text-center"><a class="btn btn-danger" href="hapus.php?nidn=<?= $row["nidn"];?>&id=<?= $row["id_file"];?>" style="width:45px; height: 30px; font-size: 12px; padding-left: 4px;" onclick="return confirm('Anda yakin ingin menghapusnya?')">Hapus</td>
    </tr>
<?php endforeach; ?>
    
</tbody>
</table>

<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
}
?>


        
