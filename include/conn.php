
	<?php
	$server = "52.6.114.59";
	$user = "thanh090961";
	$pass = "thanh090901";
	$database = "website";
	$connect = mysqli_connect($server, $user, $pass, $database); 
	if (!$connect) {
		die("Connect Failed:".mysqli_connect_error());
		# code...
	}
	mysqli_set_charset($connect, 'UTF8');
?>
