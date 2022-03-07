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
    <title>T-shirt store</title>
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
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
  
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content-->

    <div class="container px-4 px-lg-5">
      <!-- Heading Row-->
      <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="moreInfo">
          <div class="col-lg-4 mx-4 col-md-6">
            <div
              id="carouselExampleControls"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="assets/tshirt1.png"
                    class="d-block w-100"
                    alt="1"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="assets/tshirt2.png"
                    class="d-block w-100"
                    alt="2"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="assets/tshirt3.png"
                    class="d-block w-100"
                    alt="3"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="assets/tshirt4.png"
                    class="d-block w-100"
                    alt="4"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="assets/tshirt5.png"
                    class="d-block w-100"
                    alt="5"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="assets/tshirt6.png"
                    class="d-block w-100"
                    alt="6"
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
          <div class="tshirt-desc col-lg-4">
            <h1 class="grey mb-5">Basic t-shirts</h1>
            <br />
            <h4 class="mt-1"><b>9.90$</b>/per piece</h4>
            <div class="accordion text-center mt-5">
              <div id="one" class="section">
                <h4>
                  <a href="#one">Product details</a>
                </h4>
                <div>
                  <p>
                    95% Cotton, 5% Polyester<br />Available colorways: white,
                    red, blue, pink, green, yellow
                  </p>
                </div>
              </div>
              <hr />
              <div id="two" class="section">
                <h4>
                  <a href="#two">Care instructions</a>
                </h4>
                <div>
                  <ul>
                    <li>Machine wash cold</li>
                    <li>No bleach</li>
                    <li>No fabric softeners</li>
                  </ul>
                </div>
              </div>
              <hr />
              <div id="three" class="section">
                <h4>
                  <a href="#three">Size information</a>
                </h4>
                <div>
                  <p>
                    This product is made according to men's size guidlines. For
                    women's sizing, we recommend purchasing either 1 or 2 sizes
                    smaller than your usual size.
                  </p>
                </div>
              </div>
              <hr />
              <div id="four" class="section">
                <h4>
                  <a href="#four">Description</a>
                </h4>
                <div>
                  <p>
                    One piece with high degree of perfection that looks simple
                    and has outstanding design and durability.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Call to Action-->

        <!-- Content Row-->
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
