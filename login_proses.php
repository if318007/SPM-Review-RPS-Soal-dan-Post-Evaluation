<?php
    ob_start();
    session_start();
    $user        = $_POST['username'];
    $password    = $_POST['password'];
    $_SESSION['username'] = $user;
    $_SESSION['id_akun'] = $uidakun;
        $Open = mysqli_connect("localhost","root","");
            if (!$Open){
            die ("Koneksi ke Engine MySQL Gagal !");
                }
        $Koneksi = mysqli_select_db($Open,"pa2");
            if (!$Koneksi){
            die ("Koneksi ke Database Gagal !");
            }
    $sql = "SELECT * FROM akun where username='$user'";
    $qry = mysqli_query($Open,$sql);
    $num = mysqli_num_rows($qry);
    $row = mysqli_fetch_array($qry);

    if ($num==0 OR $password!=$row['password']) {
    ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai !');
            document.location='login.php';
        </script>
    <?php
    }
    else {
        $_SESSION['login']=1;
        header("Location: dashboard.php");
    }
    mysqli_close($Open); //Tutup koneksi engine MySQL
?>