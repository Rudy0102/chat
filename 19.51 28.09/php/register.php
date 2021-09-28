<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if ((isset($_POST["login"]))&&isset($_POST["password"])&&isset($_POST["email"])){ 
    $registerClass = new RegisterClass;
    $registerClass->setVariables();
    $registerClass->checkEmail();
    $registerClass->registerUser();
}
class RegisterClass{
    function setVariables(){
        $this->login=$_POST["login"]; 
        unset($_POST["login"]);
        $this->password=$_POST["password"]; 
        unset($_POST["password"]);
        $this->email=$_POST["email"]; 
        unset($_POST["email"]);
    }
    function checkEmail(){
        require("../php/connectdatabase.php");
        $query="SELECT email FROM uzytkownicy";
        $result = $link->query($query);
            while ($row = $result->fetch_assoc())
            {
                if ($this->email==$row["email"]){
                    // header("Location: http://localhost/phpGaleria/register/index.php?wrongemail=true");
                    exit();
                }
            }
    }
    function registerUser(){
        require("../php/connectdatabase.php");        
        $hashed=password_hash($this->password,PASSWORD_BCRYPT);
        $query="INSERT INTO uzytkownicy VALUES (NULL,'$this->login','$this->email','$hashed')";
        $result = $link->query($query);
        include("login.php");
        $login = new loginClass;    //automaticly logins after registration
        $login->login($this->login,$this->password);
        //header("Location: ../main.html");
        exit();
}
}
?>