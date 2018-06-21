<?php
	
	require_once 'db.php';

	$mysqli = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
?>