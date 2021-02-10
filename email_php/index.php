<?php

require_once('../layout/header.php');


?>

    <div class="container-fluid">
    <div class="col-md-12" style="padding-top: 20px; text-align: center;">
      <b><a href="../dashboard.php" style="color:green;">Kembali ke dashboard</a></b>
       
        </div>
    <div class="col-md-12" style="padding-top: 20px; text-align: center;">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_besar">
            Undang
         </button>
        </div>



       
         <div class="modal fade" id="modal_besar">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
      <div class="modal-header">
          <h4 class="modal-title">Undang dosen untuk mereview dokumen</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

    <div style="padding: 5px 30px;">
        <h2>Undang Dosen</h2>
        <hr />
        <form method="post" action="send.php" enctype="multipart/form-data">
            <div style="margin-bottom: 10px;">
                <label>Kepada</label><br />
                <!--<input type="email" name="email_penerima" placeholder="Email Penerima" style="margin-top: 5px;width: 400px" />-->
                   <td><input class="form-control" type="email" name="email_penerima"  style="width:320px;" placeholder="Masukkan email dosen yang ingin diundang..." /></td>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Subjek</label><br />
                <!--<input type="text" name="subjek" placeholder="Subjek" style="margin-top: 5px;width: 400px" />-->
                   <td><input class="form-control" type="text" name="subjek"  style="width:320px;" placeholder="Masukkan subjek..." /></td>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Pesan</label><br />
                <textarea name="pesan" placeholder="Pesan..." rows="8" style="margin-top: 5px;width: 400px"></textarea>
            </div>
            <div style="margin-bottom: 20px;">
                <label>Attachment</label><br />
                 <input class="form-control" type="file" name="attachment" style="width:280px;"/><p>Maksimal 25 MB</p>
            </div>
            <hr />
            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
    </div>


     
        <!-- Ini adalah Bagian Footer Modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


    <?php

require_once('../layout/footer.php');


?>
    


    


