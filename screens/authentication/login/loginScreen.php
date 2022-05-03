<?php
$conn = new PDO("mysql:host=localhost;dbname=jarditou", "root", "");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <!-- <a href="/index.php">Acceuil</a> -->
    <a href="/CUBE3">Acceuil</a>
    <h1>Login</h1>
    <form action="loginScreen.php" method="POST">
        <input type="text" name="username" id="usernameInput" placeholder="Username">
        <input type="password" name="password" id="userPasswordInput" placeholder="Password">
        <input type="submit" value="Connexion">
    </form>
    <p>Vous n'avez pas encore de compte ? <a href="./../signup/signupScreen.php">Inscrivez vous ici.</a></p>
</body>

</html>