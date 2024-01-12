<?php
@include 'database.php';

session_start();


// Check if the 'cart' key exists in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Initialize the 'cart' array if it doesn't exist
}

// Retrieve product information from the form (use the null coalescing operator ?? to provide default values)
$product_name = isset($_POST['pname']) ? $_POST['pname'] : '';
$product_price = isset($_POST['pprice']) ? $_POST['pprice'] : '';
$product_cat = isset($_POST['pcat']) ? $_POST['pcat'] : '';
$product_quantity = isset($_POST['pquantity']) ? $_POST['pquantity'] : '';

if (isset($_POST['addCart'])) {
    // Check if the 'cart' array is set
    if (isset($_SESSION['cart'])) {
        $check_product = array_column($_SESSION['cart'], 'ProductName');
        if (in_array($product_name, $check_product)) {
            echo "<script>alert('Product already added'); window.location.href='/testweb/shop.php';</script>";
        } else {
            $_SESSION['cart'][] = array('ProductName' => $product_name, 'ProductCategory' => $product_cat, 'ProductPrice' => $product_price, 'ProductQuantity' => $product_quantity);
            echo "<script>window.location.href='viewCart.php';</script>";
        }
    }
}

// Remove product
if (isset($_POST['remove'])) {
    // Check if the 'cart' array is set
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['ProductName'] === $_POST["item"]) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>window.location.href='viewCart.php';</script>";
            }
        }
    }
}


if (isset($_POST['sendToDatabase'])) {
    // Assuming you have a database connection

    // Define the SQL statement for inserting data into the 'product' table
 // Define the SQL statement for inserting data into the 'product' table

// Define the SQL statement for inserting data into the 'order' table
$sql = "INSERT INTO `order` (email,product, quantity) VALUES (?, ?,?)";

// Prepare and execute the SQL statement for each item in the cart
$stmt = $mysqli->prepare($sql);

foreach ($_SESSION['cart'] as $item) {
    $stmt->bind_param('ssi', $_SESSION['email'], $item['ProductName'], $item['ProductQuantity']);
    $stmt->execute();
}

    // Close the database connection
    $mysqli = null;

    // Redirect or display a success message as needed
    header('Location: viewCart.php?success=true');
    exit;
}


?>
