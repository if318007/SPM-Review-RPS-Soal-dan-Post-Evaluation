<?php
require 'functions.php';
        $upload = $_GET["upload"];

        $tang = query("SELECT * FROM tanggapan where lampiran = $upload");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>

<body>
	<a href="download.php?upload=<?php $row['lampiran'];?>">download</a>
</body>
</html>