<?php 

	require_once 'php/getInfo.php';
	require_once 'php/loadTexts.php';
	require_once 'php/loadIndex.php';
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../images/logos/<?php echo loadLogo(2); ?>" type="image/*" sizes="16x16"/>
		<title>Mamedia - CMS</title>
		<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
		<link href="../css/style.css" rel="stylesheet">
		<link href="../css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="../dist/css/swiper.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div id="overlay" onclick="closeOverlay()">
			<div id="overlayContent">
				<h1 id="overlayTitle"></h1>
				<p id="overlayMessage"></p>
				<button class="acceptButton">Ok</button>
			</div>
		</div>
		<script src="../js/overlayMessage.js"></script>
		<?php
		
			function showError($title, $message) {
				echo "<script>overlayMessage('" . $title ."', '" . $message . "')</script>";
			}
			
			function encodeString($string) {
				$string = trim($string);
				$string = addslashes($string);
				$string = htmlentities($string, ENT_QUOTES);
				return $string;
			}
			
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$pageId = encodeString($_POST["id"]);
				
				if (($pageId == 1) || ($pageId == 5)) {
					if($pageId == 1) {
						$title = encodeString($_POST["title"]);
						include 'php/private/prepare.php';
						
						$stmt = $mysqli->prepare("UPDATE pages SET title=? WHERE id=?");
						$stmt->bind_param("si", $title, $pageId);
						if(!$stmt->execute()) {
							showError("Foutmelding", "Er is iets foutgegaan.");
							exit;
						}
						
						$stmt->close();
						$mysqli->close();
						
						$imageId = 3;
					} else {
						$title = encodeString($_POST["title"]);
						$text1 = encodeString($_POST["text1"]);
						$text2 = encodeString($_POST["text2"]);
						include 'php/private/prepare.php';
						
						$stmt = $mysqli->prepare("UPDATE pages SET title=?, text1=?, text2=? WHERE id=?");
						$stmt->bind_param("sssi", $title, $text1, $text2, $pageId);
						if(!$stmt->execute()) {
							showError("Foutmelding", "Er is iets foutgegaan.");
							exit;
						}
						
						$stmt->close();
						$mysqli->close();
						
						$imageId = 5;
					}
					
					if(isset($_POST["mute"]) && encodeString($_POST["mute"]) == "false") {
						$mute = "false";
					} else {
						$mute = "true";
					}
					
					require 'php/private/prepare.php';

					if ($stmt = $mysqli->prepare("UPDATE images SET muted=? WHERE id=?")) {
						$stmt->bind_param("si", $mute, $imageId);
						$stmt->execute();
						$stmt->close();
						$mysqli->close();
					}
					
					showError("Success", "De verandering is successvol voldaan.");
					
					if($pageId == 1) {
						if(!empty($_FILES['backgroundInput']['name'])) {
							$ext = strtolower(pathinfo($_FILES['backgroundInput']['name'],PATHINFO_EXTENSION));
							if ($ext == "mp4" || $ext == "wav" || $ext == "ogg" || $ext == "png" || $ext == "jpg" || $ext == "gif" || $ext == "svg") {
								$filename = time().'.'.pathinfo($_FILES['backgroundInput']['name'],PATHINFO_EXTENSION);
								if(move_uploaded_file($_FILES["backgroundInput"]["tmp_name"], '../images/logos/'.$filename)){
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("SELECT filename FROM images WHERE id=?")) {
										$stmt->bind_param("i", $imageId);
										$stmt->execute();
										$stmt->bind_result($imageName);
										$stmt->fetch();
										$imageName = "../images/logos/" . $imageName;
										if (file_exists($imageName)) {
											unlink ($imageName);
										}
										$stmt->close();
									}
									
									$mysqli->close();
									
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("UPDATE images SET filename=? WHERE id=?")) {
										$stmt->bind_param("si", $filename, $imageId);
										$stmt->execute();
										$stmt->close();
										$mysqli->close();
									}
									
									showError("Success", "De verandering is successvol voldaan.");
								} else {
									showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
									exit;
								}
							} else {
								showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een afbeelding, video of een GIF.");
								exit;
							}
						}
					} else {
						if(!empty($_FILES['backgroundInput2']['name'])) {
							$ext = strtolower(pathinfo($_FILES['backgroundInput2']['name'],PATHINFO_EXTENSION));
							if ($ext == "mp4" || $ext == "wav" || $ext == "ogg") {
								$filename = time().'.'.pathinfo($_FILES['backgroundInput2']['name'],PATHINFO_EXTENSION);
								if(move_uploaded_file($_FILES["backgroundInput2"]["tmp_name"], '../images/logos/'.$filename)){
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("SELECT filename FROM images WHERE id=?")) {
										$stmt->bind_param("i", $imageId);
										$stmt->execute();
										$stmt->bind_result($imageName);
										$stmt->fetch();
										$imageName = "../images/logos/" . $imageName;
										if (file_exists($imageName)) {
											unlink ($imageName);
										}
										$stmt->close();
									}
									
									$mysqli->close();
									
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("UPDATE images SET filename=? WHERE id=?")) {
										$stmt->bind_param("si", $filename, $imageId);
										$stmt->execute();
										$stmt->close();
										$mysqli->close();
									}
									
									showError("Success", "De verandering is successvol voldaan.");
								} else {
									showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
									exit;
								}
							} else {
								showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een video.");
								exit;
							}
						}
					}
				} else if($pageId == 8) {
					
					if(!empty($_FILES['backupImage1']['name'])) {
							$ext = strtolower(pathinfo($_FILES['backupImage1']['name'],PATHINFO_EXTENSION));
							if ($ext == "png" || $ext == "jpg" || $ext == "gif" || $ext == "svg") {
								$filename = time().'.'.pathinfo($_FILES['backupImage1']['name'],PATHINFO_EXTENSION);
								if(move_uploaded_file($_FILES["backupImage1"]["tmp_name"], '../images/logos/'.$filename)){
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("SELECT filename FROM images WHERE id=?")) {
										$stmt->bind_param("i", $pageId);
										$stmt->execute();
										$stmt->bind_result($imageName);
										$stmt->fetch();
										$imageName = "../images/logos/" . $imageName;
										if (file_exists($imageName)) {
											unlink ($imageName);
										}
										$stmt->close();
									}
									
									$mysqli->close();
									
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("UPDATE images SET filename=? WHERE id=?")) {
										$stmt->bind_param("si", $filename, $pageId);
										$stmt->execute();
										$stmt->close();
										$mysqli->close();
									}
									
									showError("Success", "De verandering is successvol voldaan.");
								} else {
									showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
									exit;
								}
							} else {
								showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een afbeelding of een gif.");
								exit;
							}
						}
					
				} else if($pageId == 7) {
					
					if(!empty($_FILES['backupImage2']['name'])) {
							$ext = strtolower(pathinfo($_FILES['backupImage2']['name'],PATHINFO_EXTENSION));
							if ($ext == "png" || $ext == "jpg" || $ext == "gif" || $ext == "svg") {
								$filename = time().'.'.pathinfo($_FILES['backupImage2']['name'],PATHINFO_EXTENSION);
								if(move_uploaded_file($_FILES["backupImage2"]["tmp_name"], '../images/logos/'.$filename)){
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("SELECT filename FROM images WHERE id=?")) {
										$stmt->bind_param("i", $pageId);
										$stmt->execute();
										$stmt->bind_result($imageName);
										$stmt->fetch();
										$imageName = "../images/logos/" . $imageName;
										if (file_exists($imageName)) {
											unlink ($imageName);
										}
										$stmt->close();
									}
									
									$mysqli->close();
									
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("UPDATE images SET filename=? WHERE id=?")) {
										$stmt->bind_param("si", $filename, $pageId);
										$stmt->execute();
										$stmt->close();
										$mysqli->close();
									}
									
									showError("Success", "De verandering is successvol voldaan.");
								} else {
									showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
									exit;
								}
							} else {
								showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een afbeelding of een gif.");
								exit;
							}
						}
					
				} else if ($pageId == 2) {
				
					$title = encodeString($_POST["title"]);
					$text1 = encodeString($_POST["text1"]);
					$text2 = encodeString($_POST["text2"]);
					include 'php/private/prepare.php';
					
					$stmt = $mysqli->prepare("UPDATE pages SET title=?, text1=?, text2=? WHERE id=?");
					$stmt->bind_param("sssi", $title, $text1, $text2, $pageId);
					if(!$stmt->execute()) {
						showError("Foutmelding", "Er is iets foutgegaan.");
						exit;
					}
					
					$stmt->close();
					$mysqli->close();
					
					$imageId = 4;
					
					showError("Success", "De verandering is successvol voldaan.");
				
					if(!empty($_FILES['imageInput']['name'])) {
						$ext = strtolower(pathinfo($_FILES['imageInput']['name'],PATHINFO_EXTENSION));
						if ($ext == "png" || $ext == "jpg" || $ext == "gif" || $ext == "svg") {
							$filename = time().'.'.pathinfo($_FILES['imageInput']['name'],PATHINFO_EXTENSION);
							if(move_uploaded_file($_FILES["imageInput"]["tmp_name"], '../images/logos/'.$filename)){
								require 'php/private/prepare.php';

								if ($stmt = $mysqli->prepare("SELECT filename FROM images WHERE id=?")) {
									$stmt->bind_param("i", $imageId);
									$stmt->execute();
									$stmt->bind_result($imageName);
									$stmt->fetch();
									$imageName = "../images/logos/" . $imageName;
									if (file_exists($imageName)) {
										unlink ($imageName);
									}
									$stmt->close();
								}
								
								$mysqli->close();
								
								require 'php/private/prepare.php';

								if ($stmt = $mysqli->prepare("UPDATE images SET filename=? WHERE id=?")) {
									$stmt->bind_param("si", $filename, $imageId);
									$stmt->execute();
									$stmt->close();
									$mysqli->close();
								}
								
								showError("Success", "De verandering is successvol voldaan.");
							} else {
								showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
								exit;
							}
						} else {
							showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een afbeelding of een GIF.");
							exit;
						}
					}
				
				} else if ($pageId == 3) {
					$title = encodeString($_POST["title"]);
					$text1 = encodeString($_POST["text1"]);
					include 'php/private/prepare.php';
					
					$stmt = $mysqli->prepare("UPDATE pages SET title=?, text1=? WHERE id=?");
					$stmt->bind_param("ssi", $title, $text1, $pageId);
					if(!$stmt->execute()) {
						showError("Foutmelding", "Er is iets foutgegaan.");
						exit;
					}
					
					$stmt->close();
					$mysqli->close();
					showError("Success", "De verandering is successvol voldaan.");
				} else {
					$title = encodeString($_POST["title"]);
					$text1 = encodeString($_POST["text1"]);
					$text2 = encodeString($_POST["text2"]);
					include 'php/private/prepare.php';
					
					$stmt = $mysqli->prepare("UPDATE pages SET title=?, text1=?, text2=? WHERE id=?");
					$stmt->bind_param("sssi", $title, $text1, $text2, $pageId);
					if(!$stmt->execute()) {
						showError("Foutmelding", "Er is iets foutgegaan.");
						exit;
					}
					
					$stmt->close();
					$mysqli->close();
					showError("Success", "De verandering is successvol voldaan.");
				}
			}
		
		?>
		<div class="overflow">
			<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
				<a class="navbar-brand js-scroll-trigger" style="padding: 0;" href="../#pageTop">
					<img src="../images/logos/<?php echo loadLogo(1); ?>" class="fitLogo" alt="logo"> </a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="../#overons">Over ons</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="../#Portfolio">Portfolio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="../#Samenwerken">Samenwerken</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="../#Stage">Stage</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="../#Amsterdammertjes">Amsterdammertjes</a>
						</li>
						<li class="nav-item dropdown">
							<a class=" nav-link dropdown-toggle " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Reviews
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a class="nav-link" href="reviews?reviews=stage">Stage reviews</a>
								</li>
								<li>
									<a class="nav-link" href="reviews?reviews=bedrijf">Bedrijfsreviews</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<div style="width: 100%; padding: 10px; background-color: #DB2581; margin: -20px 0 20px;">
				<a href="home" style="color: white;">Home teksten&nbsp;&nbsp; | </a>
				<a href="formulieren" style="color: white;">&nbsp;&nbsp;Formulieren&nbsp;&nbsp; | </a>
				<a href="afbeeldingen" style="color: white;">&nbsp;&nbsp;Logo's&nbsp;&nbsp; | </a>
				<a href="opdrachten" style="color: white;">&nbsp;&nbsp;Opdrachten&nbsp;&nbsp; | </a>
				<a href="portfolio" style="color: white;">&nbsp;&nbsp;Portfolio&nbsp;&nbsp; | </a>
				<a href="stage" style="color: white;">&nbsp;&nbsp;Stage&nbsp;&nbsp; |</a>
				<a href="personeel" style="color: white;">&nbsp;&nbsp;Team&nbsp;&nbsp; | </a>
				<a href="reviews?s=stage" style="color: white;">&nbsp;&nbsp;Stage reviews&nbsp;&nbsp; | </a>
				<a href="reviews?s=bedrijf" style="color: white;">&nbsp;&nbsp;Bedrijfsreviews&nbsp;&nbsp; | </a>
				<a href="gebruikers" style="color: white;">&nbsp;&nbsp;Gebruikers&nbsp;&nbsp; | </a>
				<a href="logout" style="color: white;">&nbsp;&nbsp;Uitloggen</a>
			</div>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<h1 style='text-align: center'>Home teksten</h1>
					<form method="post" style="margin: 0 auto; text-align: center; max-width: 700px; margin-bottom: 50px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;" enctype="multipart/form-data">
						<input type="hidden" name="id" value="1">
						
						<?php
						
							if((loadBackground(3) == "png") || (loadBackground(3) == "jpg") || (loadBackground(3) == "gif") || (loadBackground(3) == "svg")) {
								$enableVideo = false;
								echo "<img src='../images/logos/" . loadLogo(3) . "' alt='Achtergrond video/afbeelding' id='previewBox' style='width: 100%; max-width: 100%; display: block; margin: 0 auto; margin-bottom: 15px;'>";
							} else if((loadBackground(3) == "mp4") || (loadBackground(3) == "wav") || (loadBackground(3) == "ogg")) {
								$enableVideo = true;
								echo "<video id='previewBox' width='100%' height='100%' autoplay loop='loop'><source src='../images/logos/" . loadLogo(3) . "' type='video/" . loadBackground(3) . "' id='homeBackgroundDisplay'/></video>";
							}
						
						?>
						
						<input name="backgroundInput" type="file" id="backgroundInput" accept="image/*, video/*"/>
						<label for="backgroundInput" class="acceptButton cvButton" style="margin: 0; width: 200px; margin-left: calc(50% - 100px);">Afbeelding / video</label><br><br><br>
						<?php
						
							if($enableVideo == true) {
								echo "<div id='videoMuteDiv' style='width: 100%; height: 40px; margin: 0 auto; padding-top: 4px; margin-bottom: 0; text-align: center; margin-top: 15px;'>";
								echo "	<input type='checkbox' id='videoMute' name='mute' value='false' onclick='backgroundMute()' style='width: 15px; height: 15px; display: inline-block; margin-right: 5px;' title='Klik hier om geluid toe te staan'/><h3 style='display: inline-block; margin: 0;' title='Klik op de knop hiernaast om de geluid toe te staan'>Geluid toestaan</h3>";
								echo "</div>";
							}
						
						?>
						<div id='videoMuteDiv' style='display: none; width: 100%; height: 40px; margin: 0 auto; padding-top: 4px; margin-bottom: 0; text-align: center; margin-top: 15px;'>
						<input type='checkbox' id='videoMute' name='mute' value='false' onclick='backgroundMute()' style='width: 15px; height: 15px; display: inline-block; margin-right: 5px;' title='Klik hier om geluid toe te staan'/><h3 style='display: inline-block; margin: 0;' title='Klik op de knop hiernaast om de geluid toe te staan'>Geluid toestaan</h3>
						</div>
						<input spellcheck="false" type="text" name="title" style="margin-bottom: 15px; max-width: 350px; margin-left: calc(50% - 175px);" class="form-control" value="<?php echo loadTitle(1); ?>"/>
						<input name="editText" style="margin-top: 0;" type="submit" value="Verander">
					</form>
					<form method="post" style="margin: 0 auto; text-align: center; max-width: 700px; margin-bottom: 50px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;" enctype="multipart/form-data">
						<h2>Backup afbeelding</h2>
						<p>Als de website bekeken wordt op een smartphone, laden de video's niet omdat ze veel data verbruiken. Het is daarom nodig om een afbeelding te kiezen voor de mobiele website versie. Dit is de eerste afbeelding op de pagina.</p>
						<input type="hidden" name="id" value="8"/>
						<img src="../images/logos/<?php echo loadLogo(8); ?>" alt="Achtergrond afbeelding" id="previewBackup1" style="width: 100%; max-width: 100%; display: block; margin: 0 auto; margin-bottom: 15px;">
						<input name="backupImage1" type="file" id="backupImage1" accept="image/*"/>
						<label for="backupImage1" class="acceptButton cvButton" style="margin: 0; width: 200px; margin-left: calc(50% - 100px);">Afbeelding kiezen</label><br><br><br>
						<input style="margin-top: 0;" type="submit" value="Verander"/>
					</form>
					<form method="post" style="margin: 0 auto; text-align: center; max-width: 700px; margin-bottom: 50px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;" enctype="multipart/form-data">
						<input type="hidden" name="id" value="2">
						<img src="../images/logos/<?php echo loadLogo(4); ?>" alt="Afbeelding over ons" id="previewBox3" style="width: 100%; max-width: 100%; display: block; margin: 0 auto; margin-bottom: 15px;">
						<input name="imageInput" type="file" id="imageInput" accept="image/*"/>
						<label for="imageInput" class="acceptButton cvButton" style="margin: 0; width: 200px; margin-left: calc(50% - 100px);">Afbeelding kiezen</label><br><br><br>
						<input spellcheck="false" type="text" name="title" style="max-width: 350px; margin-bottom: 15px;" class="form-control" value="<?php echo loadTitle(2); ?>"/>
						<textarea spellcheck="false" style="width: 100%; height: 80px; margin: 0 auto; margin-bottom: 15px;" class="form-control" name="text1"><?php echo loadText(2, "text1"); ?></textarea>
						<textarea spellcheck="false" style="width: 100%; height: 400px; margin: 0 auto;" class="form-control" name="text2"><?php echo loadText(2, "text2"); ?></textarea>
						<input name="editText" type="submit" value="Verander" style="display: block;">
					</form>
					<form method="post" style="margin: 0 auto; text-align: center; max-width: 700px; margin-bottom: 50px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;">
						<input type="hidden" name="id" value="3">
						<input spellcheck="false" type="text" name="title" style="max-width: 350px; margin-bottom: 15px;" class="form-control" value="<?php echo loadTitle(3); ?>"/>
						<textarea spellcheck="false" style="width: 100%; height: 80px; margin: 0 auto; margin-bottom: 15px;" class="form-control" name="text1"><?php echo loadText(3, "text1"); ?></textarea>
						<input name="editText" type="submit" value="Verander" style="display: block;">
					</form>
					<form method="post" style="margin: 0 auto; text-align: center; max-width: 700px; margin-bottom: 50px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;">
						<input type="hidden" name="id" value="4">
						<input spellcheck="false" type="text" name="title" style="max-width: 350px; margin-bottom: 15px;" class="form-control" value="<?php echo loadTitle(4); ?>"/>
						<textarea spellcheck="false" style="width: 100%; height: 80px; margin: 0 auto; margin-bottom: 15px;" class="form-control" name="text1"><?php echo loadText(4, "text1"); ?></textarea>
						<textarea spellcheck="false" style="width: 100%; height: 400px; margin: 0 auto;" class="form-control" name="text2"><?php echo loadText(4, "text2"); ?></textarea>
						<input name="editText" type="submit" value="Verander" style="display: block;">
					</form>
					<form method="post" style="margin: 0 auto; text-align: center; max-width: 700px; margin-bottom: 50px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;" enctype="multipart/form-data">
						<input type="hidden" name="id" value="5">
						
						
						<video id="previewBox2" width="100%" height="100%" autoplay loop="loop">
							<source src="../images/logos/<?php echo loadLogo(5); ?>" type="video/<?php echo loadBackground(5); ?>" id="homeBackgroundDisplay2"/>
						</video>
						<div id="videoMuteDiv2" style="width: 100%; height: 40px; margin: 0 auto; padding-top: 4px; margin-bottom: 0; text-align: center; margin-top: 15px;">
							<input type="checkbox" id="videoMute2" name="mute" value="false" onclick="backgroundMute2()" style="width: 15px; height: 15px; display: inline-block; margin-right: 5px;" title="Klik hier om geluid toe te staan"><h3 style="display: inline-block; margin: 0;" title="Klik op de knop hiernaast om de geluid toe te staan">Geluid toestaan</h3>
						</div>
						
						<input name="backgroundInput2" type="file" id="backgroundInput2" accept="video/*"/>
						<label for="backgroundInput2" class="acceptButton cvButton" style="margin: 0; width: 200px; margin-left: calc(50% - 100px);">Video kiezen</label><br><br><br>
						
						
						<input spellcheck="false" type="text" name="title" style="max-width: 350px; margin-bottom: 15px;" class="form-control" value="<?php echo loadTitle(5); ?>"/>
						<textarea spellcheck="false" style="width: 100%; height: 80px; margin: 0 auto; margin-bottom: 15px;" class="form-control" name="text1"><?php echo loadText(5, "text1"); ?></textarea>
						<textarea spellcheck="false" style="width: 100%; height: 400px; margin: 0 auto;" class="form-control" name="text2"><?php echo loadText(5, "text2"); ?></textarea>
						<input name="editText" type="submit" value="Verander" style="display: block; margin: 10px auto 15px;">
					</form>
					<form method="post" style="margin: 0 auto; text-align: center; max-width: 700px; margin-bottom: 50px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;" enctype="multipart/form-data">
						<h2>Backup afbeelding</h2>
						<p>Als de website bekeken wordt op een smartphone, laden de video's niet omdat ze veel data verbruiken. Het is daarom nodig om een afbeelding te kiezen voor de mobiele website versie. Deze afbeelding verplaatst de video op de stage sectie.</p>
						<input type="hidden" name="id" value="7"/>
						<img src="../images/logos/<?php echo loadLogo(7); ?>" alt="Achtergrond afbeelding" id="previewBackup2" style="width: 100%; max-width: 100%; display: block; margin: 0 auto; margin-bottom: 15px;">
						<input name="backupImage2" type="file" id="backupImage2" accept="image/*"/>
						<label for="backupImage2" class="acceptButton cvButton" style="margin: 0; width: 200px; margin-left: calc(50% - 100px);">Afbeelding kiezen</label><br><br><br>
						<input style="margin-top: 0;" type="submit" value="Verander">
					</form>
					<form method="post" style="margin: 0 auto; text-align: center; max-width: 700px; margin-bottom: 50px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;">
						<input type="hidden" name="id" value="6">
						<input spellcheck="false" type="text" name="title" style="max-width: 350px; margin-bottom: 15px;" class="form-control" value="<?php echo loadTitle(6); ?>"/>
						<input type="hidden" name="text1" value=""/>
						<textarea spellcheck="false" style="width: 100%; height: 400px; margin: 0 auto;" class="form-control" name="text2"><?php echo loadText(6, "text2"); ?></textarea>
						<input name="editText" type="submit" value="Verander" style="display: block; margin: 10px auto 15px;">
					</form>
					
				<style>
					pre {
						font-family: inherit;
						white-space: pre-wrap;
					}
				</style>

				<style>
				pre{
					font-family: inherit;
					white-space: pre-wrap;
				}
			</style><div class="footer-section">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm12 col-xs-12">
							<img src="../images/logos/<?php echo loadLogo(1); ?>" class="fit2" alt="footer-logo">
							<p class="whitep"> Contactweg 36
								<br> 1014 AN Amsterdam </p>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12">
							<h5 class="white"> Postadres </h5>
							<p class="whitep"> Mediacollege Amsterdam
								<br> t.a.v. Mamedia
								<br> Postbus 67003
								<br> 1060 JA Amsterdam </p>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12">
							<h5 class="white"> Telefoon </h5>
							<a class="whitep" href="tel:0208509557">
								<p class="whitep"> 020 850 9557 </p>
							</a>
							<h5 class="top"> Email-adres </h5>
							<a href="mailto:mamediamail@gmail.com">
								<p class="whitep"> mamediamail@gmail.com </p>
							</a>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12 ">
							<h5 class="white"> Social media </h5>
							<div class="socialwrap">
								<a href="https://www.instagram.com/mamedia_/" target="blank">
									<div class="round3">
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</div>
								</a>
								<a href="https://www.facebook.com/mamedia.amsterdam" target="blank">
									<div class="round">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</div>
								</a>
								<a href="https://vimeo.com/mamedia" target="blank">
									<div class="round">
										<i class="fa fa-vimeo" aria-hidden="true"></i>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
		<script src="../dist/js/swiper.min.js"></script>
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../js/jqBootstrapValidation.js"></script>
		<script src="../js/style.js"></script>
		<script>
			
			var backgroundDisplay = document.getElementById("homeBackgroundDisplay");
			var backgroundInput = document.getElementById("backgroundInput");
			var imageInput = document.getElementById("imageInput");
			var imageDisplay = document.getElementById("previewBox2");
			var imageDisplay3 = document.getElementById("previewBox3");
			var previewBox = document.getElementById("previewBox");
			var videoMute = document.getElementById("videoMute");
			var videoMuteDiv = document.getElementById("videoMuteDiv");
			previewBox.muted = true;
			
			var previewBox2 = document.getElementById("previewBox2");
			var backgroundDisplay2 = document.getElementById("homeBackgroundDisplay2");
			var backgroundInput2 = document.getElementById("backgroundInput2");
			var videoMute2 = document.getElementById("videoMute2");
			var videoMuteDiv2 = document.getElementById("videoMuteDiv2");
			previewBox2.muted = true;
			var backupImage1 = document.getElementById("backupImage1");
			var backupPreview1 = document.getElementById("previewBackup1");
			var backupImage2 = document.getElementById("backupImage2");
			var backupPreview2 = document.getElementById("previewBackup2");
		
			backupImage1.addEventListener("change", function(event) {
				var file = backupImage1.files[0];
				
				if((!(file.type.match("image.*")))) {
					overlayMessage("Error", "Dit it geen goede afbeelding.");
					backupImage1.value = "";
					return;
				}
				
				var reader  = new FileReader();
				reader.onload = function(e)  {
					backupPreview1.src = e.target.result;
				 }

				 reader.readAsDataURL(file);
			});
			
			backupImage2.addEventListener("change", function(event) {
				var file = backupImage2.files[0];
				
				if((!(file.type.match("image.*")))) {
					overlayMessage("Error", "Dit it geen goede afbeelding.");
					backupImage2.value = "";
					return;
				}
				
				var reader  = new FileReader();
				reader.onload = function(e)  {
					backupPreview2.src = e.target.result;
				 }

				 reader.readAsDataURL(file);
			});
			
			function backgroundMute() {
				if(videoMute.checked) {
					var previewBox = document.getElementById("previewBox");
					previewBox.muted = false;
				} else {
					var previewBox = document.getElementById("previewBox");
					previewBox.muted = true;
				}
			}
			
			function backgroundMute2() {
				if(videoMute2.checked) {
					var previewBox2 = document.getElementById("previewBox2");
					previewBox2.muted = false;
				} else {
					var previewBox2 = document.getElementById("previewBox2");
					previewBox2.muted = true;
				}
			}
			
			backgroundInput.addEventListener("change", function(event) {
				var file = backgroundInput.files[0];
				
				if(backgroundInput.files.length != 0) {
					if(file.type.match("video.*")) {
						var previewBox = document.getElementById("previewBox");
						var videoElement = document.createElement("VIDEO");
						videoElement.setAttribute("width", "100%");
						videoElement.setAttribute("height", "100%");
						videoElement.setAttribute("autoplay", "");
						videoElement.setAttribute("muted", "muted");
						videoElement.setAttribute("loop", "loop");
						videoElement.setAttribute("id", "previewBox");
						
						var reader  = new FileReader();
						reader.onload = function(e)  {
							var videoSource = document.createElement("SOURCE");
							videoSource.setAttribute("src", e.target.result);
							var extension = file.name.substr(file.name.lastIndexOf(".") + 1);
							videoSource.setAttribute("type", "video/" + extension);
							
							videoElement.appendChild(videoSource);
						
							previewBox.parentNode.prepend(videoElement);
							previewBox.parentNode.removeChild(previewBox);
							videoMuteDiv.style.display = "block";
							previewBox = document.getElementById("previewBox");
							previewBox.muted = true;
							videoMute.checked = false;
						}
						
						reader.readAsDataURL(file);
					} else if(file.type.match("image.*")){
						var previewBox = document.getElementById("previewBox");
						var reader  = new FileReader();
						reader.onload = function(e)  {
							var imageElement = document.createElement("IMG");
							imageElement.setAttribute("src", e.target.result);
							imageElement.setAttribute("alt", "Achtergron video/afbeelding");
							imageElement.setAttribute("id", "previewBox");
							imageElement.setAttribute("style", "width: 100%; max-width: 300px; display: block; margin: 0 auto; margin-bottom: 15px;");
						
							previewBox.parentNode.prepend(imageElement);
							previewBox.parentNode.removeChild(previewBox);
						}

						 reader.readAsDataURL(file);
					}
				}
			});
			
			backgroundInput2.addEventListener("change", function(event) {
				var file = backgroundInput2.files[0];
				
				if(backgroundInput2.files.length != 0) {
					var previewBox2 = document.getElementById("previewBox2");
					var videoElement = document.createElement("VIDEO");
					videoElement.setAttribute("width", "100%");
					videoElement.setAttribute("height", "100%");
					videoElement.setAttribute("autoplay", "");
					videoElement.setAttribute("muted", "muted");
					videoElement.setAttribute("loop", "loop");
					videoElement.setAttribute("id", "previewBox2");
					
					var reader  = new FileReader();
					reader.onload = function(e)  {
						var videoSource = document.createElement("SOURCE");
						videoSource.setAttribute("src", e.target.result);
						var extension = file.name.substr(file.name.lastIndexOf(".") + 1);
						videoSource.setAttribute("type", "video/" + extension);
						
						videoElement.appendChild(videoSource);
					
						previewBox2.parentNode.prepend(videoElement);
						previewBox2.parentNode.removeChild(previewBox2);
						videoMuteDiv.style.display = "block";
						previewBox2 = document.getElementById("previewBox2");
						previewBox2.muted = true;
						videoMute2.checked = false;
					}
					
					reader.readAsDataURL(file);
				}
			});
			
			imageInput.addEventListener("change", function(event) {
				var file = imageInput.files[0];
				
				if(imageInput.files.length != 0) {
					var reader  = new FileReader();
					reader.onload = function(e)  {
						imageDisplay3.src = e.target.result;
					}

					 reader.readAsDataURL(file);
				}
			});
		
			var swiper = new Swiper('.swiper-container', {
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
			});
			function showMore(){
				$('.hidden:lt(4)').removeClass('hidden');
			};

			$(document).ready(function(){
				$('.hidden:lt(4)').removeClass('hidden');
				$('#show-more').on('click', showMore);
			});

			$(function () {
				AOS.init();
			});

		</script>
	</body>
</html>