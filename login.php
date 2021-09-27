<?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (isset($_POST['Login'])&&isset($_POST['Password'])){
        $loginClass = new LoginClass;
        // $loginClass->setVariables();
        $loginClass->login($loginClass->login,$loginClass->password);
    }
    class LoginClass{
        function __construct(){
            $this->login = $_POST['Login']; 
            unset($_POST['Login']);
            $this->password = $_POST['Password']; 
            unset($_POST['Password']);
        }
        function login($login,$password){
            require("../php/connectdatabase.php");
            $query = "SELECT id,`login`,`password`,`permissions` FROM users";
            $result = $mysql->query($query);
            while ($row = $result->fetch_assoc())
            {
                if (($login==$row['login'])&&(password_verify($password,$row['password'])))
                {
                    $_SESSION["username"]=$login;
                    $_SESSION["userpermissions"]=$row['permissions'];
                    $_SESSION["logged"]=true;
                    $_SESSION["userid"]=$row['id'];
                    header('Location: ../confirmation/index.php?result=1');    // logged = true            
                    exit();
                }
            }
            header('Location: ../login?result=false');       // redirect again to login page          
            exit();
        }
    }
    
?>