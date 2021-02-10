<?php

require_once('layout/header.php');



?>

<div class="container">
  <h3><img src="img/dosen.png" style="width:25px; height:25px;">&nbsp;Yogi Lubis</h3>
  <br/>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Data Dosen</a></li>
     <li><a data-toggle="tab" href="#menu1">Riwayat Pendidikan</a></li>
     <li><a data-toggle="tab" href="#menu2">Riwayat Pengajaran</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Data Dosen</h3>
       <table class="table table-hover">
   <tbody>
      <tr>
         <th>NIDN</th>
         <th>Nama</th>
         <th>Jabatan</th>
         <th>Program Studi</th>
         <th>Golongan</th>
         <th>Email</th>


      </tr>
      <?php
      include '../koneksi.php';
      $a=mysqli_query($conect,"SELECT * FROM dosen where nidn = '12345' ");
      foreach ($a as $b)
      {
      ?>
      <tr>
         <td><?= $b['nidn']; ?></td>
         <td><?= $b['nama']; ?></td>
         <td><?= $b['jabatan']; ?></td>
         <td><?= $b['prodiutama']; ?></td>
         <td><?= $b['golongan']; ?></td>
         <td><?= $b['email']; ?></td>

      </tr>  
      <?php } ?>                          
   </tbody>
  </table>

    </div>

    <!-- 2 -->

    <div id="menu1" class="tab-pane fade">
      <h3>Riwayat Pendidikan</h3>
      <table class="table table-hover">
        <tbody>
      <tr>
         <th>NIDN</th>
         <th>Universitas</th>
         <th>Tahun Mulai S1</th>
         <th>Tahun Lulus S1</th>
         <th>Universitas</th>
         <th>Tahun Mulai S2</th>
         <th>Tahun Lulus S2</th>
         <th>Universitas</th>
         <th>Tahun Mulai S3</th>
         <th>Tahun Lulus S3</th>



      </tr>
      <?php
      include '../koneksi.php';
      $a=mysqli_query($conect,"SELECT * FROM dosen where nidn = '12345'");
      foreach ($a as $b)
      {
      ?>
      <tr>
         <td><?= $b['nidn']; ?></td>
         <td><?= $b['universitas_s1']; ?></td>
         <td><?= $b['mulai_s1']; ?></td>
         <td><?= $b['lulus_s1']; ?></td>
         <td><?= $b['universitas_s2']; ?></td>
         <td><?= $b['mulai_s2']; ?></td>
         <td><?= $b['lulus_s2']; ?></td>
         <td><?= $b['universitas_s3']; ?></td>
         <td><?= $b['mulai_s3']; ?></td>
         <td><?= $b['lulus_s3']; ?></td>
  
      </tr>  
      <?php } ?>                          
   </tbody>
  </table>

    </div>
 



<!-- 3 -->
<div id="menu2" class="tab-pane fade">
      <h3>Riwayat Pengajaran</h3>
      <table class="table table-hover">
        <tbody>
      <tr>
         <th>NIDN</th>
         <th>Mata Kuliah 1</th>
         <th>Mata Kuliah 2</th>
         <th>Mata Kuliah 3</th>



      </tr>
      <?php
      include '../koneksi.php';
      $a=mysqli_query($conect,"SELECT * FROM dosen where nidn = '12345'");
      foreach ($a as $b)
      {
      ?>
      <tr>
         <td><?= $b['nidn']; ?></td>
         <td><?= $b['matkul1']; ?></td>
         <td><?= $b['matkul2']; ?></td>
         <td><?= $b['matkul3']; ?></td>
  
      </tr>  
      <?php } ?>                          
   </tbody>
  </table>

    </div>
  </div>

</div>



<?php
require_once('layout/footer.php');
?>
