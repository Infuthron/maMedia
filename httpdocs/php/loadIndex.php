<?php
	
	function decodeText($text) {
		$text = stripslashes($text);
		$text = html_entity_decode($text, ENT_QUOTES);
		return $text;
	}
	
	function loadTitle($id) {
		include 'private/prepare.php';

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
	
	function loadText1($id, $selection) {
		include 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT title, text1 FROM pages WHERE id=?")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($title, $text1);
			$stmt->fetch();
			
			if($selection == "title") {
				return decodeText($title);
			} else if($selection == "text1") {
				
				$text1 = decodeText($text1);
				
				$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

				if(preg_match($reg_exUrl, $text1, $url)) {
					   echo preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text1);
				} else {
					return $text1;
				}
			}
			
			$stmt->close();
		}
		
		$mysqli->close();
	}
	
	function loadText2($id, $selection) {
		include 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT title, text1, text2 FROM pages WHERE id=?")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($title, $text1, $text2);
			$stmt->fetch();
			
			if($selection == "title") {
				return decodeText($title);
			} else if($selection == "text1") {
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
	
	function loadLogo($logoType) {
		include 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT filename FROM images WHERE id=?")) {
			$stmt->bind_param("i", $logoType);
			$stmt->execute();
			$stmt->bind_result($logo);
			$stmt->fetch();
			return decodeText($logo);
			$stmt->close();
		}
		
		$mysqli->close();
	}
	
	function loadBackground($logoType, $section) {
		include 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT filename, muted FROM images WHERE id=?")) {
			$stmt->bind_param("i", $logoType);
			$stmt->execute();
			$stmt->bind_result($logo, $type);
			$stmt->fetch();
			if(decodeText($section) == "mute") {
				return decodeText($type);
			} else if(decodeText($section) == "source") {
				return decodeText($logo);
			} else if(decodeText($section) == "type") {
				$position = strrpos($logo, '.');
				$backgroundType = $position === false ? $logo : substr($logo, $position + 1);
				return $backgroundType;
			}
			
			$stmt->close();
		}
		
		$mysqli->close();
	}
	
	function loadProjects($loadedProjects) {
		require 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT id, titel, filename FROM portfolio ORDER BY rand() DESC LIMIT 8")) {
			$stmt->execute();
			$stmt->bind_result($projectId, $title, $fileName);
			
			while ($stmt->fetch()) {
				
				if(!in_array($projectId, $loadedProjects)) {
					echo "<a href='project?id=" . $projectId . "' class='col-md-3 col-sm-6 col-xs-12 col-padding'>";
					echo "	<div class='project1 col-centered'>";
					echo "		<img class='fit' src='images/thumbnail/" . $fileName . "' alt='werk'>";
					echo "		<div class='overlay'>";
					echo "			<div class='text'>" . decodeText($title) . "</div>";
					echo "		</div>";
					echo "	</div>";
					echo "</a>";
				}
				
				array_push($loadedProjects, $projectId);
		
			}
			
			$stmt->close();
		}
		
		$mysqli->close();
		return $loadedProjects;
	}
	
	include 'private/prepare.php';

	if ($stmt = $mysqli->prepare("SELECT COUNT(id) FROM portfolio")) {
		$stmt->execute();
		$stmt->bind_result($totalIdCount);
		$stmt->fetch();
		
		$totalIds = ceil($totalIdCount / 6);
		
		$stmt->close();
	}
	
	$mysqli->close();
	
	$loadedIds = array();
	
	function randomProjectSmall1($loadedIds, $totalIdCount) {
		require 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT id, titel, filename FROM portfolio ORDER BY rand() DESC LIMIT 1")) {
			$stmt->execute();
			$stmt->bind_result($projectId, $title, $fileName);
			
			while ($stmt->fetch()) {
				
				
					if(!in_array($projectId, $loadedIds)) {
						echo "<div class='projectrandom'><a href='project?id=" . $projectId . "'>";
						echo "<img src='./images/thumbnail/" . $fileName . "' alt='werk'></a>";
						array_push($loadedIds, $projectId);
						echo "</div>";
					} else {
						$loadedIds = randomProjectSmall1($loadedIds, $totalIdCount);
					}
		
			}
			
			$stmt->close();
		}
		
		$mysqli->close();
		return $loadedIds;
	}
	
	function randomProjectSmall($loadedIds, $totalIdCount) {
		require 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT id, titel, filename FROM portfolio ORDER BY rand() DESC LIMIT 2")) {
			$stmt->execute();
			$stmt->bind_result($projectId, $title, $fileName);
			
			while ($stmt->fetch()) {
				
				if(count($loadedIds) != $totalIdCount) {
					if(!in_array($projectId, $loadedIds)) {
						echo "<div class='projectrandom'><a href='project?id=" . $projectId . "'>";
						echo "<img src='./images/thumbnail/" . $fileName . "' alt='werk'></a>";
						array_push($loadedIds, $projectId);
						print_r($loadedIds);
						echo "</div>";
					} else {
						$loadedIds = randomProjectSmall1($loadedIds, $totalIdCount);
					}
				}
		
			}
			
			$stmt->close();
		}
		
		$mysqli->close();
		return $loadedIds;
	}

?>