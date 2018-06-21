<?php 

	require_once 'php/loadIndex.php';
	
	function encodeString($string) {
		$string = trim($string);
		$string = addslashes($string);
		$string = htmlentities($string, ENT_QUOTES);
		return $string;
	}
	
	$section = encodeString($_REQUEST["s"]);
	
	if(($section == "") || (($section != "stage") && ($section != "bedrijf"))) {
		$_SESSION["errorText"] = "Deze pagina bestaat niet.";
		header("Location: error.php");
		exit;
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="images/logos/<?php echo loadLogo(2); ?>" type="image/*" sizes="16x16"/>
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Mamedia - Reviews</title>
		<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="dist/css/swiper.css">
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
		<script src="js/overlayMessage.js"></script>
		<?php
		
			function showError($title, $message) {
				echo "<script>overlayMessage('" . $title ."', '" . $message . "')</script>";
			}
			
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$reviewStars = encodeString($_POST["stars"]);
				$reviewName = encodeString($_POST["naam"]);
				$reviewEmail = encodeString($_POST["email"]);
				$reviewText = encodeString($_POST["comment"]);
				$reviewIp = $_SERVER['REMOTE_ADDR'];
				$reviewTarget = $section;
				
				require 'php/private/prepare.php';

				if ($stmt = $mysqli->prepare("SELECT ip FROM bannedip WHERE ip=?")) {
					$stmt->bind_param("s", $reviewIp);
					$stmt->execute();
					$stmt->bind_result($foundIp);
					$stmt->fetch();
					if($stmt->num_rows > 0){
						showError("Waarschuwing", "U kunt geen beoordeling meer plaatsen omdat u verbannen bent.");
						exit;
					}
					$stmt->close();
				}
				
				$mysqli->close();
				
				require 'php/private/prepare.php';

				if ($stmt = $mysqli->prepare("SELECT email FROM bannedip WHERE email=?")) {
					$stmt->bind_param("s", $reviewEmail);
					$stmt->execute();
					$stmt->bind_result($foundEmail);
					$stmt->fetch();
					if($stmt->num_rows > 0){
						showError("Waarschuwing", "U kunt geen beoordeling meer plaatsen omdat u verbannen bent.");
						exit;
					}
					$stmt->close();
				}
				
				$mysqli->close();
				
				
				require 'php/private/prepare.php';

				if ($stmt = $mysqli->prepare("INSERT INTO reviews (ip, target, stars, comment, naam, email) VALUES (?, ?, ?, ?, ?, ?)")) {
					$stmt->bind_param("ssssss", $reviewIp, $reviewTarget, $reviewStars, $reviewText, $reviewName, $reviewEmail);
					$stmt->execute();
					$stmt->close();
					$mysqli->close();
				}
				
				showError("Success", "Uw beoordeling is successvol geplaatst.");
			}
		
		?>
		<div class="overflow">

				<!-- Navigation -->
				<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
					<a class="navbar-brand js-scroll-trigger" style="padding: 0;" href="#pageTop">
						<img src="images/logos/<?php echo loadLogo(1); ?>" class="fitLogo" alt="logo"> </a>
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
							aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

						<i class="fa fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="./#overons">Over ons</a>
							</li>
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="./#Portfolio">Portfolio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="./#Samenwerken">Samenwerken</a>
							</li>
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="./#Stage">Stage</a>
							</li>
							<li class="nav-item">
								<a class="nav-link js-scroll-trigger" href="./#Amsterdammertjes">Amsterdammertjes</a>
							</li>
							<li class="nav-item dropdown">
								<a class=" nav-link dropdown-toggle active2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Reviews
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a class="nav-link" href="reviews?s=stage">Reviews stage</a>
									</li>
									<li>
										<a class="nav-link" href="reviews?s=bedrijf">Reviews bedrijf</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>   <div class="papertrial">

				<a href="./" class="paper1 paper2 "><p class="no"><i class="fa fa-home" aria-hidden="true"></i>
			  Home / </p></a>


				<a href="reviews?s=<?php echo $section; ?>" class="paper paper2"><p class="no"><i class="fa fa-th" aria-hidden="true"></i>
				  Reviews <?php echo $section; ?>      / </p></a>


				<a href="maakReview?s=<?php echo $section; ?>" class="paper paper2"><p class="no"> <i class="fa fa-folder" aria-hidden="true"></i>
			Schrijf een review  </p></a>



			  </div>
			  <div class="full2" style="padding-bottom: 20px;">
			  <div class="bar2" style="margin-bottom: 20px;">
				<h2> SCHRIJF EEN REVIEW</h2>
			  </div>
			  <div class="intro">
			  <form method="post">
					<input type="text" name="naam" class="form-control" style="max-width: 350px; margin-left: calc(50% - 175px); margin-bottom: 15px;" placeholder="Naam" required/>
				<input type="email" name="email" class="form-control" style="max-width: 350px; margin-left: calc(50% - 175px);  margin-bottom: 5px;" placeholder="E-mailadres" required/>
			<div class="left5"> <p class="none"> Algemene score </p> </div>

				<div class="  review-container2 left4">
					<div onclick="document.getElementById('starsRating').value = 1" class="star"><span class="stararea">★</span></div>
					<div onclick="document.getElementById('starsRating').value = 2" class="star"><span class="stararea">★</span></div>
					<div onclick="document.getElementById('starsRating').value = 3" class="star"><span class="stararea">★</span></div>
					<div onclick="document.getElementById('starsRating').value = 4" class="star"><span class="stararea">★</span></div>
					<div onclick="document.getElementById('starsRating').value = 5" class="star"><span class="stararea">★</span></div>
					</div>
				<input type="hidden" name="stars" id="starsRating" value="0"/>
				<div class="left1"> 
					<p class="grijs">Klik om een score te geven</p>
				</div>
				<textarea  class="reviewtextarea form-control" style="margin-bottom: 10px;" name="comment" id="5" rows="3" placeholder="Beoordeling... " required></textarea>
			  <div class="knopcenter">
				<input type="submit" value="Beoordeling posten">
				</div>

			  </form><br>
				  </div>
			</div>
			  </div>

			<!--  <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>-->
			<!--  <script src="../dist/js/swiper.min.js"></script>-->
			  <script src="./vendor/jquery/jquery.min.js"></script>
			<!--  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
			<!--  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>-->
			<!--  <script src="../js/jqBootstrapValidation.js"></script>-->
			<!--  <script src="../js/style.js"></script>-->

			  <script>
				$(function() {
			  AOS.init();
			});
			  </script>
			<style>
				pre{
					font-family: inherit;
					white-space: pre-wrap;
				}
			</style><div class="footer-section">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm12 col-xs-12">
							<img src="images/logos/<?php echo loadLogo(1); ?>" class="fit2" alt="footer-logo">
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
		<script src="dist/js/swiper.min.js"></script>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="js/jqBootstrapValidation.js"></script>
		<script src="js/style.js"></script>

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