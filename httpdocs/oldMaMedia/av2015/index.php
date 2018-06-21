<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Examenwerk Audiovisueel lichting 2015</title>
    <link rel="stylesheet" href="public/bootstrap/dist/css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300' rel='stylesheet' type='text/css'>
</head>
<body>

	<?php //var_dump($data); ?>

<div class="container">
<div class="row mainContent">
	<h1 class="pink">Examenwerk Audiovisueel
	<p><span class="lichting">lichting 2015</span></p>
	</h1>
	<p class="paragraph">Het vierdejaars examenproject waarin de student zijn vakkundigheid laat zien, noemt het Mediacollege Amsterdam <span class="bolder">de Proeve van Bekwaamheid.</span>
	 De Proeve van Bekwaamheid omvat een opdracht van een <span class="bolder">externe opdrachtgever</span> voor het ontwerpen en realiseren van een audiovisueel product. 
	 Dit product kan zijn: <span class="bolder">een korte film, promotie of bedrijfsfilm, videoclip, documentaire, animatie of mixed media-product.</span>
	 </p>
	 <p class="paragraph bolder lastLine" id="tovid">Met trots presenteert het Mediacollege Amsterdam op deze pagina de eindproducten.</p>

	<div class="row" id="mainVideo">
		<?php echo str_replace('from <a href="https://vimeo.com/mamedia">Mamedia</a> on <a href="https://vimeo.com">Vimeo</a>.', '', $data[0]) ?>
	</div>
	<h3 id="titleHolder"></h3>
</div>
<?php for($i = 0;$i<count($data);$i++): ?>
<div class="small col-md-3 col-xs-4">
	<div class="thumb" >
		<div class="trigger" data-link='<?php echo $data[$i]; ?>' ></div>
		<div class="thumbLink"></div>
		<div class="smallTitle"></div>
	</div>
</div>
<?php endfor; ?>

</div>
<footer>
		<p>
			
		&copy; Mediacollege Amsterdam 2015 | Webdesign door <a href="http://mamedia.nl" target="new">Mamedia</a>
		</p>
</footer>
<style>
footer p{
	margin: 0;
}
.smallTitle{
	padding: 0 8px;
}
footer{
	clear:both;
	padding:37px 0 37px 0;
	text-align:center;
	top: 95px;
	position: relative;
	font-size:80%;
	background-color:#161616;
}
body{
	/*background-color: #1b1b1b;*/
	color: #fff;
	font-family: 'Open Sans', sans-serif;
	font-weight: lighter;
	font-weight: 300;


	background: #1b1b1b; /* Old browsers */
/*//background: -moz-linear-gradient(top, #1b1b1b 0%, #040404 100%); /* FF3.6+ */*/
/*//background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1b1b1b), color-stop(100%,#040404)); /* Chrome,Safari4+ */*/
/*//background: -webkit-linear-gradient(top, #1b1b1b 0%,#040404 100%); /* Chrome10+,Safari5.1+ */*/
/*//background: -o-linear-gradient(top, #1b1b1b 0%,#040404 100%); /* Opera 11.10+ */*/
/*//background: -ms-linear-gradient(top, #1b1b1b 0%,#040404 100%); /* IE10+ */*/
/*//background: linear-gradient(to bottom, #1b1b1b 0%,#040404 100%); /* W3C */*/
/*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1b1b1b', endColorstr='#040404',GradientType=0 ); */
/* IE6-9 */
}
.bolder{
	font-weight: bold !important;
}
#mainVideo iframe{
		    -webkit-transform: scale(0.967) !important;
       -moz-transform: scale(0.967) !important;
            transform: scale(0.967) !important;

}
.lichting{
	font-style: italic;
	font-weight: 300;
	font-size: 72%;
}
	.small iframe{
		height: 140px;
		padding: 2px;
		width: 100%;
	}
	.pink{
		color:rgb(242,0,149);
		}	
	.small {
		height: 170px;

	}
		
.mainContent{
	text-align: center;
}
i{
	font-size:70%;
}
h1{
	font-weight: 700;
	margin: 75px auto 50px auto;
	font-size: 55px
}
.controls{
	display: none;
}

.thumb{ 
	margin: 10px 0 10px 0 !important;
	position: relative;
	    -webkit-transform: scale(0.85) !important;
       -moz-transform: scale(0.85) !important;
            transform: scale(0.85) !important;
}
.trigger{
	/*background-color: #f00;*/
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	z-index: 1;
}
.paragraph{
	font-size: 155%;
	margin: 40px auto 90px auto;
}
#titleHolder{
	margin-top: 0;
	margin-bottom: 40px;
}
.lastLine{
	margin: -65px auto 70px auto !important;
}
iframe{
	/*position: relative;*/
	z-index: 2;
}

.container *{
    -webkit-transform: scale(0.95);
       -moz-transform: scale(0.95);
            transform: scale(0.95);
}
</style>


<script>
	var mainVideo = document.getElementById("mainVideo").querySelectorAll("iframe");
	mainVideo[0].width = 1200
	mainVideo[0].height = mainVideo[0].height * 1.2;
	var currentWidth;

	var thumbs = document.querySelectorAll(".thumb");

	// currentWidth = parseInt(thumbs[0].querySelectorAll("iframe")[0].height);

	var Video = document.getElementById("mainVideo")
	var titleHolder = document.getElementById("titleHolder")

function adjustMainVidSize(){
	var theVideo = Video.querySelectorAll("iframe")[0];
	if(window.innerWidth >= 1200){
		theVideo.height = 675;
		theVideo.width = 1200;
	}
	else if(window.innerWidth >= 992){
		theVideo.height = 558;
		theVideo.width = 992;
	}
	else if(window.innerWidth >= 768){
		theVideo.height = 432;
		theVideo.width = 768;
	}
}
window.addEventListener("resize",adjustMainVidSize,false);

trigger = document.querySelectorAll(".trigger");

for (var i = 0; i < trigger.length; i++) {
	trigger[i].addEventListener("click",updateContent,false);
};
function updateContent(evt){
	try{
		evt.preventDefault();
		evt.stopImmediatePropagation();
	}catch(e){
		var error = ["Waarschijnlijk het eerste filmpje",e]
		console.log(e)
	}
	window.location.href = "#tovid";
	
	titleHolder.innerHTML = htmlReader(evt.target.dataset.link).title;
	Video.innerHTML = htmlReader(evt.target.dataset.link).iframe;
	updateVideoWidth()
	adjustMainVidSize();
}
function thumbnailLogic(){
	for (var i = 0; i < thumbs.length; i++) {
		thumbs[i].querySelectorAll(".thumbLink")[0].innerHTML = htmlReader(thumbs[i].querySelectorAll(".trigger")[0].dataset.link).iframe;
		thumbs[i].querySelectorAll("iframe")[0].height = 90
		thumbs[i].childNodes[5].innerHTML = htmlReader(thumbs[i].querySelectorAll(".trigger")[0].dataset.link).title

	};
}thumbnailLogic();
function htmlReader(data){
	var data = data.toString();
	var theIframe = data.split("<iframe").pop().split("</iframe>").shift();
	var theTitle = data.split("<p>").pop().split("from <a ").shift();

	return {
		"iframe":"<iframe " + theIframe + "<iframe>",
		"title":theTitle
	}
}
function updateVideoWidth(){
	var mainVideo = document.getElementById("mainVideo").querySelectorAll("iframe");
	console.log(mainVideo[0].width);
	mainVideo[0].width = 1200
	mainVideo[0].height = 600;
	var currentWidth;
}
function setTitle(data){
	var title = data.split("<p>").pop().split("from").shift();
	var theIframe = data.split("<iframe").pop().split("</iframe>").shift();
	titleHolder.innerHTML = title;
	Video.innerHTML = '<iframe' + theIframe + '</iframe>';
	adjustMainVidSize();

}
setTitle('<?php echo $data[0] ?>');

</script>

</body>
</html>