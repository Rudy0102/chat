<?php
var_dump($_POST);
if (isset($_POST["usertext"])){
    $usertext = $_POST['usertext'];
    $data = date("Y-m-d H:i:s");
    $question = "INSERT INTO wiadomosci (autor, tresc, data) VALUES ('test', '$usertext', '$data')";
    require("./connectdatabase.php");
    $result = mysqli_query($link, $question);
    mysqli_close($link);
}
?>