<?php
    include_once 'classes/Baza.php';
    include_once 'classes/User.php';
    include_once 'classes/UserManager.php';
    $db = new Baza("localhost", "root", "", "klienci");
    $um = new UserManager();
    
    if (filter_input(INPUT_GET, "akcja")=="wyloguj") {
        $um->logout($db);
       
    }
    
    if (filter_input(INPUT_POST, "zaloguj")) {
        $userId = $um->login($db);
        if ($userId > 0) {        
            ?><script>confirm("Logged in!"); window.location.href="index.php";</script><?php

        } else {
            ?><script>confirm("Invalid username or password !"); window.location.href="login.php";</script><?php
        }
    } else {
        //pierwsze uruchomienie skryptu processLogin
        $um->loginForm();  
    }
 ?>