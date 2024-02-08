<?php

require_once 'static/PHP/database.php';
$sql="select * from product";
$all_product = $mysqli->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link rel="stylesheet" href="static/CSS/index.css">
    <link rel="stylesheet" href="static/CSS/header.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,800;1,100;1,200&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />


</head>
<body>
<!-- <section id="header">
  <li class="logo"><a href="/index.php">ComfyHome</a></li>

    <div >
        

    <ul  id="navbar">
      <li ><a  href="index.html">Home</a></li>
      <li ><a href="/testweb/index.html">About</a></li>
      <li ><a class="active" href="/testweb/shop.php">Shop</a></li>
      <li ><a href="/testweb/static/PHP/viewCart.php"><i class="ri-shopping-bag-line"></i></a></li>
      <li > <a href="/testweb/static/PHP/userprofile.php">    <i class="ri-user-line"></i>

      <li >
    

    </ul>

  
    </div>
  </section> -->

 <!-- the header with pic -->
<section id="banner" class="section-p1">
 
    <h2 class="fsec  ">STAYHOME</h2>
    <p class="psec " >Save more with coupons & up to 70% off!</p>
</section>
<!-- section with products -->

<section id="product1" class="section-p1">

    <div class="pro-container">
    <?php
    //aasisative array
  while ($row =mysqli_fetch_assoc($all_product)){

  
  
  ?>
  <form action="static/PHP/insertCart.php" method="post">
        <!-- han7ot el star bta3 el onclick dah fi pro -->
        <div class="pro" >
<?php echo '<img src="data:image;base64,' .base64_encode($row['product_image']).'" style="width: 100px; height:100px; ">';?>
        <div class="des">
              <span><?php echo $row["product_cat"] ;?></span>
        <h5><?php echo $row["product_name"] ;?></h5>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        
        </div>
      <h4>$<?php echo $row["price"] ;?></h4>
      <input type="hidden" name="pname" value='<?php echo $row["product_name"] ;?>'>
      <input type="hidden" name="pprice" value='<?php echo $row["price"] ;?>'>    
      <input type="hidden" name="pcat" value='<?php echo $row["product_cat"] ;?>'>     
      <input type="number" name="pquantity" min="1" max="10" placeholder="Quantity">     
      <input type="Submit" name="addCart" class="btn">     
      </div>
       
       
       
          </div>

    
  </form>
<?php

  }
?>

  </section>


  

<!-- no of pages
<section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
    

</section> -->

<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
  <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
          <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
              <img src="static/assets/home (2).png" class="h-5" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ComfyHome</span>
          </a>
          <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
              <li>
                  <a href="index.html" class="hover:underline me-4 md:me-6">Home</a>
              </li>
             
              <li>
                <a href="blog.html" class="hover:underline me-4 md:me-6">Blog</a>
            </li>
            <li>
              <a href="index.html" class="hover:underline me-4 md:me-6">About</a>
          </li>
              <li>
                  <a href="shop.php" class="hover:underline me-4 md:me-6">Shop</a>
              </li>
              <li>
                  <a href="contact.html" class="hover:underline">Contact</a>
              </li>
          </ul>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="signup.html" class="hover:underline">ComfyHome</a>. All Rights Reserved.</span>
  </div>
</footer>


    <script src="static/JS/javascript.js"></script>
</body>
</html>













<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,800;1,100;1,200&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>


</head>

<body>
<div class="flex justify-center ">
  <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-stone-900 px-6 py-6 shadow-md" role="alert">
    <div class="text-center">
      <div class="py-2">
        <svg class="w-8 h-8 text-green-700 dark:text-white mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path fill="currentColor" d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z"/>
          <path fill="#fff" d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z"/>
        </svg>

        <div>
          <p class="font-bold text-xl text-green-500 ">Successfully has done :]</p>
          <p class="text-lg">Make sure you wait for us as soon as possible.</p>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html> -->