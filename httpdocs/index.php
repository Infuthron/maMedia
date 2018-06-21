<?php 

	require_once 'php/loadIndex.php';
	$loadedProjects = array();
	if(loadBackground(3, "mute") == "false") {
		$mute1 = "";
	} else {
		$mute1 = "muted";
	}
	
	if(loadBackground(5, "mute") == "false") {
		$mute2 = "";
	} else {
		$mute2 = "muted";
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="images/logos/<?php echo loadLogo(2); ?>" type="image/*" sizes="16x16"/>
		<title>MaMedia</title>
		<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="dist/css/swiper.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script>
			
			var screenWidth = screen.width;
			document.cookie = "dWidth=" + screenWidth;
		
		</script>
		<?php
				
				//echo "<img src='images/logos/" . loadBackground(3, "source") . "' alt='img'>";
				//echo "<img src='images/logos/" . loadBackground(8, "source") . "' alt='img'>";
				
				if((loadBackground(3, "type") == "png") || (loadBackground(3, "type") == "jpg") || (loadBackground(3, "type") == "gif") || (loadBackground(3, "type") == "svg")) {
					echo "<style>.full { background-image: url('images/logos/" . loadLogo(3) . "'); fitler: brightness(50%); }</style>";
				} else if(($_COOKIE["dWidth"] < 700) && ((loadBackground(3, "type") != "png") || (loadBackground(3, "type") != "jpg") || (loadBackground(3, "type") != "gif") || (loadBackground(3, "type") != "svg"))) {
					echo "<style>.full { background-image: url('images/logos/" . loadLogo(8) . "'); fitler: brightness(50%); }</style>";
				}
			
		?>
	</head>
	<body>
		<div class="overflow" id="pageTop">
			<!-- Navigation -->
			<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
				<a class="navbar-brand js-scroll-trigger" style="padding: 0;" href="#pageTop">
					<img src="images/logos/<?php echo loadLogo(1); ?>" class="fitLogo" alt="logo"></a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fa fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="#overons">Over ons</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="#Portfolio">Portfolio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="#Samenwerken">Samenwerken</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="#Stage">Stage</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="#Amsterdammertjes">Amsterdammertjes</a>
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
			</nav>
			<!-- Navigation end -->
			<div class="full">
				<?php
					if(($_COOKIE["dWidth"] > 700) && ((loadBackground(3, "type") != "png") || (loadBackground(3, "type") != "jpg") || (loadBackground(3, "type") != "gif") || (loadBackground(3, "type") != "svg"))) {
						if((loadBackground(3, "type") == "mp4") || (loadBackground(3, "type") == "wav") || (loadBackground(3, "type") == "ogg")) {
							echo "<div class='vidv'><video id='video' style='fitler: brightness(50%);' class='homeVideo' " . $mute1 . " autoplay loop='loop'><source src='images/logos/" . loadBackground(3, "source") . "' type='video/" . loadBackground(3, "type") . "'/></video></div>";
						}
					}
				
				?>
				<div class="wrap">

					<div class="title">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12">
									<h1 class="animated  zoomInDown"><?php echo loadTitle(1); ?></h1>
								</div>
								<div class="col-xs-12 col-sm-6">
									<a class="js-scroll-trigger" href="#overons">
										<div class="buttonclass animated  zoomIn"> Wie wij zijn </div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-6">
									<a class="js-scroll-trigger" href="#Portfolio">
										<div class="buttonclass2 animated  zoomIn"> Bekijk ons werk </div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="full7" id="overons">
				<div class="bar">
					<div class="normal">
						<div class="col-xs-12">
							<h2><?php echo loadText2(2, "title"); ?></h2>
						</div>
						<div class="foto_overons">
                            <img src="images/logos/<?php echo loadLogo(4); ?>" alt="over ons image">
						</div>
						<div class="col-xs-12">
							<p class="smalltext">
								<?php echo loadText2(2, "text1"); ?>
							</p>
						</div>
					</div>
				</div>
				<div class="full4">
					<!--<div class="foto_overons">
						<img src="http://via.placeholder.com/1000x260" alt="over ons image"> </div>-->
					<div class="middlewrap">
						<pre class="smalltextwrap"><?php echo loadText2(2, "text2"); ?></pre>
					</div>
					<div class="social4">
						<h1 class="socal4font">HET TEAM</h1>
					</div>
					<div class="center2">
						<div class="container">
							<div class="row">
								<?php include 'php/loadPersonnel.php'; ?>
							</div>
						</div>
					</div>
					<div data-aos="zoom-in">
						<div class="social2">
							<h1 class="socal2font">Volg ons op social media</h1>
						</div>
						<div class="social3">
							<div class="size">
								<a href="https://www.instagram.com/mamedia_/" target="blank">
									<div class="round2">
										<i class="fa fa-instagram animated infinite tada" aria-hidden="true"></i>
									</div>
								</a>
								<a href="https://www.facebook.com/mamedia.amsterdam" target="blank">
									<div class="round2">
										<i class="fa fa-facebook animated infinite tada" aria-hidden="true"></i>
									</div>
								</a>
								<a href="https://vimeo.com/mamedia" target="blank">
									<div class="round2">
										<i class="fa fa-vimeo animated infinite tada" aria-hidden="true"></i>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="full5" id="Portfolio">
				<div class="bar4">
					<div class="normal">
						<div class="col-xs-12">
							<h2><?php echo loadText1(3, "title"); ?></h2>
						</div>
						<div class="col-xs-12">
							<p class="smalltext"><?php echo loadText1(3, "text1"); ?></p>
						</div>
					</div>
				</div>
				<div class="swiper-container ">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="container">
								<div class="row">
									<div class="stage" data-aos="fade-right">
										<p class="smaller">Swipe voor meer</p>

										<div class="swipe">
											<i class="fa fa-hand-o-down"></i>
										</div>
										<div class="swipe ontop">

											<i class="down fa fa-long-arrow-left"></i>
											<i class="down fa fa-long-arrow-right "></i>
										</div>

									</div>
								<!-- <div class="load-more-container">
						  <input type="checkbox" id="load-more"/>
						  <ul> -->
								
								<?php
								
									$loadedProjects = loadProjects($loadedProjects);
								
								?>
								
								</div>

						</div>
					</div>            <div class="swiper-slide">
						<div class="container">
							<div class="row">
								<div class="stage">
									<p class="smaller"> Swipe for more </p>

									<div class="swipe">
										<i class="fa fa-hand-o-down"></i>
									</div>
									<div class="swipe ontop">

										<i class="down fa fa-long-arrow-left"></i>
										<i class="down fa fa-long-arrow-right "></i>
									</div>

								</div>
								<?php
								
									$loadedProjects = loadProjects($loadedProjects);
								
								?>
							</div>
						</div>
					</div>
				</div>
				<!-- Add Arrows -->
				<div class="swiper-button-next">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>

				</div>
				<div class="swiper-button-prev">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>

				</div>
			</div>

		</div>
			<div class="full2" id="Samenwerken">
				<div class="bar4 ">
					<div class="normal">
						<div class="col-xs-12">
							<h2><?php echo loadText2(4, "title"); ?></h2>
						</div>
						<div class="col-xs-12">
							<p class="smalltext2"><?php echo loadText2(4, "text1"); ?></div>
					</div>
				</div>
				<div class="middlewrap">
				<pre class="smalltextwrap2"><?php echo loadText2(4, "text2"); ?></pre>
				</div>
				<div class="col-xs-12">
					<a class="js-scroll-trigger" href="contact">
						<div class="buttonclass3"> Neem contact op </div>
					</a>
				</div>

			</div>
			<div class="full2" id="Stage">
				<div class="bar">
					<div class="normal">
						<div class="col-xs-12">
							<h2><?php echo loadText2(5, "title"); ?></h2>
						</div>
						<?php
							
								if($_COOKIE["dWidth"] < 700) {
									echo "<div class='foto_overons'>
											<img src='images/logos/" . loadLogo(7) . "' alt='Stage afbeelding'>
										</div>";
								} else {
									echo "<video id='video' autoplay ". $mute2 . " loop='loop' style='max-width: 350px;'>";
									echo "	<source src='images/logos/" . loadBackground(5, "source") . "' type='video/mp4'>";
									echo "</video>";
								}
								
						?>
						<div class="col-xs-12">
							<p class="smalltext"><?php echo loadText2(5, "text1"); ?></p>
						</div>
					</div>
				</div>
				<!--<div class="foto_overons">
					<img src="http://via.placeholder.com/1000x250" alt="over ons image"> </div>-->
				<div class="middlewrap">
				<pre class="smalltextwrap"><?php echo loadText2(5, "text2"); ?></pre>
				</div>
				<div class="col-xs-12">
					<a class="js-scroll-trigger" href="vacature">
						<div class="buttonclass3"> Soliciteer nu </div>
					</a>
				</div>

			</div>
			<div class="bar1" id="Amsterdammertjes">
				<div class="normal" data-aos="zoom-in">
					<div class="col-xs-12">
						<h2 class="scale amsterdam"><?php echo loadText1(6, "title"); ?></h2>
					</div>
					<div class="col-xs-12">
						<pre style="color: #ffffff;" class="smalltext amsterdam"><?php echo loadText2(6, "text2"); ?></pre>
					</div>
					<div class="col-xs-12">
						<a class="js-scroll-trigger " target="blank" href="http://www.salto.nl/programma/amsterdammertjes/">
							<div class="buttonclass4"> Bekijk nu </div>
						</a>
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