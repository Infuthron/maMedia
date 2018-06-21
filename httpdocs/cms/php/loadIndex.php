<?php
	
	function decodeText1($text) {
		$text = stripslashes($text);
		$text = html_entity_decode($text, ENT_QUOTES);
		return $text;
	}
	
	function loadLogo($logoType) {
		include 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT filename FROM images WHERE id=?")) {
			$stmt->bind_param("i", $logoType);
			$stmt->execute();
			$stmt->bind_result($logo);
			$stmt->fetch();
			return decodeText1($logo);
			$stmt->close();
		}
		
		$mysqli->close();
	}
	
	function loadBackground($logoType) {
		include 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT filename FROM images WHERE id=?")) {
			$stmt->bind_param("i", $logoType);
			$stmt->execute();
			$stmt->bind_result($background);
			$stmt->fetch();
			
			$position = strrpos($background, '.');
			$backgroundType = $position === false ? $background : substr($background, $position + 1);
			return $backgroundType;
			
			$stmt->close();
		}
		
		$mysqli->close();
	}

?>