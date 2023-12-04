<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // Collect form data
 $name = $_POST["name"];


 $email = $_POST["email"];

$password =$_POST["password"];

// Validate name
if (empty($name)) {
    echo "Name is required.";
    header("Location: index.html?error=Name is required");
msg
    // You can redirect back to the form or display an error message as needed
    exit;
}

// Validate email
if (empty($email)) {
    echo "Email is required.";
    exit;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
}


}



?>