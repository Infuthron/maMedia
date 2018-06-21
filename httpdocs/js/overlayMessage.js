var overlayDiv = document.getElementById("overlay");
var overlayTitle = document.getElementById("overlayTitle");
var overlayText = document.getElementById("overlayMessage");

function overlayMessage(title, message) {
	overlayTitle.innerHTML = title;
	overlayText.innerHTML = message;
	
	overlayDiv.style.display = "block";
	overlayDiv.classList.add("fadeIn");
}

function closeOverlay() {
	overlayDiv.classList.add("fadeOut");
	setTimeout(function() {
		overlayDiv.style.display = "none";
		overlayDiv.classList.remove("fadeIn");
		overlayDiv.classList.remove("fadeOut");
	}, 500);
}