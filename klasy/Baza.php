<?php

class Baza {

    private $mysqli;

    public function __construct($serwer, $user, $pass, $baza) {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
        /* sprawdz połączenie */
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n", $mysqli->connect_error);
            exit();
        } /* zmien kodowanie na utf8 */
        if ($this->mysqli->set_charset("utf8")) {
            //udało sie zmienić kodowanie         
        }
    }

    function __destruct() {
        $this->mysqli->close();
    }

    public function select($sql, $pola) {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola); //ile pól
            $ile = $result->num_rows; //ile wierszy
            // // pętla po wyniku zapytania $results
          //  $tresc .= "<table class='fs-small'>";
            while ($row = $result->fetch_object()) {
                $tresc .= "\t";
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc .= "\t" . $row->$p . "\t";
                }
                $tresc .= "</br></br>";
            }
           // $tresc .= "</table>";
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
    
    
    public function selectUser($login, $passwd, $tabela) {//parametry $login, $passwd , $tabela – nazwa tabeli z użytkownikami


$id = -1;//wynik – id użytkownika lub -1 jeśli dane logowania nie są poprawne
$sql = "SELECT * FROM $tabela WHERE userName='$login'";
if ($result = $this->mysqli->query($sql)) {
$ile = $result->num_rows;
if ($ile == 1) {
$row = $result->fetch_object(); //pobierz rekord z użytkownikiem
$hash = $row->passwd; //pobierz zahaszowane hasło użytkownika
//sprawdź czy pobrane hasło pasuje do tego z tabeli bazy danych:
if (password_verify($passwd, $hash))
$id = $row->id; //jeśli hasła się zgadzają - pobierz id użytkownika
}
}
return $id; //id zalogowanego użytkownika(>0) lub -1
}

}
