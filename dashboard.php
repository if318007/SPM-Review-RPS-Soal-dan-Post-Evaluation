<?php
	require_once('Layout/header.php');
    if(!isset($_SESSION['login'])) {
    		session_start();
        include("login.php");
    }
    else {
?>
		<?php
			include 'functions.php';
			$notifikasi = query("SELECT * FROM notifikasi order BY id_notifikasi DESC");
		 ?>
	<!-- Dashboard -->
    <div class="container-fluid" id="content">
        <div class="row">
            <div class="col-sm-6 col-md-8">
			
            <!-- Carousel -->
			<a href="https://del.ac.id">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                     
                        <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                                            
                        <!-- Slides -->
                        <div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="img/Slide4.jpg" alt="...">
								<div class="carousel-caption">
								Slide 1
								</div>
							</div>
							<div class="item">
								<img src="img/Slide3.jpg" alt="...">
								<div class="carousel-caption">
								Slide 2
								</div>
							</div>
							<div class="item">
								<img src="img/Slide8.jpg" alt="...">
								<div class="carousel-caption">
								Slide 3
								</div>
							</div>	
							<div class="item">
								<img src="img/Slide7.jpg" alt="...">
								<div class="carousel-caption">
								Slide 4
								</div>
							</div>	
							<div class="item">
								<img src="img/Slide9.jpg" alt="...">
								<div class="carousel-caption">
								Slide 5
								</div>
							</div>	
                        </div>
                    
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>   
                        </a>
						
						</a>
						</div>
						
			</div>
			
			<div class="col-sm-6 col-md-4">
				<center>
					<h4>Tanggal dan Jam<br>
						<h5><b>
						<?php
							date_default_timezone_set('Asia/Jakarta'); // untuk format indonesia
							echo date('d M Y H:i:s'); // day tanggal M month bulan Y Year
							// H = Hours jam // i = menit // s = second detik
    					?></b>
						</h5>
					</h4>
				</center>

					<?php 
					require 'koneksi.php';

					$sql = $conect->query('select * from dokumen');
					$num = mysqli_num_rows($sql);

					$sql = $conect->query('select * from dosen');
					$num1 = mysqli_num_rows($sql);
				?>

				<div style="width: 390px; height: 0px; border: 1px #000 solid;"></div> <!-- membuat garis horixontal-->
				<h4>
					<span class="glyphicon glyphicon-bell"></span>
					<b>Notifikasi</b>
					<br><br>
					<table>
						<tr>
							<th>Forum</th>
							<th>Waktu</th>
						</tr>
						<?php foreach ($notifikasi as $row ) :?>
						<tr>
							<td><a href="<?= $row["pesan"]; ?>">Undangan Forum</a></td>
							<td><?= $row["waktu"]; ?></td>
						</tr>
						<?php endforeach; ?>
					</table>
					<br>
					<br>

					<br>
					<button class="btn btn-danger" data-toggle="modal" data-target="#modal_dokumen">Daftar Dokumen
						<span class="badge badge-light"><?php echo $num ?> </div>
					</button>

					<button class="btn btn-success" data-toggle="modal" data-target="#modal_dosen" style="margin-left:15px;">Daftar Dosen
						<span class="badge badge-light"><?php echo $num1 ?> </div>
					</button>

					
					
					<div class="modal fade" id="modal_dokumen">
    					<div class="modal-dialog">
      						<div class="modal-content">
      

        			<div class="modal-header">
          				<h4 class="modal-title">Dokumen yang masuk</h4>
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
        			</div>

        			<div class="modal-body">
					<?php
        				$conn = mysqli_connect("localhost","root","","pa2");
        				$result = mysqli_query($conn,"SELECT * FROM dokumen");
    				?>
					<table class="table table-hover text-center">
    				<thead>
    					<th class="text-center">Nama File</th>
					</thead>
					<tbody class="table-hover">
    				<?php while($row = mysqli_fetch_assoc($result)) :?>
    				<tr>
    				<td class="text-center"><?= $row["nama_file"]; ?></td>
    				</tr>
					<?php endwhile; ?>

					</tbody>
					</table>
        			</div>
        

        			<div class="modal-footer">
          				<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        			</div>    
      		</div>
    	</div>
  	</div>

  <!-- dosen -->
  					<div class="modal fade" id="modal_dosen">
    					<div class="modal-dialog">
      						<div class="modal-content">
      

        			<div class="modal-header">
          				<h4 class="modal-title">Daftar Dosen</h4>
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
        			</div>

        			<div class="modal-body">
					<?php
        				$conn = mysqli_connect("localhost","root","","pa2");
        				$result = mysqli_query($conn,"SELECT * FROM dosen");
    				?>
					<table class="table table-hover text-center">
    				<thead>
    					<th class="text-center">Nama</th>
					</thead>
					<tbody class="table-hover">
    				<?php while($row = mysqli_fetch_assoc($result)) :?>
    				<tr>
    				<td class="text-center"><?= $row["nama"]; ?></td>
    				</tr>
					<?php endwhile; ?>

					</tbody>
					</table>
        			</div>
        
       				 <div class="modal-footer">
          				<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        			</div>
			</div>
    	</div>
 	 </div>




				</h4>
			</div>
        </div>
	</div>
	<!-- Dashboard End-->  

<?php
    require_once('Layout/footer.php');
}
?>
