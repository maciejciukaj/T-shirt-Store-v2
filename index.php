<?php 
//include_once ('login.php');
include_once 'klasy/Baza.php';
    include_once 'klasy/User.php';
    include_once 'klasy/UserManager.php';
         session_start();
    
    $db = new Baza("localhost", "root", "", "klienci");
    $sessionID = session_id();
    
    $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '".$sessionID."'";
   
    $mysqli = $db->getMysqli();
  
     $userId = $mysqli->query($sql)->fetch_object();
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

    <title id="tytul">T-shirt store</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="tshirt.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body onload="numberOfProducts()">
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
                ><div id="cart">Cart 🛒 (0)</div></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            
              <?php 
              
              if($userId!=null):
                    $sql2 = "SELECT status FROM users WHERE id = '".$userId->userId."'";
                    $status = $mysqli->query($sql2)->fetch_object()->status; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php?akcja=wyloguj">Logout</a> </li>
                    <?php endif;?>
                    <?php
                    if($userId!=null&&$status==2):?>
                     <li class="nav-item">
                         <a class="nav-link" href="adminPage.php">Control Panel</a></li>
                    
                    <?php
                    elseif($userId==null):?>
                     <li class="nav-item">
                         <a class="nav-link" href="login.php">Sign in</a>
                         </li>
                     <li class="nav-item">
                    <a class="nav-link" href="register.php">Sign up</a>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content-->

    <div class="container px-4 px-lg-5">
      <!-- Heading Row-->
      <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-12">
          <div
            id="carouselExampleControls"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="assets/pink_edit_welcome.jpg"
                  class="d-block w-100"
                  alt="pink"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="assets/white_edit_info.jpg"
                  class="d-block w-100"
                  alt="white"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="assets/blue_edit_discount.jpg"
                  class="d-block w-100"
                  alt="blue"
                />
              </div>
            </div>
              
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleControls"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleControls"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <!-- Call to Action-->

      <!-- Content Row-->
      <div class="row gx-4 gx-lg-5">
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title" id="one">White</h2>
              <hr />
              <p class="card-text">
                <img src="assets/tshirt1.png" alt="zdj1" />
              </p>
            </div>
            <div class="card-footer">
              <div class="setButtons">
                <a class="btn btn-primary btn-sm blue" href="moreInfo.php"
                  >More Info</a
                >
                <a
                  class="btn btn-primary btn-sm green"
                  onclick="addedToCart('one')"
                  >Add to cart</a
                >
              </div>

              <div class="radio-toolbar">
                <input type="radio" id="WhiteS" name="radioSize" value="S" />
                <label for="WhiteS">S</label>

                <input type="radio" id="WhiteM" name="radioSize" value="M" />
                <label for="WhiteM">M</label>

                <input type="radio" id="WhiteL" name="radioSize" value="L" />
                <label for="WhiteL">L</label>

                <input type="radio" id="WhiteX" name="radioSize" value="XL" />
                <label for="WhiteX">XL</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title" id="two">Red</h2>
              <hr />
              <p class="card-text">
                <img src="assets/tshirt2.png" alt="zdj2" />
              </p>
            </div>
            <div class="card-footer">
              <div class="setButtons">
                <a class="btn btn-primary btn-sm blue" href="moreInfo.php"
                  >More Info</a
                >
                <a
                  class="btn btn-primary btn-sm green"
                  onclick="addedToCart('two')"
                  >Add to cart</a
                >
              </div>

              <div class="radio-toolbar">
                <input type="radio" id="RedS" name="radioSize" value="S" />
                <label for="RedS">S</label>

                <input type="radio" id="RedM" name="radioSize" value="M" />
                <label for="RedM">M</label>

                <input type="radio" id="RedL" name="radioSize" value="L" />
                <label for="RedL">L</label>

                <input type="radio" id="RedX" name="radioSize" value="XL" />
                <label for="RedX">XL</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title" id="three">Blue</h2>
              <hr />
              <p class="card-text">
                <img src="assets/tshirt3.png" alt="zdj3" />
              </p>
            </div>
            <div class="card-footer">
              <div class="setButtons">
                <a class="btn btn-primary btn-sm blue" href="moreInfo.php"
                  >More Info</a
                >
                <a
                  class="btn btn-primary btn-sm green"
                  onclick="addedToCart('three')"
                  >Add to cart</a
                >
              </div>

              <div class="radio-toolbar">
                <input type="radio" id="BlueS" name="radioSize" value="S" />
                <label for="BlueS">S</label>

                <input type="radio" id="BlueM" name="radioSize" value="M" />
                <label for="BlueM">M</label>

                <input type="radio" id="BlueL" name="radioSize" value="L" />
                <label for="BlueL">L</label>

                <input type="radio" id="BlueX" name="radioSize" value="XL" />
                <label for="BlueX">XL</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title" id="four">Pink</h2>
              <hr />
              <p class="card-text">
                <img src="assets/tshirt4.png" alt="zdj4" />
              </p>
            </div>
            <div class="card-footer">
              <div class="setButtons">
                <a class="btn btn-primary btn-sm blue" href="moreInfo.php"
                  >More Info</a
                >
                <a
                  class="btn btn-primary btn-sm green"
                  onclick="addedToCart('four')"
                  >Add to cart</a
                >
              </div>

              <div class="radio-toolbar">
                <input type="radio" id="PinkS" name="radioSize" value="S" />
                <label for="PinkS">S</label>

                <input type="radio" id="PinkM" name="radioSize" value="M" />
                <label for="PinkM">M</label>

                <input type="radio" id="PinkL" name="radioSize" value="L" />
                <label for="PinkL">L</label>

                <input type="radio" id="PinkX" name="radioSize" value="XL" />
                <label for="PinkX">XL</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title" id="five">Green</h2>
              <hr />
              <p class="card-text">
                <img src="assets/tshirt5.png" alt="zdj5" />
              </p>
            </div>
            <div class="card-footer">
              <div class="setButtons">
                <a class="btn btn-primary btn-sm blue" href="moreInfo.php"
                  >More Info</a
                >
                <a
                  class="btn btn-primary btn-sm green"
                  onclick="addedToCart('five')"
                  >Add to cart</a
                >
              </div>

              <div class="radio-toolbar">
                <input type="radio" id="GreenS" name="radioSize" value="S" />
                <label for="GreenS">S</label>

                <input type="radio" id="GreenM" name="radioSize" value="M" />
                <label for="GreenM">M</label>

                <input type="radio" id="GreenL" name="radioSize" value="L" />
                <label for="GreenL">L</label>

                <input type="radio" id="GreenX" name="radioSize" value="XL" />
                <label for="GreenX">XL</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title" id="six">Yellow</h2>
              <hr />
              <p class="card-text">
                <img src="assets/tshirt6.png" alt="zdj6" />
              </p>
            </div>
            <div class="card-footer">
              <div class="setButtons">
                <a class="btn btn-primary btn-sm blue" href="moreInfo.php"
                  >More Info</a
                >
                <a
                  class="btn btn-primary btn-sm green"
                  onclick="addedToCart('six')"
                  >Add to cart</a
                >
              </div>

              <div class="radio-toolbar">
                <input type="radio" id="YellowS" name="radioSize" value="S" />
                <label for="YellowS">S</label>

                <input type="radio" id="YellowM" name="radioSize" value="M" />
                <label for="YellowM">M</label>

                <input type="radio" id="YellowL" name="radioSize" value="L" />
                <label for="YellowL">L</label>

                <input type="radio" id="YellowX" name="radioSize" value="XL" />
                <label for="YellowX">XL</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
          <p class="text-white m-0"></p>
        </div>
      </div>
      <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
          <img
            class="img-fluid rounded mb-4 mb-lg-0"
            src="assets/newsletter.png"
            alt="news"
          />
        </div>

        <div class="col-lg-5">
          <h1 class="font-weight-light">Sign up for a newsletter !</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
            vel erat in ipsum accumsan congue quis laoreet nunc. Phasellus in
            purus mauris. Quisque pretium aliquet mauris, ac ornare metus ornare
            sed.
          </p>
          <a class="btn btn-primary blue" href="register.php">Sign up ✅</a>
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
    <script src="js/main_page.js"></script>
  </body>
</html>
