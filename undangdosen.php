<?php
    require_once('Layout/header.php');
    session_start();
    if(!isset($_SESSION['login'])) {
        include("login.php");
    }
    else {
?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->

<center><h3><b><img src="img/undang.png" style="width:25px; height:25px;">Undang Dosen</b></h3></center>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="col-md-2">
            <a href="daftarDosen.php"><button type='button' class='btn btn-primary center-block' style="margin-bottom:20px; border: 1px solid #000000; border-radius: 4px; font-size:12px; background-color:#548FF6;"><img src="img/dosen.png" style="width:18px; height:18px;">&nbsp; Daftar Dosen</button></a>
</div>
        &nbsp;
        <br>
</div>
</div>

<div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                    <div class="col-md-10">
               <form action="#.php" method="post" name="form1">
                   <table width="50%" border="0">
		 
                <td><h4><b>Dosen  </b></h4></td>
                <td>
                <select class="form-control" name="dosen" aria-required="true">
                             <option value="#">-- Pilih Dosen --</option>
                            <option value="dosen1">Lit Malem Ginting</option>
                            <option value="dosen2">Ike Fitriansyah</option>
                            <option value="dosen3">Togu Turnip</option>
                        </select> 
                        <br>
                        </td>     
               </tr>

                <tr> 
                <td><h4><b>Program Studi   </b></h4></td>
                <td>
                <select class="form-control" name="prodi" aria-required="true">
					        <option value="#">-- Pilih Program Studi --</option>
						    <option value="prodi1">D3 Teknologi Informasi</option>
						    <option value="prodi2">D3 Teknik Komputer</option>
                            <option value="prodi3">DIV Teknologi Rekayasa Perangkat Lunak
						    <option value="prodi3">S1 Informatika</option>
                            <option value="prodi3">S1 Teknik Elektro</option>
                            <option value="prodi3">S1 Sistem Informasi</option>
						</select>
                        <br>
                        </td>
                </tr>

  
                     </table>
</div>
</div>
</div>
</div>



        
    </form>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> 
        <div class="col-md-2">
        <a href="#.php">
        <img src="img/gmailku.png" style="width:18px; height:18px; ">&nbsp;Undang via Gmail</button>
        </a>
    </div>

</div>
</div>
</div>

<button type='button' class='btn btn-success center-block' style="margin-bottom:20px;">Undang</button>

</div>
</div>



<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
}
?>

