<?php 

include_once 'classes/Baza.php';
    include_once 'classes/User.php';
    include_once 'classes/UserManager.php';
 

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

    <title>Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="tshirt.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body>
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
              <a class="nav-link"  href="cart.php"
                >Cart 🛒</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="contact.php"
                >Contact</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content-->


    <div class="container px-4 px-lg-5">
    
      <div class="card h-100 fs-5 py-2 mb-2">
          <h2 class='mb-4'>Admin Panel</h2>
          Show users in database: 
           <form class='m-4' method="post">
         <input type="submit" name="test" id="test" value="Show" />
         <input type="submit" name="hide" id="hide" value="Hide" /><br/>
</form>



          Delete user:
           <form class='m-4' method="post">
          <input type="email" name="email" size="20" class='inp-wid' placeholder="example@gmail.com">
          <input type="submit" name="delete" id="delete" value="Delete" />
           </form>
          
          
<?php

function testfun()
{
     $db = new Baza("localhost", "root", "", "klienci");
     User::getAllUsersFromDB($db);
}

if(array_key_exists('test',$_POST)){
   testfun();
}
if(array_key_exists('hide',$_POST)){
   header("Refresh:0");
}
if(array_key_exists('delete',$_POST)){
    $db = new Baza("localhost", "root", "", "klienci");
    $email = $_POST['email'];
    User::usun($db, $email);
}
?>

      </div>
      <!-- Heading Row-->
    
      <!-- Call to Action-->
    
     
     
      <!-- Content Row-->
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
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->
    <script src="js/map.js"></script>
    <script src="js/contact.js"></script>
  </body>
</html>
