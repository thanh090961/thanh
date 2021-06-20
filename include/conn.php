
	<?php
	$server = "52.3.220.13";
	$user = "thanh090901";
	$pass = "thanh090901";
	$database = "computing";
	$connect = mysqli_connect($server, $user, $pass, $database); 
	 //if (!$connect) {
	  // die("Connect Failed:".mysqli_connect_error());
	 	# code...
	// }
	mysqli_set_charset($connect, 'UTF8');
?>
