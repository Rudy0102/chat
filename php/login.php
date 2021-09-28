<?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (isset($_POST['login'])&&isset($_POST['password'])){
        $loginClass = new LoginClass;
        // $loginClass->setVariables();
        $loginClass->login($loginClass->login,$loginClass->password);
    }
    class LoginClass{
        function __construct(){
            $this->login = $_POST['login']; 
            unset($_POST['login']);
            $this->password = $_POST['password']; 
            unset($_POST['password']);
        }
        function login($login,$password){
            require("connectdatabase.php");
            $query = "SELECT id,`nazwa`,`haslo` FROM uzytkownicy";
            $result = $link->query($query);
            while ($row = $result->fetch_assoc())
            {
                if (($login==$row['nazwa'])&&(password_verify($password,$row['haslo'])))
                {
                    $_SESSION["username"]=$login;
                    $_SESSION["logged"]=true;
                    $_SESSION["userid"]=$row['id'];
                    header('Location: ../main.php');    
                    exit();
                }
            }
            header('Location: ../main.php');       // redirect again to login page          
            exit();
        }
    }
    
?>
