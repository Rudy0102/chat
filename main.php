<html lang="pl">

<head>
    <title>Czat 4D</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="main.js" defer></script>
</head>

<body>
    <div>
        <div class="chat">
            <div class="textpool" id="chat">
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
        <div class="menu">
            <button onclick="showinfo()">Account</button>
        </div>
        <div class="text">
            <form method="POST" , autocomplete="off">
                <input type="text" name="usertext" class="usertextarea">
                <input type="submit" class="buttonsend" value="Send">
            </form>
        </div>
        <div class="account" id="accountmenu">
            <div class="info">
                <button onclick="hideinfo()">X</button>
                <br>
                Avatar:
                <br>
                <img src="img/avatar.png" alt="testavatarinfo">
                <br>
                Name: TestUser#1111
                <br>
                Last Login: 0000-00-00
            </div>
        </div>
        <div class="login" id="login">
            <div class="loginsite">
            <form action="./php/login.php" method="post">
                <label for="login">Login:</label>
                <br>
                <input type="text" name="login" id="login" required>
                <br>
                <label for="password">Hasło:</label>
                <br>
                <input type="text" name="password" id="password" required>
                <br>
                <input type="submit" value="Zaloguj">
            </form>
            <p class="registertext">Register here</p>
            </div>
        </div>
    </div>
    <?php
    if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if(isset($_SESSION["logged"]))
    {
        echo ("<script>
        {
            const login = document.getElementById('login');
            login.style.visibility='hidden';
        }
        </script>");
    }
    ?>
</body>

</html>