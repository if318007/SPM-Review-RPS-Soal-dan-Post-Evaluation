<?php
$username   = $_POST['username'];
$pass       = md5($_POST['password']);

include 'koneksi.php';

$user = mysqli_query($connect,"select * from akun where USERNAME='$username' and PASSWORD='$pass'");
$chek = mysqli_num_rows($user);
if($chek>0)
{
    header("location:dashboard.php");
}else
{
    header("location:login.php");
}
?>