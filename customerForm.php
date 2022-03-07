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
    <title>Your order</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="tshirt.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <link
      href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap"
      rel="stylesheet"
    />
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
        <h1 class="mb-5">Your order:</h1>
        <h2 class="grey mb-4">Shipping details:</h2>
        <div>
          <table>
            <tr>
              <td>First name:</td>
              <td style="height: 100px; width: 100px">
                <input
                  name="fname"
                  id="fname"
                  class="rounded-1"
                  placeholder="John"
                />
              </td>
              <td id="fname_error" class="red"></td>
            </tr>
            <tr>
              <td>Last name:</td>
              <td style="height: 100px; width: 100px">
                <input
                  name="lname"
                  id="lname"
                  class="rounded-1"
                  placeholder="Smith"
                />
              </td>
              <td id="lname_error" class="red"></td>
            </tr>
            <tr>
              <td>E-mail address:</td>
              <td style="height: 100px; width: 100px">
                <input
                  name="email"
                  id="email"
                  class="rounded-1"
                  placeholder="my.email@xyz.com"
                />
              </td>
              <td id="email_error" class="red"></td>
            </tr>
            <tr>
              <td>Street address:</td>
              <td style="height: 100px; width: 100px">
                <input name="street" id="street" class="rounded-1" />
              </td>
              <td id="street_error" class="red"></td>
            </tr>
            <tr>
              <td>City:</td>
              <td style="height: 100px; width: 100px">
                <input name="city" id="city" class="rounded-1" />
              </td>
              <td id="city_error" class="red"></td>
            </tr>
            <tr>
              <td>Phone number:</td>
              <td style="height: 100px; width: 100px">
                <input
                  name="phone"
                  id="phone"
                  class="rounded-1"
                  placeholder="123-456-789"
                />
              </td>
              <td id="phone_error" class="red"></td>
            </tr>
          </table>
          <hr />
          <h2 class="grey mb-4">Payment details:</h2>
          <table>
            <tr>
              <td>Credit card number:</td>
              <td style="height: 100px">
                <input
                  name="card"
                  id="card"
                  class="rounded-1"
                  placeholder="4 digits"
                />
              </td>

              <td class="mx-2">CVC:</td>
              <td style="height: 100px">
                <input
                  name="cvc"
                  id="cvc"
                  class="rounded-1"
                  placeholder="123"
                />
              </td>
            </tr>
            <tr>
              <td>Card owner name:</td>
              <td style="height: 100px">
                <input name="cardN" id="cardN" class="rounded-1" />
              </td>
              <td></td>
              <td></td>
            </tr>
          </table>
          <hr />
          <input type="checkbox" id="consent" /><i>
            Consent to the processing of personal data*</i
          >
          <div id="consent_error" class="red"></div>
          <br />
        </div>

        <button id="glitch" class="glitch mt-4">Submit your order</button>
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
    <script src="js/order.js"></script>
  </body>
</html>
