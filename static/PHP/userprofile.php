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
<body class="flex justify-center items-center h-screen ">
    
    <div class="max-w-xl p-12 ml-16 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">User Info </h5>
        </a>
        <?php if (isset($_SESSION['username'])) : ?>
            <a href="#">
                <i class="ri-mail-line"><?php echo $_SESSION['email']; ?></i> 
            </a>
        <?php else : ?>
            <p>Username not set</p>
        <?php endif; ?>
        <br>

        
        <br>
      

        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Cart Items</h5>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <li><?php echo $item['ProductName'] . ' - Quantity: ' . $item['ProductQuantity']; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No items in the cart.</p>
        <?php endif; ?>

        <a href="/testweb/index.html" class="inline-flex mt-4 items-center px-6 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Explore 
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
    <section id="update-password-form" class=" w-full flex flex-col grow items-center justify-center px-16 py-16">
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
    </section> 
</body>
</html>

