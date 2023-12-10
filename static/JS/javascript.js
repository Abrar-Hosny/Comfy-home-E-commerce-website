// function sendImageToPage2(clickedImage) {
//   var imageUrl = clickedImage.src;
// console.log(imageUrl);
//   // Store the image URL in local storage
//   localStorage.setItem('imageURL', imageUrl);

//   // Redirect to the second page
//   window.location.href = "/sproduct.html";
// }

function sendImageToPage2(clickedDiv) {
  // Find the image within the clicked div
  var clickedImage = clickedDiv.querySelector('.clickableImage');

  // Check if the image exists
  if (clickedImage) {
      var imageUrl = clickedImage.src;

      // Store the image URL in local storage
      localStorage.setItem('imageURL', imageUrl);

      // Redirect to the second page
      window.location.href = "/sproduct.html";
  } else {
      console.error('Image not found within the clicked div.');
  }
}