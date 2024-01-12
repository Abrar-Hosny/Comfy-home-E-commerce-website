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

  // Find other elements within the clicked div
  var name = clickedDiv.querySelector('.des h5').textContent;
  var price = clickedDiv.querySelector('.des h4').textContent;
  var type = clickedDiv.querySelector('.des span').textContent;

  // Check if the image and information exist
  if (clickedImage && name && price && type) {
      var imageUrl = clickedImage.src;

      // Store the image URL, name, and price in local storage
      localStorage.setItem('imageURL', imageUrl);
      localStorage.setItem('productName', name);
      localStorage.setItem('productPrice', price);
      localStorage.setItem('productType', type);

      // Redirect to the second page
      window.location.href = "/sproduct.html";
  } else {
      console.error('Image or information not found within the clicked div.');
  }
}

// --=========================================================================================================================
// ========================================================================================================================
// =========================================================================================================================
// ==========================================================================================================================
// -------------------------------------

// Function to handle the Add to Cart action
function addToCart(productElement) {
  // Retrieve product information from the clicked product card
  const productName = productElement.querySelector('h5').textContent;
  const productPrice = productElement.querySelector('h4').textContent;
  if (productNameElement && productPriceElement) {
    // Retrieve product information from the clicked product card
    const productName = productName.textContent;
    const productPrice = productPrice.textContent;
    console.log(productName, productPrice);

    // Call the function to add the product to the cart
    addItemToCart(productName, productPrice);
} 
     // Call the function to add the product to the cart
     addItemToCart( productName, productPrice);
    }
    
    // Function to add the product to the cart
    function addItemToCart( productName, productPrice) {
        // Retrieve the cart table body
        const cartTableBody = document.getElementById('cartTableBody');
    
        // Create a new row
        const newRow = cartTableBody.insertRow();
    
        // Create cells for the row
        const removeCell = newRow.insertCell(0);
        const productCell = newRow.insertCell(1);
        const priceCell = newRow.insertCell(2);
        const subtotalCell = newRow.insertCell(3);
    
        // Add content to the cells
        removeCell.innerHTML = '<a href="#" class="btn-remove"><i class="ri-close-circle-line  icon-remove"></i></a>';
        productCell.textContent = productName;
        priceCell.textContent = productPrice;
        // subtotalCell.innerHTML = '<input class="cart-quantity" min="1" class="cart-quantity" type="number" value="1">';
    
        // Implement your logic to calculate and update subtotal (modify as needed)
        // const quantityInput = newRow.querySelector('.cart-quantity');
        // quantityInput.addEventListener('input', updateSubtotal);
        // updateSubtotal();
    
        // Implement your logic to update the total (modify as needed)
        // updateTotal();
    }
    
    // Function to update the subtotal when the quantity changes
    // function updateSubtotal() {
    //     const row = this.closest('tr');
    //     const price = parseFloat(row.cells[2].textContent);
    //     const quantity = parseInt(row.querySelector('.cart-quantity').value);
    //     const subtotal = price * quantity;
    //     row.cells[3].textContent = subtotal.toFixed(2);
    // }

// Example of how to use the addItemToCart function
// You can call this function when adding a new item to the cart
// addItemToCart('Laptop', 'Product ABC', '$999.99');








// --------------------------------------

// ------------------------------
// let aelements =  document.getElementsByClassName('icon-remove');


// // console.log(aelements);
// // removeitem => an array now hold all the remove icon 
// for (let i =0 ; i < aelements.length  ; i++){
// //    addeventlistener => tells us we you listen the click do something
// aelements[i].addEventListener('click', function(event){
//     // returns event object from  listener  

// // event.target is the event we click on
// let iconclicked = event.target
// // means the row
// iconclicked.parentElement.parentElement.parentElement.remove()
// updateCartTotal();

//     });
// }
    
// document.addEventListener("DOMContentLoaded", function () {
//     updateCartTotal();
// var quantityInputs = document.getElementsByClassName("cart-quantity");
//         for (var i = 0; i < quantityInputs.length; i++) {
//             quantityInputs[i].addEventListener("input", updateCartTotal);
//         }

//         // Function to update cart total
//         // This code selects all elements with the class "cart-quantity" 
//         // (presumably input elements representing quantities in your cart) and adds an event listener to each.
//         //  The event listener is triggered whenever the input value changes, and it calls the updatecarttotal 
//         // here fetch the value in the quatity then calling update the total function to update the total price
//         // based on multiplay the quantity with the price and added to the total price

//         function updateCartTotal() {
//                 // Get all elements with class "cart-row"
// // here fetches all the rows [tr] all the the cartRows and they are stored as an array

//             let cartRows = document.getElementsByClassName("cart-row");
//             let total = 0;

//             for (let i = 0; i < cartRows.length; i++) {
//                         // Get the current row
// // current tr
//                 let row = cartRows[i];
//                 // get price from it
//                 let priceElement = row.querySelector(".cart-price");
//                 // get quantity from it 
//                 let quantityElement = row.querySelector(".cart-quantity");
//                 // frist remove the dollar sign 
//                 // then parse the price into floating point
//                 let price = parseFloat(priceElement.textContent.replace("$", ""));
//                 // retrieves the numeric value of the input

//                 let quantity = quantityElement.valueAsNumber;
//                 // subtotal =  multiple the price and the quantity 
//                 // subtotal of only that specific item 
//                 let subtotal = price * quantity;
// // here first it holds the specific row or tr
// // then it search for the last column in this row [subtotal] that means the total of specific item 
// // substotal of specific item = price * quantity of this item 
// // Refers to the textual content of the selected <td> element. [ text content ]
// // "$" + subtotal.toFixed(2): Prepares the content to be set for the subtotal cell.
// //  It concatenates the dollar sign ("$") with the formatted subtotal. The toFixed(2)
// //  method is used to round the subtotal to two decimal places, ensuring it looks like a proper currency value.

//                 row.querySelector("td:last-child").textContent = "$" + subtotal.toFixed(2);
// //    then add the subtotal to total money of all items
// // subtotal for specific items
// // total the total price so after calculate each subtotal we add the subtotal 

//                 total += subtotal;
//             }

//             // Display the total cart price
//             // You can adjust this based on where you want to display the total
//             // toFixed => rounds the number 2 digit
//             console.log("Total Cart Price: $" + total.toFixed(2));
//             // if we donot enter a [0] index it will retrive html collection 
//             // To access the first element in the HTMLCollection, you can use an index:
//             let changesubtotal = document.getElementsByClassName('subtotal-price')[0];
//             changesubtotal.textContent="$" + total.toFixed(2) ;

// let changetotal = document.getElementsByClassName('total-price')[0];
// changetotal.textContent="$" + total.toFixed(2) ;
// console.log(changetotal);           
//         }
//     })






