<?php 

	include_once 'php/getInfo.php';
	require_once 'php/loadIndex.php';
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
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
			<!-- Navigation -->
			<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
				<a class="navbar-brand js-scroll-trigger" style="padding: 0;" href="../#pageTop">
					<img src="../images/logos/<?php echo loadLogo(1); ?>" class="fitLogo" alt="logo"> </a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
						aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

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
			</nav><div style="width: 100%; padding: 10px; background-color: #DB2581; margin: -20px 0 20px;">
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
			<h1 style="text-align: center;">Personeel</h1>
			<div class="portfolioLeft">
				<form style="margin: 0 auto; width: 80%; text-align: center; background-color: #d9d9d9; border-radius: 5px; padding: 10px;" method="post" enctype="multipart/form-data">
					<img src="../images/personeel/default.png" alt="Profiel afbeelding" id="imageDisplay" style="width: 100%; max-width: 300px; display: block; margin: 0 auto; margin-bottom: 15px;">
					<input spellcheck="false" required name="name" style="max-width: 350px; margin-bottom: 15px;" type="text" placeholder="Naam"/>
					<input name="profileImage" type="file" id="profileImage" accept="image/*" required/>
					<label for="profileImage" style="margin-bottom: 15px; margin-right: 0;" class="acceptButton cvButton">Afbeelding</label>
					<textarea spellcheck="false" required name="text" rows="10" cols="20" placeholder="Beschrijving van de persoon"></textarea>
					<input name="submitType" type="submit" value="Toevoegen"/>
				</form>
			</div>
			<div class="portfolioRight">
				<div class="center2" style="margin: 0;">
					<div class="container">
						<div class="row">
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
										
										$inputName = encodeString($_POST["name"]);
										$inputText = encodeString($_POST["text"]);
											
										if(($inputName != "") || ($inputText != "") || (!empty($_FILES['profileImage']['name']))) {
											
											$ext = strtolower(pathinfo($_FILES['profileImage']['name'],PATHINFO_EXTENSION));
											if ($ext == "png" || $ext == "jpg" || $ext == "gif") {
												$filename = time().'.'.pathinfo($_FILES['profileImage']['name'],PATHINFO_EXTENSION);
												if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], '../images/personeel/'.$filename)){
													
													// --------------------------------------------------------------------------------------
													
													require 'php/private/prepare.php';

													if ($stmt = $mysqli->prepare("INSERT INTO personeel (naam, image, text) VALUES (?, ?, ?)")) {
														$stmt->bind_param("sss", $inputName, $filename, $inputText);
														$stmt->execute();
														$stmt->close();
														$mysqli->close();
													}
													
													showError("Success", "Deze persoon is successvol toegevoegd.");
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
										
									} else if($submitType == "Verwijderen") {
										$persoonId = encodeString($_POST["persoonId"]);
										require 'php/private/prepare.php';

										if ($stmt = $mysqli->prepare("SELECT image FROM personeel WHERE id=?")) {
											$stmt->bind_param("i", $persoonId);
											$stmt->execute();
											$stmt->bind_result($imageName);
											$stmt->fetch();
											$imageName = "../images/personeel/" . $imageName;
											if (file_exists($imageName)) {
												unlink ($imageName);
											}
											$stmt->close();
										}
										
										$mysqli->close();
										
										require 'php/private/prepare.php';

										if ($stmt = $mysqli->prepare("DELETE FROM personeel WHERE id=?")) {
											$stmt->bind_param("i", $persoonId);
											$stmt->execute();
											showError("Success", "De geselecteerde persoon is successvol verwijderd.");
											$stmt->close();
										}
										
										$mysqli->close();
									} else if($submitType == "Aanpassen") {
										$inputName = encodeString($_POST["newName"]);
										$inputText = encodeString($_POST["newText"]);
										$persoonId = encodeString($_POST["persoonId"]);
											
										if(($inputName != "") || ($inputText != "")) {
											if(!empty($_FILES['newProfileImage']['name'])) {
												require 'php/private/prepare.php';

												if ($stmt = $mysqli->prepare("SELECT image FROM personeel WHERE id=?")) {
													$stmt->bind_param("i", $persoonId);
													$stmt->execute();
													$stmt->bind_result($imageName);
													$stmt->fetch();
													$imageName = "../images/personeel/" . $imageName;
													if (file_exists($imageName)) {
														unlink($imageName);
													}
													
													$stmt->close();
												}
												
												$mysqli->close();
											
												$ext = strtolower(pathinfo($_FILES['newProfileImage']['name'],PATHINFO_EXTENSION));
												if ($ext == "png" || $ext == "jpg" || $ext == "gif") {
													$filename = time().'.'.pathinfo($_FILES['newProfileImage']['name'],PATHINFO_EXTENSION);
													if(move_uploaded_file($_FILES["newProfileImage"]["tmp_name"], '../images/personeel/'.$filename)) {
														
														require 'php/private/prepare.php';

														if ($stmt = $mysqli->prepare("UPDATE personeel SET naam=?, image=?, text=? WHERE id=?")) {
															$stmt->bind_param("sssi", $inputName, $filename, $inputText, $persoonId);
															$stmt->execute();
															$stmt->close();
															$mysqli->close();
														}
														
														showError("Success", "Deze persoon is successvol aangepast.");
													} else {
														showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
														exit;
													}
												} else {
													showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een afbeelding of een GIF.");
													exit;
												}
											} else {
												require 'php/private/prepare.php';

												if ($stmt = $mysqli->prepare("UPDATE personeel SET naam=?, text=? WHERE id=?")) {
													$stmt->bind_param("sss", $inputName, $inputText, $persoonId);
													$stmt->execute();
													$stmt->close();
													$mysqli->close();
												}
												
												showError("Success", "Deze persoon is successvol aangepast.");
											}
										} else {
											showError("Foutmelding", "Vul alstublieft alle velden in.");
											exit;
										}
									}
								}
							
								function decodeText($text) {
									$text = stripslashes($text);
									$text = html_entity_decode($text, ENT_QUOTES);
									return $text;
								}
								
								require 'php/private/prepare.php';

								if ($stmt = $mysqli->prepare("SELECT id, naam, image, text FROM personeel")) {
									$stmt->execute();
									$stmt->bind_result($persoonId, $name, $image, $text);
									
									while ($stmt->fetch()) {
										echo "<div class='col-md-3 col-sm-6 col-xs-12 col-padding' style='display: inline-block; min-width: 33.33%; padding-top: 0; padding-bottom: 0;'><div class='wrap'>";
										echo "<form method='post' enctype='multipart/form-data'>";
										echo "<div class='project2 col-centered'>";
										echo "<input type='file' name='newProfileImage' id='newProfileImage" . $persoonId . "' class='newProfileImage' data-persoonid='" . $persoonId . "' accept='image/*'/>";
										echo "<label for='newProfileImage" . $persoonId . "'><img src='../images/personeel/" . $image . "' alt='Afbeelding' style='max-width: 100%; max-height: 100%; height: auto; cursor: pointer;' id='imageDisplay" . $persoonId . "'></label></div>";
										echo "<input spellcheck='false' name='newName' type='text' class='form-control' style='margin-top: 10px; margin-bottom: 10px;' placeholder='Naam' value='" . $name . "'/>";
										echo "<textarea spellcheck='false' name='newText' class='form-control' style='min-height: 250px;' placeholder='Beschrijving van de persoon'>" . $text . "</textarea>";
										echo "<input type='hidden' name='persoonId' value='" . $persoonId . "'>";
										echo "<input name='submitType' style='min-width: 100%;' type='submit' value='Aanpassen'/><input type='submit' style='min-width: 100%;' name='submitType' value='Verwijderen'/></form>";
										echo "</div></div>";
									}
									
									$stmt->close();
								}
								
								$mysqli->close();
							
							?>
						</div>
					</div>
				</div>
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
		<script>
		
			var imageInput = document.getElementById("profileImage");
			var imageDisplay = document.getElementById("imageDisplay");
		
			imageInput.addEventListener("change", function(event) {
				var file = imageInput.files[0];
				
				if((!(file.type.match("image.*")))) {
					overlayMessage("Error", "Your file is not a valid image.");
					imageInput.value = "";
					return;
				}
				
				var reader  = new FileReader();
				reader.onload = function(e)  {
					imageDisplay.src = e.target.result;
				 }

				 reader.readAsDataURL(file);
			});
			
			var newProfileImage = document.getElementsByClassName("newProfileImage");
			
			for(var i = 0; i < newProfileImage.length; i++) {
				newProfileImage[i].addEventListener("change", function(event) {
					var personeelId = this.getAttribute("data-persoonid");
					var selectImageDisplay = "imageDisplay" + personeelId;
					var selectImage = "newProfileImage" + personeelId;
					var profileImageInput = document.getElementById(selectImage);
					var imageDisplay2 = document.getElementById(selectImageDisplay);
					var file = profileImageInput.files[0];
					
					if((!(file.type.match("image.*")))) {
						overlayMessage("Error", "Your file is not a valid image.");
						profileImageInput.value = "";
						return;
					}
					
					var reader  = new FileReader();
					reader.onload = function(e)  {
						imageDisplay2.src = e.target.result;
					 }

					 reader.readAsDataURL(file);
				});
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