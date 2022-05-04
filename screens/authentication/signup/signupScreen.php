<?php
$bdd = new PDO('mysql:host=localhost;dbname=cube3','root','');

if(isset($_POST)  && !empty($_POST))
{
    $password = $_POST['password'];
    $username = $_POST['username'];
    $email = $_POST['mail'];
    $phone = $_POST['tel'];


    $request = $bdd->prepare(
      "insert into utilisateur (pseudo, mdp, telephone, mail, isAdmin)
      values ('$username', '$password', '$phone', '$email', false);"
  );

    $request->execute();

  header("Location:signupScreen.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../../app/css/index.css">
    <title>Sign Up</title>
</head>
<body>
    <a href="/CUBE3">Acceuil</a>
    <h1>Sign Up</h1>
    <form action="#" method="POST">
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