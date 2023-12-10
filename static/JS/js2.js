

// Get the image URL from local storage
var imageUrl = localStorage.getItem('imageURL');

// Set the received image source
var receivedImage = document.getElementById('receivedImage');
if (imageUrl) {
    receivedImage.src = imageUrl;
}

console.log(imageUrl);



var MainImg = document.getElementById("receivedImage");
var smalling = document.getElementsByClassName("small-img");

smalling[0].onclick = function ()
{
  MainImg.src = smalling[0].src;
}
smalling[1].onclick = function ()
{
  MainImg.src = smalling[1].src;
}
smalling[2].onclick = function ()
{
  MainImg.src = smalling[2].src;
}
smalling[3].onclick = function ()
{
  MainImg.src = smalling[3].src;
}



