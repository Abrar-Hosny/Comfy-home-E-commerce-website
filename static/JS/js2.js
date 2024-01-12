

// Get the image URL from local storage
var imageUrl = localStorage.getItem('imageURL');
var productName = localStorage.getItem('productName');
var productPrice = localStorage.getItem('productPrice');
var productType = localStorage.getItem('productType');


// Set the received image source
var receivedImage = document.getElementById('receivedImage');
if (imageUrl) {
    receivedImage.src = imageUrl;
    document.getElementById('productName').innerText = productName;
document.getElementById('productPrice').innerText = productPrice;
document.getElementById('productType').innerText = productType;

}

console.log(imageUrl );



// var MainImg = document.getElementById("receivedImage");
// var smalling = document.getElementsByClassName("small-img");

// smalling[0].onclick = function ()
// {
//   MainImg.src = smalling[0].src;
// }
// smalling[1].onclick = function ()
// {
//   MainImg.src = smalling[1].src;
// }
// smalling[2].onclick = function ()
// {
//   MainImg.src = smalling[2].src;
// }
// smalling[3].onclick = function ()
// {
//   MainImg.src = smalling[3].src;
// }

// Get values from HTML elements

