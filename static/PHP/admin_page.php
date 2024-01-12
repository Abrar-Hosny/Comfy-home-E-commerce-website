<?php


@include 'database.php';


if($_SERVER["REQUEST_METHOD"]==="POST"){
  // connecting the database 

  // $mysqli= require __DIR__ ."/database.php" ;
 if(isset($_POST['add_product'])){
    $product_name =$_POST["product_name"];
    
    $product_price =$_POST["price"];
    $product_cat =$_POST["product_cat"];
    $product_image = $_FILES["product_image"]['name'];
    $product_image_tmp_name = $_FILES["product_image"]['tmp_name'];  //the current path  
    $product_image_folder ='/assets/'.$product_image;
if(empty($product_name) || empty($product_price)|| empty( $product_cat) || empty($product_image)  ){
  $message[]="please fill out all" ;
  
}

else{
  $insert="INSERT INTO product(product_name ,price , product_cat , product_image) VALUES('$product_name',' $product_price','$product_cat','$product_image')";
$upload=mysqli_query($mysqli,$insert);
if($upload){
  move_uploaded_file($product_image_tmp_name,$product_image_folder);
  $message[]="new Product added Success";

}
else{
  $message[]="Could not added success";

}
}



  }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link href="/static/CSS/index.css" rel="stylesheet" />

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
<body>
    
<?php
if(isset($message)){
  foreach($message as $message){
    echo '<span class="message">' .$message. '</span>';
  }
}



?>


    

<form class="max-w-xs mx-auto mt-8 bg-gray-200 p-4 rounded-lg" novalidate method="POST" enctype="multipart/form-data">
  <div class="mb-2">
    <label for="name" class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Product Name</label>
    <input type="text" name="product_name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter Product's name" required>
  </div>
  <div class="mb-2">
    <label for="price" class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Product Price</label>
    <input type="number" placeholder="Enter Product Price" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
  </div>
  <div class="mb-2">
    <label for="cat" class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Product Category</label>
    <input type="text" placeholder="Enter Product Category" name="product_cat" id="cat" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
  </div>
  <label class="block mb-1 text-xs font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
  <input accept="image/png , image/jpeg , image/jpg" name="product_image" class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file">
  <div class="flex items-start mb-3 mt-2">
    <button type="submit" name="add_product" value="add a product" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Product</button>
  </div>
</form>

</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>




</body>
</html>