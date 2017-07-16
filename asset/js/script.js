function showImage(img, isId = false){
	if(isId){
		img = document.getElementById(img);
	}
	var modal = document.getElementById("imgModal")
	var modalImg = document.getElementById("modalImg");
	var captionText = document.getElementById("caption");

  modal.style.display = "block";
  modalImg.src = img.src;
  captionText.innerHTML = img.alt;

	var span = document.getElementsByClassName("close")[0];
	span.onclick = function() { 
	  modal.style.display = "none";
	}
}
