<?php

Class Form {

    private $err = array();

    public function isValid($formdata){
        $_SESSION['error'] = array();
        foreach($formdata as $key => $value){
            $method = "verif".ucwords($key);
            if (method_exists($this, $method) && $this->$method($value) == false){
                array_push($this->err, $key);
            }
        }
        if (empty($this->err)){
            return true;
        }
        else {
            foreach($this->err as $value){
                if ($value == "password")
                    array_push($_SESSION['error'],"Le mot de passe ne correspond pas au consigne suivante 1 Maj, 1 Miniscule, 1 chiffre, 8 charactere minimum");
                else if ($value == "email")
                    array_push($_SESSION['error'], "L'email n'est pas valide");
                else if ($value == "username")
                    array_push($_SESSION['error'], "Veuillez entrez un username");
                }
            return false;
        }
    }

    public function verifEmail($email){
        $arr = array("email" => $email);
        $filter = array("email" => array(
                'filter' => FILTER_VALIDATE_EMAIL,
                'flags' => FILTER_SANITIZE_EMAIL
                )
            );
        return filter_var_array($arr, $filter)["email"];
    }

    public function verifUsername($username){
        $arr = array("username" => $username);
        $filter = array("username" => array(
                'flags' => FILTER_SANITIZE_STRING
                )
            );
        return filter_var_array($arr, $filter)["username"];
    }

    public function verifPassword($password){
        $arr = array("password" => $password);
        $filter = array("password" => array(
            "filter" => FILTER_VALIDATE_REGEXP,
            "options" =>
                array("regexp"=>'/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,20}$/'),
            )
        );
        
        return filter_var_array($arr, $filter)["password"];
    }
}