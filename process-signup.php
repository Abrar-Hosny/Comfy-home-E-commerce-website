<?php

// validate the name


if(empty($_POST["name"])){
die("name is required");
}

// validate the email 
// THIS return false if the email is not valid address
if(!filter_var($_POST["email"] , FILTER_VALIDATE_EMAIL)) {
    die("valid email is required");

}

// validate password first we will need to know that 
// is 8 characters

if(strlen(($_POST["password"]))<8){
    die("Password must be 8 characters");
}
// this matches the value to regular expression
// upper and lower
if(!preg_match("/[a-z]/i" ,$_POST["password"] )){
    die("Password must contain at least one letter");

}

if(!preg_match("/[0-9]/" ,$_POST["password"] )){
    die("Password must contain at least one number");

}



if($_POST["password"] !== $_POST["repeatpassword"]){
    die("donot match");
}




// hashing the password
// password_hash function 
// apply default password hash function 
// return the hash function as a string 
// return 60 character string of seemingly random characters
// no extract the password
$password_hash = password_hash($_POST["password"] , PASSWORD_DEFAULT);





// print_r($_POST);

?>