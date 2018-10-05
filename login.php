<?php
	include('conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="login.php">
		<table>
			<tr>
				
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
			
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
			
				<td>Email</td>
				<td>:</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td colspan="3"><button type="submit" name="submit">SUBMIT</button></td>
			</tr>
		</table>
	</form>

<?php 
	if (isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$email= $_POST['email'];
	
		if (strlen($nama)>20) {
			echo "<script language='javascript'>alert('nama terlalu panjang');
					document.location('login.php');</script>";
		}
		if (is_numeric($nama)) {
			echo "<script language='javascript'>alert('nama mengandung angka');
					document.location('login.php');</script>";
		}
		if (strlen($nim)>10) {
			echo "<script language='javascript'>alert('nim maksimal 10 angka');
					document.location('login.php');</script>";
		}
		if (!is_numeric($nim)) {
			echo "<script language='javascript'>alert('nim bukan angka');
					document.location('login.php');</script>";
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<script language='javascript'>alert('email tidak valid');
					document.location('login.php');</script>";
		}
		if (strlen($nama)<=20 && strlen($nim)<=10 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
			session_start();
			$_SESSION['nama'] = $nama;
			mysqli_query($db, "INSERT INTO t_jurnal1(nim, nama, email) VALUES('$nim', '$nama', '$email');");
			
			echo "<script language='javascript'>alert('berhasil');
					document.location('komentar.php');</script>";
			
		}

	} ?>
</body>
</html>