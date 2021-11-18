<?php

class Benutzer
{
    //Datenfelder
    private $email = '';
    private $password = '';

    /**
     * @param string $email
     * @param string $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Setzt ein neues Benutzerobjekt, mit diesem man sich einloggen kann und überprüft
     * ob dieser mit den Logindaten übereinstimmen
     * @param $email
     * @param $password
     * @return Benutzer|null
     */
    public static function get($email, $password)
    {
        $fixEmail = "test@icloud.com";
        $fixPassword = "123";
        $user = new Benutzer($fixEmail, $fixPassword);

        if ($email==$user->getEmail() && $password==$user->getPassword()) {
            return $user;
        } else {
            return null;
        }
    }

    /**
     * Fügt der Session ein neues Feld hinzu und leitet uns an die Wochenkarte weiter (einloggen)
     */
    public function login()
    {
        $_SESSION['email'] = $this->getEmail();
        header("Location: wochenkarte.php");
    }

    /**
     * Session wird zurückgesetzt (email) und leitet uns an den Login weiter → man muss sich erneut einloggen (ausloggen)
     */
    public static function logout()
    {
        session_destroy();
        header("Location: index.php");
    }

    /**
     * Überprüfe ob die Session gesetzt wurde
     * @return bool
     */
    public static function isLoggedIn()
    {
        if (isset($_SESSION['email'])){
            return true;
        } else {
            return false;
        }
    }
}