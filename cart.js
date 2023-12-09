// return all the elements with the  class="btn-remove"
// here we select all the items and return in it as array
// and every btn has index to 
let aelements =  document.getElementsByClassName('icon-remove');
console.log(aelements);
// removeitem => an array now hold all the remove icon 
for (let i =0 ; i < aelements.length  ; i++){
//    addeventlistener => tells us we you listen the click do something
aelements[i].addEventListener('click', function(event){
    // returns event object from  listener  

// event.target is the event we click on
let iconclicked = event.target
// means the row
iconclicked.parentElement.parentElement.parentElement.remove()


    });
}
