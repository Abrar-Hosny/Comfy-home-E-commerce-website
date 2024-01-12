<?php
session_start();

@include 'database.php';

// Initialize an empty array to store cart products and quantities
$cartProducts = array();

// Check if the 'cart' array is set in the session
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        // Build an associative array with product name as the key and quantity as the value
        $cartProducts[$value['ProductName']] = $value['ProductQuantity'];
    }
}

// Your existing HTML/PHP code for displaying the cart goes here

// Add this PHP code to display the $cartProducts array (for testing purposes)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <link rel="stylesheet" href="/static/CSS/header.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,800;1,100;1,200&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

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
  <li class="logo"><a href="/index.html">ComfyHome</a></li>

    <div >
        

    <ul  id="navbar">
      <li ><a class="active" href="/testweb/index.html">Home</a></li>
      <li ><a href="/testweb/index.html">About</a></li>
      <li ><a href="/testweb/shop.php">Shop</a></li>
      <li ><a href="blog.php">Blog</a></li>
      <li ><a href="#home">Contact us </a></li>
      <li ><a href="/testweb/static/PHP/viewCart.php"><i class="ri-shopping-bag-line"></i></a></li>
      <li > <a href="/testweb/static/PHP/userprofile.php">    <i class="ri-user-line"></i>


</a></li>

    </ul>

  
    </div>
  </section>

<div class="flex justify-center items-center "> 
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8 max-w-3xl ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        P-Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ptotal = 0 ; 
                $total = 0 ; 

                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $ptotal = $value['ProductPrice'] * $value['ProductQuantity'];
                        $total += $value['ProductPrice'] * $value['ProductQuantity'];

                        echo '
                        <form action="insertCart.php" method="post">
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">' . htmlspecialchars($key+1) . '</td>
                                <td class="px-6 py-4">' . htmlspecialchars($value['ProductName']) . '</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    ' . htmlspecialchars($value['ProductCategory']) . '
                                </td>
                                <td class="px-6 py-4">' . htmlspecialchars($value['ProductPrice']) . '</td>
                                <td class="px-6 py-4">' . htmlspecialchars($value['ProductQuantity']) . '</td>
                                <td class="px-6 py-4">' . htmlspecialchars($ptotal) . '</td>
                                <td class="flex items-center px-6 py-4">
                                    <button name="remove" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                                    <input type="hidden" name="item" value="' . htmlspecialchars($value['ProductName']) . '">
                                </td>
                            </tr>
                        </form>';
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="mt-4 flex justify-center items-center ">
            <h3 class="text-gray-700 dark:text-gray-300 text-lg font-medium">Total Price : </h3>
            <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-400"><?php echo number_format($total, 2)?></h3>
        </div>

        <!-- Add this button at the end of your body section -->
        <form action="insertCart.php" method="post">
    <button id="sendToDatabaseBtn" name="sendToDatabase" class="bg-blue-500 text-white px-4 py-2 rounded">Send to Database</button>
</form>
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>


</body>
</html>
