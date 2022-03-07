<?php

class Baza {

    private $mysqli;

    public function __construct($serwer, $user, $pass, $baza) {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
       
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n", $mysqli->connect_error);
            exit();
        } 
        if ($this->mysqli->set_charset("utf8")) {
                  
        }
    }

    function __destruct() {
        $this->mysqli->close();
    }

    public function select($sql, $pola) {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola); 
            $ile = $result->num_rows; 
            
          
            while ($row = $result->fetch_object()) {
                $tresc .= "\t";
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc .= "\t" . $row->$p . "\t";
                }
                $tresc .= "</br></br>";
            }
           
            $result->close(); /* zwolnij pamięć */
        }
        return $tresc;
    }

    public function insert($sql) {
        if ($this->mysqli->query($sql))
            return true;
        else
            return false;
    }

    public function getMysqli() {
        return $this->mysqli;
    }

    public function delete($sql) {
        if ($this->mysqli->query($sql)) {
            return true;
        } else
            return false;
    }
    
    
    public function selectUser($login, $passwd, $tabela) {


$id = -1;
$sql = "SELECT * FROM $tabela WHERE userName='$login'";
if ($result = $this->mysqli->query($sql)) {
$ile = $result->num_rows;
if ($ile == 1) {
$row = $result->fetch_object(); //pobierz rekord z użytkownikiem
$hash = $row->passwd; 

if (password_verify($passwd, $hash))
$id = $row->id; //jeśli hasła się zgadzają - pobierz id użytkownika
}
}
return $id; //id zalogowanego użytkownika(>0) lub -1
}

}
