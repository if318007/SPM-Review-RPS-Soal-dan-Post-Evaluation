<?php

$server = "localhost";
$user = "root";
$pass = "";

$database = "pa2";

$conect = mysqli_connect($server,$user,$pass,$database) or die("Error Connection Network, Check Your Database");

if(!$conect){
	echo "Koneksi Gagal";
}

?>