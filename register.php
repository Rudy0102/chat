<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if ((isset($_POST["Login"]))&&isset($_POST["Password"])&&isset($_POST["Email"])){ 
    $registerClass = new RegisterClass;
    $registerClass->setVariables();
    $registerClass->checkEmail();
    $registerClass->registerUser();
}
class RegisterClass{
    function setVariables(){
        $this->login=$_POST["Login"]; 
        unset($_POST["Login"]);
        $this->password=$_POST["Password"]; 
        unset($_POST["Password"]);
        $this->email=$_POST["Email"]; 
        unset($_POST["Email"]);
    }
    function checkEmail(){
        require("../php/connectdatabase.php");
        $query="SELECT email FROM users";
        $result = $mysql->query($query);
            while ($row = $result->fetch_assoc())
            {
                if ($this->email==$row["email"]){
                    header("Location: http://localhost/phpGaleria/register/index.php?wrongemail=true");
                    exit();
                }
            }
    }
    function registerUser(){
        require("../php/connectdatabase.php");        
        $hashed=password_hash($this->password,PASSWORD_BCRYPT);
        $query="INSERT INTO users (login, password, email, permissions) VALUES ('$this->login', '$hashed', '$this->email', 'user')";
        $result = $mysql->query($query);
        include("login.php");
        $login = new loginClass;    //automaticly logins after registration
        $login->login($this->login,$this->password);
        header("Location: http://localhost/phpGaleria/confirmation/index.php?result=$result&error=Problem with registration if this error keeps happening contact support!");
        exit();
}
}
?>