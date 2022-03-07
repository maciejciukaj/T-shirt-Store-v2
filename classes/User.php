<?php

class User {

    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;

    protected $userName;
    protected $passwd;
    protected $fullName;
    protected $email;
    protected $date;

    function __construct($userName, $fullName, $email, $passwd) {
        $this->status = User::STATUS_USER;
        $this->userName = $userName;
        $this->email = $email;
        $this->fullName = $fullName;
        $this->date = (new DateTime())->format('Y-m-d H:i:s');
        $this->passwd = password_hash($passwd, PASSWORD_ARGON2I);
    }

    public function show() {
        echo "Nazwa: " . ($this->userName) . "<br/>";
        echo "Haslo: " . ($this->passwd) . "<br/>";
        echo "Imie i nazwisko: " . ($this->fullName) . "<br/>";
        echo "Email: " . ($this->email) . "<br/>";
        echo "Data: " . ($this->date) . "<br/>";
        echo "Status: " . ($this->status) . "<br/>";
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getUserName() {
        return $this->$userName;
    }

    public function getPasswd() {
        return $this->passwd;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDate() {
        return $this->date;
    }

    public function setPasswd($passwd): void {
        $this->passwd = $passwd;
    }

    public function setFullName($fullName): void {
        $this->fullName = $fullName;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setDate($date): void {
        $this->date = $date;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    public function toArray() {
        $arr = [
            "userName" => $this->userName,
            "fullName" => $this->fullName,
            "email" => $this->email,
            "passwd" => $this->passwd,
            "status" => $this->status,
            "date" => $this->date];
        return $arr;
    }

    public function saveDB($db) {
        $tablica = $this->toArray();
        $dane = "";
        foreach ($tablica as $key => $value) {
            if (is_array($value)) {
                $dane .= "'";
                $dane .= join(',', $value);
                $dane .= "', ";
            }   else {
                if ($key != 'date') {
                    $dane .= "'" . $value . "', ";
                }   else {
                    $dane .= "'" . $value . "'";
                }
            }
        }
        $sql = "INSERT INTO `users` (`userName`, `fullName`, `email`, `passwd`, `status`, `date`) " . "VALUES ($dane);";
        if ($db->insert($sql)) {
            echo "<br>Dodano do bazy";
        }   
    }

    public static function getAllUsersFromDB($db) {
        echo $db->select("select userName, fullName, email, passwd, status from users", array("userName", "fullName", "email", "passwd", "status"));
    }

    public static function usun($db, $email) {
        $sql = "DELETE FROM `users` WHERE `email` = '$email'";
        if ($db->delete($sql)) {
            echo"</br>Usunieto klienta o emailu: $email";
        }   else {
            echo"</br>W bazie nie ma klienta o takim emailu";
        }
    }

}
