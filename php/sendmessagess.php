<?php
if  (session_status() !== PHP_SESSION_ACTIVE) session_start();
if  (isset($_POST["usertext"])){
    $usertext = $_POST['usertext'];
    $data = date("Y-m-d H:i:s");
    $question = "INSERT INTO wiadomosci (autor, tresc, data) VALUES (".$_SESSION['userid'].", '$usertext', '$data')";
    require("./connectdatabase.php");
    $result = mysqli_query($link, $question);
    mysqli_close($link);
    echo $result;
}
?>