// return all the elements with the  class="btn-remove"
// here we select all the items and return in it as array
// and every btn has index to 

let aelements =  document.getElementsByClassName('icon-remove');
// console.log(aelements);
// removeitem => an array now hold all the remove icon 
for (let i =0 ; i < aelements.length  ; i++){
//    addeventlistener => tells us we you listen the click do something
aelements[i].addEventListener('click', function(event){
    // returns event object from  listener  

// event.target is the event we click on
let iconclicked = event.target
// means the row
iconclicked.parentElement.parentElement.parentElement.remove()
updateCartTotal();

    });
}
    

var quantityInputs = document.getElementsByClassName("cart-quantity");
        for (var i = 0; i < quantityInputs.length; i++) {
            quantityInputs[i].addEventListener("input", updateCartTotal);
        }

        // Function to update cart total
        // This code selects all elements with the class "cart-quantity" 
        // (presumably input elements representing quantities in your cart) and adds an event listener to each.
        //  The event listener is triggered whenever the input value changes, and it calls the updatecarttotal 
        // here fetch the value in the quatity then calling update the total function to update the total price
        // based on multiplay the quantity with the price and added to the total price

        function updateCartTotal() {
                // Get all elements with class "cart-row"
// here fetches all the rows [tr] all the the cartRows and they are stored as an array

            let cartRows = document.getElementsByClassName("cart-row");
            let total = 0;

            for (let i = 0; i < cartRows.length; i++) {
                        // Get the current row
// current tr
                let row = cartRows[i];
                // get price from it
                let priceElement = row.querySelector(".cart-price");
                // get quantity from it 
                let quantityElement = row.querySelector(".cart-quantity");
                // frist remove the dollar sign 
                // then parse the price into floating point
                let price = parseFloat(priceElement.textContent.replace("$", ""));
                // convert the quantity as a numerical value
                let quantity = quantityElement.valueAsNumber;
                // subtotal =  multiple the price and the quantity 
                // subtotal of only that specific item 
                let subtotal = price * quantity;
// here first it holds the specific row or tr
// then it search for the last column in this row [subtotal] that means the total of specific item 
// substotal of specific item = price * quantity of this item 
// Refers to the textual content of the selected <td> element. [ text content ]
// "$" + subtotal.toFixed(2): Prepares the content to be set for the subtotal cell.
//  It concatenates the dollar sign ("$") with the formatted subtotal. The toFixed(2)
//  method is used to round the subtotal to two decimal places, ensuring it looks like a proper currency value.

                row.querySelector("td:last-child").textContent = "$" + subtotal.toFixed(2);
//    then add the subtotal to total money of all items
// subtotal for specific items
// total the total price so after calculate each subtotal we add the subtotal 

                total += subtotal;
            }

            // Display the total cart price
            // You can adjust this based on where you want to display the total
            // toFixed => rounds the number 2 digit
            console.log("Total Cart Price: $" + total.toFixed(2));
        }


        console.log(quantityInputs);




