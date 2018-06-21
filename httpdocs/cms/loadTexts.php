<?php
	
	function decodeText($text) {
		$text = stripslashes($text);
		$text = html_entity_decode($text, ENT_QUOTES);
		return $text;
	}
	
	function loadTitle($id) {
		require 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT title FROM pages WHERE id=?")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($title);
			$stmt->fetch();
			return decodeText($title);
			$stmt->close();
		}
		
		$mysqli->close();
	}
	
	function loadText($id, $selection) {
		require 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT title, text1 FROM pages WHERE id=?")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($title, $text1);
			$stmt->fetch();
			
			if($selection == "title") {
				return decodeText($title);
			} else if($selection == "text1") {
				return decodeText($text1);
			}
			
			$stmt->close();
		}
		
		$mysqli->close();
	}

?>