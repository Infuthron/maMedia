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

		if ($stmt = $mysqli->prepare("SELECT text1, text2 FROM pages WHERE id=?")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($text1, $text2);
			$stmt->fetch();
			
			if($selection == "text1") {
				$text1 = decodeText($text1);
				
				$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

				if(preg_match($reg_exUrl, $text1, $url)) {
					   echo preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text1);
				} else {
					return $text1;
				}
			} else if($selection == "text2") {
				$text2 = decodeText($text2);
				
				$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

				if(preg_match($reg_exUrl, $text2, $url)) {
					   echo preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text2);
				} else {
					return $text2;
				}
			}
			
			$stmt->close();
		}
		
		$mysqli->close();
	}

?>