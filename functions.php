<?php
$conn = mysqli_connect("localhost","root","","pa2");
function query($query){
	global$conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row; 
	}
	return $rows;
}

function cari($keyword){
	$query = "SELECT * FROM dosen inner join dokumen
			  on dosen.nidn = dokumen.nidn inner join forum on dokumen.id_file = forum.id_forum
			  where prodiutama like '$keyword%' order by dokumen.id_file desc";
			return query($query);
}

function hapus($nidn, $id){
	global $conn;
	mysqli_query($conn,"DELETE FROM dokumen WHERE nidn = $nidn and id_file = $id");
	return mysqli_affected_rows($conn);
}

function hapusdf($id){
	global $conn;
	mysqli_query($conn,"DELETE dokumen_final FROM forum WHERE id_forum = $id");
	return mysqli_affected_rows($conn);
}
function editprofil($data){
	global $conn;
	$akun=mysqli_query($conn,"SELECT * FROM akun inner join dosen on akun.id_akun = dosen.nidn where username='".$_SESSION['username']."'");
	$row=mysqli_fetch_assoc($akun);
	$id_akun = $row['id_akun'];
	$golongan = htmlspecialchars($data["golongan"]);
	$email = htmlspecialchars($data["email"]);
	$matkul1 = htmlspecialchars($data["matkul1"]);
	$matkul2 = htmlspecialchars($data["matkul2"]);
	$matkul3 = htmlspecialchars($data["matkul3"]);

	$query = "UPDATE dosen set 
			  golongan='$golongan',
			  email = '$email',
			  matkul1 = '$matkul1',
			  matkul2 = '$matkul2',
			  matkul3 = '$matkul3'
			  where nidn = $id_akun
				";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}
?>