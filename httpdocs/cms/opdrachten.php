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
				<h1 style='text-align: center'>Opdrachten</h1>        <div class="container">
						<table class="table table-hover">
							<thead>
							<tr>
								<th>Email</th>
								<th>Beschrijving</th>
								<th>Verwijder</th>
							</tr>
							</thead>
							<tbody>
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
										$opdrachtId = encodeString($_POST["opdrachtId"]);
										
										require 'php/private/prepare.php';

										if ($stmt = $mysqli->prepare("DELETE FROM opdrachten WHERE id=?")) {
											$stmt->bind_param("i", $opdrachtId);
											$stmt->execute();
											showError("Success", "De geselecteerde opdracht is successvol verwijderd.");
											$stmt->close();
										}
										
										$mysqli->close();
									}
								
									function decodeText($text) {
										$text = stripslashes($text);
										$text = html_entity_decode($text, ENT_QUOTES);
										return $text;
									}
									
									require 'php/private/prepare.php';

									if ($stmt = $mysqli->prepare("SELECT id, email, onderwerp, beschrijving FROM opdrachten")) {
										$stmt->execute();
										$stmt->bind_result($id, $email, $onderwerp, $beschrijving);
										
										while ($stmt->fetch()) {
											echo "<form method='post'><tr><input name='opdrachtId' type='hidden' value='" . $id . "'/><td>" . decodeText($email) . "<br><b>Onderwerp:</b><br>" . $onderwerp . "</td><td><pre>" . decodeText($beschrijving) . "</pre></td><td><input type='submit' value='Verwijder'></td></input></form>";
										}
										
										$stmt->close();
									}
									
									$mysqli->close();
								
								?>
							</tbody>
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
		<script src="../js/overlayMessage.js"></script>
		<script>
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