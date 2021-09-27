<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
function sendEmail($email){
    // $website="192.168.0.164";
    try {
        $cryptedMail = md5($email); 
        $randomNumber = rand();
        $cryptedNumber = md5($randomNumber);
        $token=$cryptedMail.$cryptedNumber;
        $_SESSION['token'] = $token;
        // Query to add token to database
        require("../php/connectdatabase.php");
        $query="INSERT INTO emailrecovery (email,token) VALUES ('$email','$token')";
        $result = $mysql->query($query);
        return($result);
    } 
    catch (\Throwable $err) {
        return(0);
    }
};
if (isset($_POST["Email"])){ $email=$_POST["Email"]; unset($_POST["Email"]) ;};
if (!empty($email)){
    require("../php/connectdatabase.php");
    $query="SELECT email FROM users";
    $result = $mysql->query($query);
        while ($row = $result->fetch_assoc())
        {
            if ($email==$row["email"]){
                $result=sendEmail($email);
                header("Location: ../confirmation/index.php?result=$result&t=true");
                exit();
            }
        }
        header("Location: ../resetpassword/index.php?wrongemail=true");
        exit();
    }
?>