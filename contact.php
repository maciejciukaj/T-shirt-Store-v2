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

    <title>Contact</title>
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
              <a class="nav-link active"  href="contact.php"
                >Contact</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content-->

    <div class="container px-4 px-lg-5">
      <h1 class="py-2">Contact</h1>
      <div class="card h-100 fs-5 py-2">
        Company name: T-shirt store<br />Address: W 34th St, New York<br />Phone
        number: 1-800-334-5144<br />Our stores also in:

        <ul>
          <li><button id="toronto">Toronto</button></li>
          <li><button id="warsaw">Warsaw</button></li>
          <li><button id="tokio">Tokio</button></li>
          <li><button id="los_angeles">Los Angeles</button></li>
        </ul>
      </div>
      <!-- Heading Row-->
      <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
          <div id="map"></div>
        </div>
        <div class="col-lg-5">
          <h1 class="font-weight-light">Find us !</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
            vel erat in ipsum accumsan congue quis laoreet nunc. Phasellus in
            purus mauris. Quisque pretium aliquet mauris, ac ornare metus ornare
            sed.
          </p>
          <!--<a class="btn btn-primary blue" href="#!">Sign up</a>-->
        </div>
      </div>
      <!-- Call to Action-->
      <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
          <p class="text-white m-0">
            Try clicking one of listed cities above and see exact location of
            our stores
          </p>
        </div>
      </div>
      <h2 class="py-3">If you have any questions, please leave a message</h2>
      <div>
        <form
          action="mailto:maciek.ciukaj@gmail.com"
          method="post"
          onsubmit="return sprawdz()"
        >
          <table>
            <tr>
              <td>First name:</td>
              <td>
                <input name="fname" id="fname" placeholder="John" />
              </td>
              <td id="fname_error" class="red"></td>
            </tr>
            <tr>
              <td>Last name:</td>
              <td>
                <input name="lname" id="lname" placeholder="Smith" />
              </td>
              <td id="lname_error" class="red"></td>
            </tr>
            <tr>
              <td>E-mail address:</td>
              <td>
                <input name="email" id="email" placeholder="my.email@xyz.com" />
              </td>
              <td id="email_error" class="red"></td>
            </tr>
          </table>
          Message:
          <br />

          <textarea
            id="description"
            name="description"
            rows="7"
            cols="100"
          ></textarea>
          <input type="submit" value="Send" />
          <input type="reset" value="Clear" />
        </form>
        <h5 class="py-3">We'll try to answer as soon as possible !</h5>
      </div>
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
