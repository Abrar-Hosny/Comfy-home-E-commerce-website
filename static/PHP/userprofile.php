<?php
@include 'database.php';
session_start();
$email = ''; // Initialize $email variable

if (isset($_POST['submit'])) {
    if (isset($_POST['update-password-form']) && $_POST['update-password-form'] == 4) {
            if (!empty($_POST['email'])) {
                $email = filter_input(
                    INPUT_POST,
                    'email',
                    FILTER_SANITIZE_EMAIL
                );
            }
            if (!empty($_POST['old-password'])) {
                $old_password = filter_input(
                    INPUT_POST,
                    'old-password',
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
            }
    
            if (!empty($_POST['new-password'])) {
                $new_password = filter_input(
                    INPUT_POST,
                    'new-password',
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
            }
    
    
        $query = "SELECT * from user where email = '$email' ";
        $statement = $mysqli->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
    
        $user = $result->fetch_assoc();
    
        if (!$user) {
            // Handle the case where email and old password do not match
            $error_messenger =  "Invalid email or old password.";
            exit;
        }
    
        // Update the user's password in the database
        $updateQuery = "UPDATE user SET password_hash = '$new_password' WHERE email = '$email'";
        $updateStatement = $mysqli->prepare($updateQuery);
        $updateStatement->execute();
        header("Location: userprofile.php");    
        exit;
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body >


<style>
body{
    width: 100%;
}
.logo {
    text-decoration: none;
    list-style: none;
    
}

*{
    padding: 0;
    margin: 0 ;
    box-sizing: border-box;
}

.logo a{
    text-decoration: none;
    color: black;
    font-size: 30px;
    font-weight: 20px;
}

#header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 80px;
    background-color: #f8f6f6;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
}

#navbar{
    display: flex;
    align-items: center;
    justify-content: center;

}

#navbar li{
    list-style: none;
    padding: 0 20px;
    position: relative;
}


#navbar li a{
    text-decoration: none;
    font-size: 16px;
    font-weight: 16px;
    color :gray;
    transition: 0.3s ease;
}



#navbar li a:hover ,#navbar li a.active{
    color:black;
}


#navbar li a:hover::after,
#navbar li a.active::after{
   content: "";
   width: 30%;
   height: 2px;
   background-color: rgb(12, 11, 11);
   position: absolute;
   bottom: -4px;
   left: 20px;

}
    </style>
</head>
<body>
<section id="header">
  <li class="logo"><a href="/index.php">ComfyHome</a></li>

    <div >
        

    <ul  id="navbar">
      <li ><a  href="index.html">Home</a></li>
      <li ><a href="/testweb/index.html">About</a></li>
      <li ><a  href="/testweb/shop.php">Shop</a></li>
      <li ><a  href="/testweb/static/PHP/viewCart.php"><i class="ri-shopping-bag-line"></i></a></li>
      <li ><a class="active" href="/testweb/static/PHP/userprofile.php"><i class="ri-user-line"></i>

      <li >
    

    </ul>

  
    </div>
  </section>
   
<div class="flex justify-center items-center h-screen" >
    
<div class="max-w-xl p-12 ml-16  border bg-gray-100 border-gray-700 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-red-600 dark:text-white text-center">User Email  </h5>
        </a>       
        <?php if (isset($_SESSION['username'])) : ?>
            <a href="#" class="p-6 font-bold text-gray-800">
                <i class="ri-mail-line "><span >   <?php echo $_SESSION['email']; ?> </span></i> 
            </a>
        <?php else : ?>
            <p>Username not set</p>
        <?php endif; ?>
        <br>

        
        <br>
      

        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-red-600 dark:text-white">Cart Items</h5>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <li class="font-bold text-gray-700"><?php echo $item['ProductName'] . ' - Quantity: ' . $item['ProductQuantity']; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No items in the cart.</p>
        <?php endif; ?>

        <a href="/testweb/index.html" class="flex justify-center mt-6 items-center px-6 py-2 text-sm font-medium text-center text-black bg-red-300 rounded-lg hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Explore 
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
    <!-- <section id="update-password-form" class=" w-full flex flex-col grow items-center justify-center px-16 py-16">
        <div class="w-full  bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class="flex space-x-4 items-center">
                    <i id="back-to-login-from-update-password" class="fa fa-angle-left text-gray-900  dark:text-white" style="font-size:24px"></i>
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Update Password
                    </h1>
                </div>
                <form class="space-y-2 md:space-y-2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                    <input type="hidden" name="update-password-form" value="4">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email<span id="email-to-update-password-validation" class="text-lg text-red-600"> *</span></label>
                        <input type="email" name="email" id="email-to-update-password-field" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="john@doe.com" required>
                    </div>
                    <div>
                        <label for="old-password" id="old-password-label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password<span id="old-password-validation" class="text-lg text-red-600"> *</span></label>
                        <input type="password" pattern="^(?=.[A-Za-z])(?=.\d)(?=.[#$@!%&?])[A-Za-z\d#$@!%&*?]{8,30}$" name="old-password" id="old-password-field" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="new-password" id="new-password-label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password<span id="new-password-validation" class="text-lg text-red-600"> *</span></label>
                        <input type="password" pattern="^(?=.[A-Za-z])(?=.\d)(?=.[#$@!%&?])[A-Za-z\d#$@!%&*?]{8,30}$" name="new-password" id="new-password-field" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
          
                    <button name="submit" class="w-full text-gray bg-gray-200 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update</button>
                </form>
            </div>
        </div>
    </section>  -->
</div>
</body>
</html>

