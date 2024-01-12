<?php


// user_login.php

// Process form data, validate inputs, and authenticate user in the database

// Assuming the login is successful
// session_start();

// // Store user-related information in the session
// $_SESSION['user_id'] = $authenticatedUserId;
// $_SESSION['username'] = $userUsername;
// $_SESSION['role'] = 'admin'; // Set a role identifier for user

// // Redirect to the user dashboard or home page

// exit();




// when click and the form is sumitted the method will be return
// here to check that we sumit the form
if($_SERVER["REQUEST_METHOD"]=="POST"){
    // connecting the database 

    $mysqli= require __DIR__ ."/database.php" ;
    // here we will select the record based on the email address
//     SELECT * FROM user WHERE email = '%s':

// This is a SQL query that selects all columns (*) from the user table where the value in the email column matches a specific email address. The %s is a placeholder for a string, and it will be replaced by the actual email address.
// sprintf:

// The sprintf function is a PHP function used to format strings. It takes a format string as its first argument, followed by a variable number of additional arguments. The placeholders in the format string (like %s) are replaced by the values of the additional arguments.
    $sql =sprintf("SELECT * FROM admin WHERE admin_ID  = '%s' " , 
    
    $mysqli->real_escape_string( $_POST["ID"]));

    $result=$mysqli->query($sql);

    // this returns the row of existing id and stored in associative array
    $user=$result ->fetch_assoc();
// if the user is exist
// will return null if the user is not exist 
    if($user){
        
        // here we will verify the paasword that the user entered in the form
        // with the ones that in the table  password hash

        if($_POST["password"]===$user["password"]){
            echo "<script> window.location.href='admin_page.php';</script>";
        }
        else{
            die("login bad");


        }

    }


}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.1/tailwind.min.css"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css"
    rel="stylesheet"
  />    
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>



</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    

<div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
   
<!-- instead of submit the form into separate script like sign up 
here we willnot need to add action here
-->
<form class="space-y-6" method="POST" novalidate>
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">login to our platform</h5>
       
        <div>
            <label for="ID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your ID</label>
            <input type="text" name="ID" id="ID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 " placeholder="name@company.com" >
            <input type="hidden" name="admin" id="admin" >

        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-stone-500 focus:border-stone-500 block w-full p-2.5 " >
        </div>
        
        <div class="flex items-start">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-stone-300 " required>
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 ">Remember me</label>
            </div>
        </div>
        <button type="submit" class="w-full text-white bg-stone-700 hover:bg-stone-800 focus:ring-4 focus:outline-none focus:ring-stone-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Login to your account</button>
        <div class="text-sm font-medium text-gray-500 ">
            Not registered? <a href="/signup.html" class="text-stone-700 hover:underline">Create account</a>
     <!-- here link  -->
     
        </div>
    </form>
</div>


</body>
</html>