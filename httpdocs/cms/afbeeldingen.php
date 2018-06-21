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
				$string = stripslashes($string);
				$string = htmlspecialchars($string);
				$string = htmlentities($string, ENT_QUOTES);
				return $string;
			}
			
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$imageId = encodeString($_POST["imageId"]);
				
				if ($imageId == "1") {
					if(!empty($_FILES['logoImage']['name'])) {
						$ext = strtolower(pathinfo($_FILES['logoImage']['name'],PATHINFO_EXTENSION));
						if ($ext == "png" || $ext == "jpg" || $ext == "gif" || $ext == "svg") {
							$filename = time().'.'.pathinfo($_FILES['logoImage']['name'],PATHINFO_EXTENSION);
							if(move_uploaded_file($_FILES["logoImage"]["tmp_name"], '../images/logos/'.$filename)){
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
								
								showError("Success", "De logo is successvol veranderd.");
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
				} else if($imageId == "2") {
					if(!empty($_FILES['faviconImage']['name'])) {
						$ext = strtolower(pathinfo($_FILES['faviconImage']['name'],PATHINFO_EXTENSION));
						if ($ext == "ico" || $ext == "png" || $ext == "jpg") {
							$filename = time().'.'.pathinfo($_FILES['faviconImage']['name'],PATHINFO_EXTENSION);
							if(move_uploaded_file($_FILES["faviconImage"]["tmp_name"], '../images/logos/'.$filename)){
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
								
								showError("Success", "De tab icoon is successvol veranderd. Om de verandering te kunnen zien moet u uw cache wissen.");
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
				<h1 style='text-align: center'>Logo's</h1>
					<div style="width: 500px; height: 40px; margin: 10px auto; text-align: center; margin-top: 15px;">
						<input type="checkbox" id="backgroundChange" onclick="changeBackground()" style="width: 15px; height: 15px; display: inline-block; margin-right: 5px;" title="Klik hier om de afbeelding beter te zien"/><h3 style="display: inline-block; margin: 0;" title="Klik op de knop hiernaast om de afbeelding beter te zien">Verander achtergrondkleur</h3>
					</div>
					<div style="text-align: center;">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formBackground" method="post" enctype="multipart/form-data" style="margin: 0 auto; text-align: center; max-width: 500px; margin-bottom: 30px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;">
							<h2 class="changeWhite">Logo</h2>
							<input type="hidden" name="imageId" value="1"/>
							<img src="../images/logos/<?php echo loadLogo(1); ?>" alt="Logo Mamedia" id="logoDisplay1" style="width: 100%; max-width: 300px; display: block; margin: 0 auto; margin-bottom: 15px;">
							<input name="logoImage" type="file" id="logoImage1" accept="image/*" required/>
							<label for="logoImage1" class="acceptButton cvButton" style="margin: 0; width: 200px; margin-left: calc(50% - 100px);">Afbeelding kiezen</label>
							<input type="submit" value="Opslaan"/>
						</form>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formBackground" method="post" enctype="multipart/form-data" style="margin: 0 auto; text-align: center; max-width: 500px; margin-bottom: 30px; background-color: #d9d9d9; border-radius: 5px; padding: 10px;">
							<h2 class="changeWhite" title="Het kleine icoontje boven in je tabblad">Tab icoon</h2>
							<input type="hidden" name="imageId" value="2"/>
							<img src="../images/logos/<?php echo loadLogo(2); ?>" alt="Logo Mamedia" id="logoDisplay2" style="width: 100%; max-width: 50px; display: block; margin: 0 auto; margin-bottom: 15px;">
							<input name="faviconImage" type="file" id="logoImage2" accept="image/*" required/>
							<label for="logoImage2" class="acceptButton cvButton" style="margin: 0; width: 200px; margin-left: calc(50% - 100px);">Afbeelding kiezen</label>
							<input type="submit" value="Opslaan"/>
						</form>
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
			
			var newProfileImage = document.getElementsByClassName("newProfileImage");
			var logoDisplay1 = document.getElementById("logoDisplay1");
			var logoInput1 = document.getElementById("logoImage1");
			var logoDisplay2 = document.getElementById("logoDisplay2");
			var logoInput2 = document.getElementById("logoImage2");
			var backgroundChange = document.getElementById("backgroundChange");
			var formBackgrounds = document.getElementsByClassName("formBackground");
			var changeWhite = document.getElementsByClassName("changeWhite");
			
			function changeBackground() {
				if(backgroundChange.checked == true) {
					for(var i = 0; i < formBackgrounds.length; i++) {
						formBackgrounds[i].style.backgroundColor = "#000000";
						changeWhite[i].style.color = "#ffffff";
					}
				} else {
					for(var i = 0; i < formBackgrounds.length; i++) {
						formBackgrounds[i].style.backgroundColor = "#d9d9d9";
						changeWhite[i].style.color = "";
					}
				}
			}
			
			logoInput1.addEventListener("change", function(event) {
				var file = logoInput1.files[0];
				
				if(logoInput1.files.length != 0) {
					if((!(file.type.match("image.*")))) {
						showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een afbeelding of een GIF.");
						logoInput1.value = "";
						return;
					}
				
					var reader  = new FileReader();
					reader.onload = function(e)  {
						logoDisplay1.src = e.target.result;
					 }

					 reader.readAsDataURL(file);
				}
			});
			
			logoInput2.addEventListener("change", function(event) {
				var file = logoInput2.files[0];
				
				if(logoInput2.files.length != 0) {
					if((!(file.type.match("image.*")))) {
						showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een afbeelding of een GIF.");
						logoInput2.value = "";
						return;
					}
				
					var reader  = new FileReader();
					reader.onload = function(e)  {
						logoDisplay2.src = e.target.result;
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