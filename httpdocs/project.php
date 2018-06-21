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
	
		include_once 'php/loadProject.php';
		$projectId = decodeText($_GET["id"]);
		
	?>



</head><div class="overflow">

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
    </nav>
<div class="papertrial">

    <a href="./" class="paper1 paper2">
        <p class="no">
            <i class="fa fa-home" aria-hidden="true"></i>
            Home / </p>
    </a>


    <a href="./#Portfolio" class="paper paper2">
        <p class="no">
            <i class="fa fa-th" aria-hidden="true"></i>
            Portfolio / </p>
    </a>


    <a href="#" class="paper paper2">
        <p class="no">
            <i class="fa fa-folder" aria-hidden="true"></i>
            <?php echo loadProject($projectId, "title"); ?> </p>
    </a>
</div>
<div class="full2">
    <div class="bar2">
        <h2><?php echo loadProject($projectId, "title"); ?></h2>
    </div>
    <div class="intro2">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="responsive2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?php echo loadProject($projectId,  "link"); ?>" allowfullscreen></iframe>
                    </div>
                </div>
                <p class="smalltextwrap"><?php echo loadProject($projectId, "text"); ?></p>
            </div>
            <div class="col-sm-6 col-xs-12">

                <div class="more">
				
					<div class="inline" id="buttonLeft">
						<i class="fa fa-chevron-left"></i>
					</div>
					
						<p class="moretext inline">Meer projecten</p>
						
					<div class="inline" id="buttonRight">
						<i class="fa fa-chevron-right"></i>
					</div>

					<?php for($i = 1; $i <= $totalIds; $i++) { ?>
                    <div class="projectrandoms2">
						<div class="projectrandoms">
							<?php $loadedIds = randomProjectSmall($loadedIds, $totalIdCount); ?>
						</div>
						<div class="projectrandoms">
							<?php $loadedIds = randomProjectSmall($loadedIds, $totalIdCount); ?>
						</div>
						<div class="projectrandoms">
							<?php $loadedIds = randomProjectSmall($loadedIds, $totalIdCount); ?>
						</div>
					</div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-section">
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
	var projectrandoms2 = document.getElementsByClassName("projectrandoms2");
	var buttonLeft = document.getElementById("buttonLeft");
	var buttonRight = document.getElementById("buttonRight");
	var currentList = 0;
	
	function updateList(listNumber) {
		var oldDiv = projectrandoms2[currentList];
		var newDiv = projectrandoms2[listNumber];
		oldDiv.style.opacity = "0";
		setTimeout(function(oldDiv) {
			oldDiv.style.display = "none";
		}, 300, oldDiv);
		
		setTimeout(function(newDiv) {
			newDiv.style.display = "block";
			newDiv.style.opacity = "1";
		}, 300, newDiv);
		
		currentList = listNumber;
		
		if(currentList == (projectrandoms2.length - 1)) {
			buttonRight.style.opacity = "0.5";
			buttonRight.style.cursor = "default";
		} else if(currentList == 0) {
			buttonLeft.style.opacity = "0.5";
			buttonLeft.style.cursor = "default";
		} else {
			buttonLeft.style.opacity = "1";
			buttonRight.style.opacity = "1";
			buttonLeft.style.cursor = "pointer";
			buttonRight.style.cursor = "pointer";
		}
	}
	
	updateList(0);
	
	buttonLeft.addEventListener("click", function() {
		if(currentList != 0) {
			updateList(currentList - 1);
		}
	});
	
	buttonRight.addEventListener("click", function() {
		if(currentList != (projectrandoms2.length - 1)) {
			updateList(currentList + 1);
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