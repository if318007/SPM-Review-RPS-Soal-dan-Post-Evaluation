<?php 
require 'functions.php';
$nidn = $_GET["nidn"];
$id = $_GET["id"];

if(hapus($nidn,$id) > 0){
	echo "
		<script>
			alert('Data berhasil dihapus');
			document.location.href = 'reviewFile.php';
		</script> 
		 ";
}
else{
	echo "
		<script>
			alert('Maaf Tidak bisa karena anda bukan owner forum tersebut');
			document.location.href = 'reviewFile.php';
		</script> 
		 ";
}
?>