<?php require_once 'php/loadIndex.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="images/logos/<?php echo loadLogo(2); ?>" type="image/*" sizes="16x16"/>
		<title> Mamedia </title>
		<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="dist/css/swiper.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php
		
			require_once 'php/loadIndex.php';
			
		?>
	</head>
	<body>
		<div id="overlay" onclick="closeOverlay()">
			<div id="overlayContent">
				<h1 id="overlayTitle"></h1>
				<p id="overlayMessage"></p>
				<button class="acceptButton">Ok</button>
			</div>
		</div>
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
							<a class=" nav-link dropdown-toggle " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
			</nav>  <div class="papertrial">


			<a href="./" class="paper1 paper2"><p class="no"><i class="fa fa-home" aria-hidden="true"></i>
		  Home / </p></a>


			<a href="./#Stage" class="paper paper2"><p class="no"><i class="fa fa-th" aria-hidden="true"></i>
		 Stage / </p></a>


			<a href="vacature" class="paper paper2"><p class="no">  <i class="fa fa-folder" aria-hidden="true"></i>
		Vacature  </p></a>



		  </div>

		  <div class="full2">
		  <div class="bar2" style="margin-bottom: 15px;">
			<h2><?php echo loadText1(9, "title"); ?></h2>
		  </div>

		  <div class="intro">
			  <pre class="textbottom"><?php echo loadText1(9, "text1"); ?></pre>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="currentForm" enctype="multipart/form-data">
				<label for="fname"></label>
				<input type="text" class="form-control" name="email" placeholder="E-mailadres" required>
				<input type="text" class="form-control" name="function" placeholder="Functie" required>
				<label for="cv" class="acceptButton cvButton">Curriculum vitae</label>
				<p id="selectedCV"></p>
				<input type="file" id="cv" name="cv" onchange="displayCVName()" accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword" required>
				<textarea name="text" for="currentForm" class="form-control" rows="3" placeholder="Motivatie..." required></textarea>
				<div class="knopcenter">
					<input type="submit" class="form-control" value="Verzenden">
				</div>
			</form>
		</div>
		</div>
		  </div>
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
		<script src="js/overlayMessage.js"></script>
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
				$inputEmail = encodeString($_POST["email"]);
				$inputFunction = encodeString($_POST["function"]);
				$inputText = encodeString($_POST["text"]);
					
				if(($inputEmail != "") || ($inputFunction != "") || ($inputText != "") || (!empty($_FILES['cv']['name']))) {
					
					$ext = strtolower(pathinfo($_FILES['cv']['name'],PATHINFO_EXTENSION));
					if ($ext == "pdf" || $ext == "doc" || $ext == "docx") {
						$filename = time().'.'.pathinfo($_FILES['cv']['name'],PATHINFO_EXTENSION);
						if(move_uploaded_file($_FILES["cv"]["tmp_name"], 'images/cv/'.$filename)){
							
							// --------------------------------------------------------------------------------------
							
							require 'php/private/prepare.php';

							if ($stmt = $mysqli->prepare("INSERT INTO solicitatie (email, functie, cv, motivatie) VALUES (?, ?, ?, ?)")) {
								$stmt->bind_param("ssss", $inputEmail, $inputFunction, $filename, $inputText);
								$stmt->execute();
								$stmt->close();
								$mysqli->close();
							}
							
							require 'php/private/prepare.php';

							if ($stmt = $mysqli->prepare("SELECT MAX(id) FROM solicitatie")) {
								$stmt->bind_param();
								$stmt->execute();
								$stmt->bind_result($currentVacatureId);
								$stmt->fetch();
								$stmt->close();
							}
							
							$mysqli->close();
							
							// --------------------------------------------------------------------------------------
							
							$to = 'l.zuidema@ma-web.nl';
							$subject = 'Nieuwe vacature';
							$from = $inputEmail;

							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							
							$headers .= 'From: '.$from."\r\n".
								'Reply-To: '.$from."\r\n" .
								'X-Mailer: PHP/' . phpversion();

							$message = '<html><body>';
							$message .= '<h1>Vacature</h1>';
							$message .= '<p>Er is net een nieuwe vacature voor stage binnen gekomen! Bekijk het op de onderstaande link.</p><a href="http://www.mamedia.nl/admin?p=stage#' . $currentVacatureId . '">http://www.mamedia.nl/admin?p=stage#' . $currentVacatureId . '</a>';
							$message .= '</body></html>';

							if (mail($to, $subject, $message, $headers)){
								showError("Success", "Uw sollicitatie is successvol verzonden. U krijgt een kopie van de zojuist verstuurde sollicitatie in uw e-mail inbox.");
							} else {
								showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
								exit;
							}
						} else {
							showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
							exit;
						}
					} else {
						showError("Foutmelding", "Het geüploade bestandstype wordt niet ondersteund door dit systeem. Upload alstublieft een ander soort bestand.");
						exit;
					}
				} else {
					showError("Foutmelding", "Er is een fout opgetreden. Probeer het later nog eens.");
					exit;
				}
			}
			
		?>
		<script>
			
			function displayCVName() {
				var fullpath = document.getElementById("cv").value;
				var backslash = fullpath.lastIndexOf("\\");
				var filename = fullpath.substr(backslash+1);
				document.getElementById("selectedCV").innerHTML = filename;
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