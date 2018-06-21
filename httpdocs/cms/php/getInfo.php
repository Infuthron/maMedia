<?php

	session_start();
	
	if(isset($_SESSION["userId"])) {
		require_once 'php/private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT userId FROM users WHERE userId=?")) {
			$stmt->bind_param("s", $_SESSION["userId"]);
			$stmt->execute();
			$stmt->bind_result($foundId);
			$stmt->fetch();
			$stmt->close();
		}
		
		if(($foundId == "") || ($foundId == null) || ($foundId != $_SESSION["userId"])) {
			$_SESSION["errorText"] = "U hebt geen toestemming om deze pagina te bezoeken.";
			header("Location: ../error.php");
			exit;
		}
		
		$mysqli->close();
	} else {
		$_SESSION["errorText"] = "U hebt geen toestemming om deze pagina te bezoeken.";
		header("Location: ../error.php");
		exit;
	}
	
?>