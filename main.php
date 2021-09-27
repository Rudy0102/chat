<html lang="pl">

<head>
    <title>Czat 4D</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="chat">
        <div class="textpool">
        <?php
    $link = mysqli_connect("localhost", "root", "", "czat");
    $question = "SELECT * FROM wiadomosci ORDER BY `datap` desc"; //ogaranc koljenosc wyswietlania potem
    $result = mysqli_query($link, $question);
    $licznik = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($licznik>2){ // liczba wynikow do pokazania
            break;
        }
        else{
            $licznik++;
            echo $row['autor'];
            echo(" ");
            echo $row['tresc'];
            echo(" ");
            echo $row['datap'];
            echo("<br>");
        }
    }
    ?>
    </div>
    </div>
    <div class="users">
        <div class="insideusers">
            <div class="userslist">
                <img src="img/avatar.png" alt="testavatar">TestUser: Online
                <br>
                <img src="img/avatar2.png" alt="testavatar2">TestUser: Offline
                <br>
                <img src="img/avatar.png" alt="testavatar3">TestUser: Offline
            </div>
        </div>
    </div>
    <div class="menu"></div>
    <div class="text">
        <form method="POST", autocomplete="off">
            <input type="text" name="usertext" class="usertextarea">
            <input type="submit" class="buttonsend" value="Send">
        </form>
    </div>

    <?php
//$usertext = $_POST['usertext'];
//$data2 = date("Y-m-d H:i:s");
//$question = "INSERT INTO wiadomosci (autor, tresc, datap) VALUES ('test', '$usertext', '$data2')";
//$link = mysqli_connect("localhost", "root", "", "czat");
//$result = mysqli_query($link, $question);
//mysqli_close($link);
?>


</body>

</html>