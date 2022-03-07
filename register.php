<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once('classes/RegistrationForm.php');
        include 'classes/User.php';

        include_once 'classes/Baza.php';

        $bd = new Baza("localhost", "root", "", "klienci");
        $rf = new RegistrationForm();
        
        if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
            $user = $rf->checkUser();
            
            
            if ($user === NULL) {
                ?>
                <script>confirm("Incorrect data entered!")</script>
        <?php
            }   else {
                $user->saveDB($bd);
                ?>
                <script>confirm("User has been successfully registered!");window.location.href = "index.php";</script>
        <?php
            }
        }
        
        ?>
    </body>
</html>
