<?php 
	
	require_once 'php/getInfo.php';
	require_once 'php/loadIndex.php';
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../images/logos/<?php echo loadLogo(2); ?>" type="image/*" sizes="16x16"/>
		<meta name="description" content="">
		<meta name="author" content="">
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
		<div class="overflow">
			<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
				<a class="navbar-brand js-scroll-trigger" style="padding: 0;" href="../#pageTop">
					<img src="../images/logos/<?php echo loadLogo(1); ?>" class="fitLogo" alt="logo">
				</a>
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
									<a class="nav-link" href="reviews?reviews=stage">Reviews stage</a>
								</li>
								<li>
									<a class="nav-link" href="reviews?reviews=bedrijf">Reviews bedrijf</a>
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
				<h1 style='text-align: center'>Portfolio</h1>
				<div class="portfolioLeft">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin: 0 auto; width: 80%; background-color: #d9d9d9; border-radius: 5px; padding: 10px;" method="post" enctype="multipart/form-data">
						<input spellcheck="false" name="titel" type="text" class="form-control" placeholder="Titel" style="max-width: 350px;" required/>
						<p id="selectedThumbnail"></p>
						<input name="thumbnail" type="file" onchange="displayCVName()" id="thumbnailImage" accept="image/*" required/>
						<label for="thumbnailImage" class="acceptButton cvButton">Thumbnail</label>
						<input spellcheck="false" name="link" type="text" class="form-control" placeholder="Video link" required/>
						<textarea spellcheck="false" name="text" rows="10" cols="20" class="form-control" placeholder="Beschrijving" required></textarea>
						<input name="submitType" style="margin-left: 30px;" type="submit" value="Toevoegen"/>
					</form>
				</div>
				<style>.portfolios{
			margin: 0 auto;
			}
			.portfolios td{
			padding: 0 20px;
			}
			</style>
				<div class="portfolioRight">
					<table class="portfolios">
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
								$submitType = encodeString($_POST["submitType"]);
								
								if($submitType == "Toevoegen") {
									
									$inputTitle = encodeString($_POST["titel"]);
									$inputLink1 = encodeString($_POST["link"]);
									preg_match_all('!\d+!', $inputLink1, $inputLink2);
									$inputLink3 = implode($inputLink2[0]);
									$inputLink = "https://player.vimeo.com/video/" . $inputLink3;
									$inputText = encodeString($_POST["text"]);
									$uploadDate = date("d-m-Y");
										
									if(($inputTitle != "") || ($inputLink != "") || ($inputText != "") || (!empty($_FILES['thumbnail']['name']))) {
										
										$ext = strtolower(pathinfo($_FILES['thumbnail']['name'],PATHINFO_EXTENSION));
										if ($ext == "png" || $ext == "jpg" || $ext == "gif") {
											$filename = time().'.'.pathinfo($_FILES['thumbnail']['name'],PATHINFO_EXTENSION);
											if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"], '../images/thumbnail/'.$filename)){
												
												// --------------------------------------------------------------------------------------
												
												require 'php/private/prepare.php';

												if ($stmt = $mysqli->prepare("INSERT INTO portfolio (titel, text, link, filename, datum) VALUES (?, ?, ?, ?, ?)")) {
													$stmt->bind_param("sssss", $inputTitle, $inputText, $inputLink, $filename, $uploadDate);
													$stmt->execute();
													$stmt->close();
													$mysqli->close();
												}
												
												showError("Success", "Uw video is successvol toegevoegd aan de portfolio.");
											} else {
												showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
												exit;
											}
										} else {
											showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een afbeelding of een GIF.");
											exit;
										}
									} else {
										showError("Foutmelding", "Vul alstublieft alle velden in.");
										exit;
									}
									
								} else if($submitType == "Verwijder") {
									$videoId = encodeString($_POST["videoId"]);
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("DELETE FROM portfolio WHERE id=?")) {
										$stmt->bind_param("i", $videoId);
										$stmt->execute();
										showError("Success", "De geselecteerde video is successvol verwijderd uit de portfolio.");
										$stmt->close();
									}
									
									$mysqli->close();
								}
							}
						
							function decodeText($text) {
								$text = stripslashes($text);
								$text = html_entity_decode($text, ENT_QUOTES);
								return $text;
							}
							
							require 'php/private/prepare.php';

							if ($stmt = $mysqli->prepare("SELECT id, titel, filename FROM portfolio ORDER BY id DESC")) {
								$stmt->execute();
								$stmt->bind_result($videoId, $title, $fileName);
								
								while ($stmt->fetch()) {
									echo "<tr><form method='post'><input type='hidden' name='videoId' value='" . $videoId . "'/><td>" . $title . "</td><td><img height='100' src='../images/thumbnail/" . $fileName . "'></td><td><input type='submit' value='Verwijder' name='submitType'></td></form></tr>";
								}
								
								$stmt->close();
							}
							
							$mysqli->close();
						
						?>
					</table>
				</div>
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
			</style><div class="footer-section portfolioFooter">
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
		<script src="../js/overlayMessage.js"></script>
		<script>
		
			function displayCVName() {
				var fullpath = document.getElementById("thumbnailImage").value;
				var backslash = fullpath.lastIndexOf("\\");
				var filename = fullpath.substr(backslash+1);
				document.getElementById("selectedThumbnail").innerHTML = filename;
			}
			
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