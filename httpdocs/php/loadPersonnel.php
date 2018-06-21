<?php

	require 'private/prepare.php';

		if ($stmt = $mysqli->prepare("SELECT naam, image, text FROM personeel ORDER By id DESC")) {
			$stmt->execute();
			$stmt->bind_result($naam, $image, $text);
			
			while ($stmt->fetch()) {
				
				echo "<div class='col-md-3 col-sm-6 col-xs-12 col-padding'>";
				echo "<div class='wrap'>";
				echo "<div class='project2 col-centered' style='box-shadow: none; border: none;'>";
				echo "<img class='fit' src='./images/personeel/" . $image . "' alt='Profielfoto' style='max-width: 100%; max-height: 100%; height: auto;'>";
				echo "</div>";
				echo "<p class='naam' style='padding-top: 3px;'>" . $naam . "</p>";
				echo "<p class='beschrijving' style='max-height: 180px; overflow-y: auto;'>" . $text . "</p>";
				echo "</div>";
				echo "</div>";
		
			}
			
			$stmt->close();
		}
		
		$mysqli->close();

?>