<?php

class RegistrationForm {

    protected $user;

    function __construct() { ?>
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
              <a class="nav-link"  href="contact.php"
                >Contact</a
              >
            </li>
            <li class="nav-item"><a class="nav-link" href="login.php">Sign in</a></li>
            <li class="nav-item"><a class="nav-link active"  href="register.php"
                >Sign up</a
              ></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content-->

    <div class="container px-4 px-lg-5">
      <h1 class="py-2 text-center">Register</h1>
      <div class="card h-100 fs-5 py-2 text-center">
         
        <form action="register.php" method ="post">
            Nazwa uzytkownika: <br/><input name = "userName"/><br/>
            Imie i nazwisko: <br><input name = "fullName"/><br/>
            Haslo: <br><input type = "password" name = "passwd"/><br/>
            Email: <br><input name = "email"/><br/>
            
            <input class = "mt-4" type="submit" name="submit" value="Register"/>
            <!--<input type ="submit" name ="submit" value ="Usun z bazy"/>-->
        </form>  
       
      </div>
      <!-- Content Row-->
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark mt-4">
      <div class="container px-4 px-lg-5">
        <p class="m-0 text-center text-white">
          Copyright &copy; Maciej Ciukaj 2022
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->

  </body>
</html>

     <?php
    }

    function checkuser() {
        $args = [
            'userName' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[0-9A-Za-zÄ…Ä™Ĺ‚Ĺ„Ä‡ĹşĹĽĂł_-]{2,25}$/']],
            'email' => FILTER_VALIDATE_EMAIL,
            'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,  'options' => ['regexp' => "/^[A-Z,ŁĆŚŻŹ]{1,}'?-?[a-z,ąęółśżźń]{2,}\s?-?'?([a-zA-Z,ŁĆŚŻŹąęółśżźń.]{1,})?$/"]],
            'passwd' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => "/^[0-9A-Za-z !@#$%^&*]{5,15}$/"]],
            
        ];
        //przefiltruj dane:
        $dane = filter_input_array(INPUT_POST, $args);
        
        //var_dump($dane);
        $errors = "";
        foreach ($dane as $key => $val) {
            if ($val === false or $val === NULL) {
                $errors .= $key . " ";
            }
        }

        if ($errors === "") {
          
            $this->user = new User($dane['userName'], $dane['fullName'], $dane['email'], $dane['passwd']);
        }   else {
           // echo "<p>Bledne dane: $errors</p>";
            $this->user = NULL;
        }
        return $this->user;
    }

}
