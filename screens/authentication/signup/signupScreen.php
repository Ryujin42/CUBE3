<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <!-- <a href="/index.php">Acceuil</a> -->
    <a href="/CUBE3">Acceuil</a>
    <h1>Sign Up</h1>
    <form action="loginScreen.php" method="POST">
        <input type="text" name="username" id="usernameInput" placeholder="Username">
        <input type="mail" name="mail" id="mailInput" placeholder="Mail">
        <input type="tel" name="tel" id="telInput" placeholder="Telephone">
        <input type="password" name="password" id="userPasswordInput" placeholder="Password">
        <input type="password" name="confirmPassword" id="userConfirmPasswordInput" placeholder="Confirm Password">
        <input type="submit" value="Inscription">        
    </form>
    <p>Vous avez déjà un compte ? <a href="./../login/loginScreen.php">Connectez vous ici</a></p>
</body>
</html>