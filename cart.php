<?php 
include_once 'klasy/Baza.php';
    include_once 'klasy/User.php';
    include_once 'klasy/UserManager.php';
         session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Cart</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="tshirt.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body onload="showCart();">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container px-5">
        <a class="navbar-brand" href="index.php">T-shirt store</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link"  href="#!"
                ><div id="cart">Cart 🛒 (0)</div></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content-->

    <div class="container px-4 px-lg-5">
      <!-- Heading Row-->
      <h1>Cart:</h1>
      <div class="flex-cart">
        <div id="cart1" class="cart-border"></div>
        <div id="cart2" class="cart-border p-3">
          <h3>Summary</h3>
          <hr />
          <i> Discount code:</i><br />
          <input
            class="mt-2 mb-2 discount"
            id="discount"
            type="text"
            maxlength="12"
          /><span id="acceptDiscount"></span>
          <br />
          <button id="discountBtn" class="discount-button">Apply</button>
          <hr />
          <br />
          <b>Total cost: <span id="totalCost"></span>$ </b>
          <div id="newPrice"></div>

          <br />
          <hr />
          Order message:
          <textarea rows="3"></textarea>
          <hr />
          <form class='m-4' method="post">
          <input type="submit"
            id="placeOrder"
            class="order-button my-3" name="placeOrder" value="Place an order"
          />
          </form>
          <?php

function testfun()
{
    
     $db = new Baza("localhost", "root", "", "klienci");
     
     $sessionID = session_id();
     
     $mysqli = $db->getMysqli();
     
      $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '".$sessionID."'";
  
     $userId = $mysqli->query($sql)->fetch_object();
     
     if($userId!=null):?>
        <script>window.location.href="customerForm.php";</script><?php
     elseif($userId==null):?>
        <script>confirm("Log in to place an order!");window.location.href="login.php";</script>
     <?php endif;    
}

if(array_key_exists('placeOrder',$_POST)){
   testfun();
}

?>
            
          
        </div>
      </div>
      <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">Discount codes cannot be stacked ⛔</p>
        </div>
      </div>
    </div>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container px-4 px-lg-5">
        <p class="m-0 text-center text-white">
          Copyright &copy; Maciej Ciukaj 2022
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script src="js/cart.js"></script>
  </body>
</html>
