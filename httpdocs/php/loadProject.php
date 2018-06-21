<?php

	function loadProject($id, $part) {
		
		include 'private/db1.php';
		
		$conn = new mysqli($servername, $username, $password, $database);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT titel, text, link FROM portfolio WHERE id='$id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($part == "title") {
					return decodeText($row["titel"]);
				} else if($part == "text") {	
				$text = decodeText($row["text"]);
				
				$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

				if(preg_match($reg_exUrl, $text, $url)) {
					   echo preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text);
				} else {
					return $text;
				}
				} else if($part == "link") {
					return $row["link"];
				}
			}
		} else {
			echo "Error, project niet gevonden.";
		}

		$conn->close();
	}
	
	function randomProjects() {
		include 'private/db1.php';

		$conn = new mysqli($servername, $username, $password, $database);
		if ($conn->connect_error) {
			die("Connectie verloren: " . $conn->connect_error);
		} 

		$sql = "SELECT id, filename FROM portfolio ORDER By RAND() LIMIT 2";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				
				echo "<div class='projectrandom'><a href='project?id=" . $row["id"] . "'>";
				echo "<img src='./images/thumbnail/" . $row["filename"] . "' alt='werk'></a>";
				echo "</div>";
				
			}
		} else {
			echo "Er zijn geen projecten te tonen.";
		}
		$conn->close();
	}
	
?>