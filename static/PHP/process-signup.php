<?php

// validate the name

session_start();

// data i want to store it to used it in another page

// Check if the 'cart' key exists in the session
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = ""; // Initialize the user
}
// $
if(empty($_POST["name"])){
die("name is required");


}


$email = $_POST['email']; // Make sure this is correct
// Other form data retrieval

// Check if email is not null before proceeding
if ($_POST["email"] == null) {
    echo "Email cannot be null";}  

$_SESSION["email"] = $email;

   


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


$mysqli=require __DIR__  . "/database.php";



$sql = "INSERT INTO user (name, email ,password_hash) VALUES(?, ? ,?)";


$stmt = $mysqli ->stmt_init();
// no error
if(! $stmt -> prepare($sql)){
    die("SQL error : " . $mysqli->error); 
}
// set kind of colums
$stmt -> bind_param("sss" , 
$_POST["name"] , $_POST["email"] , $password);


// validation upon dublicates email
// here we use try and catch because without them the program will crush and will grt error 


try {
    // ($stmt->execute()) => returns true if the email not in database
    // false if the email is in there 
    if ($stmt->execute()) {
        // here we go to another page redirect the location  and 
        // exit from the form page 
        // + link tp html file 
header("Location: /testweb/shop.php ")      ;
exit ;   
    } else {
        throw new Exception("Error executing the statement");
    }
    // here take the error and see its code if 1062 => that means 
    // the email address is duplicated
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        echo "Email address already taken. Please choose another one.";
    } else {
        echo "Error: " . $e->getMessage();
    }
}





?>