<?php
	include('conn.php');
	session_start();
	$nama = $_SESSION['nama'];

	$result = mysqli_query($db, "SELECT * FROM t_jurnal1 WHERE nama = '$nama'; ");
	$row = mysqli_fetch_array($result);
	$nm = $row['nama'];
	$komen = $row['komentar'];
	$jml_komen = str_word_count($komen);
	echo "Nama: ";
	printf ("%s",$row["nama"]);
	echo "<br> Komentar: ";
	printf ("%s",$row["komentar"]);
	echo "<br> ada $jml_komen kata";

?>