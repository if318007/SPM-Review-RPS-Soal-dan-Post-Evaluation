<?php 
require 'functions.php';
$id = $_GET["id"];

if(hapudf($id) > 0){
	echo "
		<script>
			alert('Dokumen berhasil dihapus');
			document.location.href = 'reviewFile.php';
		</script> 
		 ";
}
else{
	echo "
		<script>
			alert('Maaf Tidak bisa karena bukan dokumen anda');
			document.location.href = 'reviewFile.php';
		</script> 
		 ";
}
?>