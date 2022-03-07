<?php
class UserManager {
    
    function loginForm() {
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
            <li class="nav-item"><a class="nav-link active"  href="login.php">Sign in</a></li>
            <li class="nav-item"><a class="nav-link"  href="register.php"
                >Sign up</a
              ></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content-->

    <div class="container px-4 px-lg-5">
      <h1 class="py-2 text-center">Sign in</h1>
      <div class="card h-100 fs-5 py-2 text-center">
         
        <form action="login.php" method="post">
            Login: <input type="text" name = "login">
            Password: <input  type="password" name = "passwd"><p>
            <div class="mt-4">
        <input class = "m-2" type="submit" value="Zaloguj" name="zaloguj" />
        <input type="reset" value="Anuluj" name="anuluj" /></div>
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

    function login($db) {//funkcja sprawdza poprawność logowania
        
       
        $args = [
        'login' => FILTER_SANITIZE_ADD_SLASHES,
        'passwd' => FILTER_SANITIZE_ADD_SLASHES];
        //przefiltruj dane z GET (lub z POST) zgodnie z ustawionymi w $args filtrami:
        $dane = filter_input_array(INPUT_POST, $args);
        //sprawdź czy użytkownik o loginie istnieje w tabeli users
        //i czy podane hasło jest poprawne
        $login = $dane["login"];
        $passwd = $dane["passwd"];
        $userId = $db->selectUser($login, $passwd, "users");
        if ($userId >= 0) { //Poprawne dane  
              
            session_start();    //rozpocznij sesję zalogowanego użytkownika
            $db->delete("DELETE FROM logged_in_users WHERE userId = $userId");//usuń wszystkie wpisy historyczne dla użytkownika o $userId
            $values = "'".session_id()."','".$userId."','".(new DateTime('now'))->format("Y-m-d H:i:s")."'"; //ustaw datę - format("Y-m-d H:i:s");
            $db->insert("INSERT INTO logged_in_users(sessionId, userId, lastUpdate) VALUES ($values)"); //pobierz id sesji i dodaj wpis do tabeli logged_in_users    
        }

        return $userId;
    }
    function logout($db) {
       
        session_start();
        $id = session_id(); //pobierz id bieżącej sesji (pamiętaj o session_start()
        $db->delete("DELETE FROM logged_in_users WHERE sessionId = '".$id."'"); //usuń wpis z id bieżącej sesji z tabeli logged_in_users
        
        if( isset($_SERVER['HTTP_COOKIE']) ){
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $temp = explode('=', $cookie);
                $name = trim($temp[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        
        session_destroy();//usuń sesję (łącznie z ciasteczkiem sesyjnym)
    }

    function getLoggedInUser($db, $sessionId) {

        $id = "'".$sessionId."'";
        $userId = $db->query("SELECT userId FROM logged_in_users WHERE sessionId=$id");
        
        if($userId>0){
            return $userId;//wynik $userId - znaleziono wpis z id sesji w tabeli logged_in_users
        }else{
            return -1;  //wynik -1 - nie ma wpisu dla tego id sesji w tabeli logged_in_users
        }
    }
}
?>