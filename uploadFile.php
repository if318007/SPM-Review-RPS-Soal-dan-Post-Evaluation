<?php
    require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
            session_start();
        include("login.php");
    }
    else {
?>
        <?php
            //koneksi database
            $conn = mysqli_connect("localhost","root","","pa2");
            $akun=mysqli_query($conn,"SELECT * FROM akun inner join dosen on akun.id_akun = dosen.nidn where username='".$_SESSION['username']."'");
            $dosens=mysqli_query($conn,"SELECT nama FROM dosen where");
            $row=mysqli_fetch_assoc($akun);
            $id_akun = $row['id_akun'];
            $ta = $row['tahunajaran'];
            $sem = $row['semester'];
            $prod = $row['prodiutama'];
            if($conn->connect_error){
                die("Fatal Error: Can't connect to database: ". $conn->connect_error);
            }

            if(isset($_POST["submit"])){
                if($_FILES['upload']['name'] !="")
                {
                    $file = $_FILES['upload'];
                    $file_name = $file['name'];
                    $file_temp = $file['tmp_name'];

                    $namafile = explode('.', $file_name);
                    $path = "files/".$file_name;
                
                //$namafile = $_POST["namafile"];
                $jenisfile = $_POST["jenisfile"];
                $prodi = $_POST["prodi"];
                //$upload = $_POST["upload"];
                $deskripsi = $_POST["deskripsi"];
                $dosen1 = $_POST['dosen1'];
                $dosen2 = $_POST['dosen2'];
                $dosen3 = $_POST['dosen3'];
                $dosen4 = $_POST['dosen4'];
                $dosen5 = $_POST['dosen5'];
                $tanggalselesai = $_POST['bataswaktu'];
                $tanggalselesai = date('Y-m-d', strtotime($tanggalselesai));   
                $query = "INSERT INTO dokumen(id_file,nama_file,upload,tanggalselesai,jenis,nidn,deskripsi,undangdosen1,undangdosen2,undangdosen3,undangdosen4,undangdosen5,tahunajaran,semester) VALUES('','$namafile[0]','$path','$tanggalselesai','$jenisfile','$id_akun','$deskripsi','$dosen1','$dosen2','$dosen3','$dosen4','$dosen5','$ta','$sem')";
                mysqli_query($conn,$query);
                move_uploaded_file($file_temp, $path);

                header("location: reviewFile.php");
                }
            }
            ?>
<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan header -->

<center><h3><b> <img src="img/rps.png" style="width:25px; height:25px;">Upload File</b></h3></center>


  <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"> 
        <div class="col-md-2">
        <a href="daftardosen.php">
        <a href="pilihDosen.php" ><button type="submit" class="btn btn-info" style="text-color:#ffffff;">&nbsp;Undang Dosen</button></a>
    </div>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-10">

    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border="0">
            <tr>
                <td><h4><b>Jenis File </b></h4></td>
                <td><select class="form-control" name="jenisfile" id="jenisfile" aria-required="true" style="width:280px;">
                            <option value=" ">-- Jenis File --</option>
                            <option value="fileRPS">File RPS</option>
                            <option value="fileSoal">File Soal</option>
                            <option value="filePost">File Post Evaluation</option>
                    </select> 
                </td>
            </tr>
            <tr>
            <tr>
                <td><h4><b>Batas Waktu </b></h4></td>
                <td>
                    <input type="date" name="bataswaktu" id="bataswaktu" required>
                </td>
            </tr>
            <tr>    
                <td><h4><b>Undang Dosen : </b></h4></td>
            </tr>
            <tr> 
                <td><h4><b>Dosen-1 </b></h4></td>
                <td><select class="form-control" name="dosen1" id="dosen1" aria-required="true" style="width:280px;">
                    <option value="-">-- Pilih Dosen(Wajib) --</option> 
                            <?php
                        
                           $mysqli = new MySQLi("localhost","root","","pa2");
                            $resultset = $mysqli->query("SELECT nama from dosen where prodiutama = '$prod'");
                            while ($rows =$resultset->fetch_assoc()) {
                               $dosename= $rows['nama'];
                               echo "<option value='$dosename'>$dosename</option>";
                            }
                             ?>      
                        </select>     
                </td>
            </tr>
            <tr> 
                <td><h4><b>Dosen-2 </b></h4></td>
                <td><select class="form-control" name="dosen2" id="dosen2" aria-required="true" style="width:280px;">
                    <option value="-">-- Pilih Dosen(Wajib) --</option> 
                            <?php
                            $mysqli = new MySQLi("localhost","root","","pa2");
                            $resultset = $mysqli->query("SELECT nama from dosen where prodiutama = '$prod'");
                            while ($rows =$resultset->fetch_assoc()) {
                               $dosename= $rows['nama'];
                               echo "<option value='$dosename'>$dosename</option>";
                            }

                             ?>      
                        </select>     
                </td>
            </tr>
            <tr> 
                <td><h4><b>Dosen-3 </b></h4></td>
                <td><select class="form-control" name="dosen3" id="dosen3" style="width:280px;">
                    <option value="-">-- Pilih Dosen(Opsional) --</option> 
                            <?php
                           $mysqli = new MySQLi("localhost","root","","pa2");
                            $resultset = $mysqli->query("SELECT nama from dosen where prodiutama = '$prod'");
                            while ($rows =$resultset->fetch_assoc()) {
                               $dosename= $rows['nama'];
                               echo "<option value='$dosename'>$dosename</option>";
                            }

                             ?>      
                        </select>     
                </td>
            </tr>
            <tr> 
                <td><h4><b>Dosen-4 </b></h4></td>
                <td><select class="form-control" name="dosen4" id="dosen4" style="width:280px;">
                    <option value="-">-- Pilih Dosen(Opsional) --</option> 
                            <?php
                           $mysqli = new MySQLi("localhost","root","","pa2");
                            $resultset = $mysqli->query("SELECT nama from dosen where prodiutama = '$prod'");
                            while ($rows =$resultset->fetch_assoc()) {
                               $dosename= $rows['nama'];
                               echo "<option value='$dosename'>$dosename</option>";
                           }

                             ?>      
                        </select>     
                </td>
            </tr>
            <tr> 
                <td><h4><b>Dosen-5 </b></h4></td>
                <td><select class="form-control" name="dosen5" id="dosen5" style="width:280px;">
                    <option value="-">-- Pilih Dosen(Opsional) --</option> 
                            <?php
                            $mysqli = new MySQLi("localhost","root","","pa2");
                            $resultset = $mysqli->query("SELECT nama from dosen where prodiutama = '$prod'");
                            while ($rows =$resultset->fetch_assoc()) {
                               $dosename= $rows['nama'];
                                echo "<option value='$dosename'>$dosename</option>";
                           }

                             ?>      
                        </select>     
                </td>
            </tr>

            <tr> 
                <td><h4><b>Upload File   </b></h4></td>
                <td>
                <input class="form-control" type="file" name="upload" id="upload" style="width:280px;"/>
                </td>
            </tr>

            <tr>
                <td><h4><b>Deskripsi </b></h4></td>
                <td>
                        <textarea rows="5" cols="60" name="deskripsi" id="deskripsi"></textarea><br/> 
                </td>
            </tr>

            
            <br>
            <br>
            <tr>
                <td colspan="2">
                    <button type='submit' name="submit" class='btn btn-success center-block' style="margin-bottom:20px;">Upload</button>
                </td>
            </tr>     
    
        </table>
    </form>
    

<br>
</div>
</div>
</div>
</div>

<!-- Melakukan koneksi ke dalam folder layout untuk mendapatkan footer -->
<?php
    require_once('layout/footer.php');
}
?>

