<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../app/css/index.css">
    <title>CUBE</title>
</head>

<body>
    <header>
        <h1><a href="/CUBE3">Zepplinium</a></h1>
        <nav>
            <div>
                <ul>
                    <li><a href="./../actuality/actualityScreen.php">Actualités</a></li>
                    <li><a href="./../store/productsList.php">Boutique</a></li>
                    <li><a href="./../contact/contactScreen.php">Contact</a></li>
                </ul>
                <div class="auth-container">
                    <a href="./screens/authentication/login/loginScreen.php">Connexion</a>
                    <a href="./screens/authentication/signup/signupScreen.php">Inscription</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <h1>Nous Contacter</h1>
        <form action="contactScreen.php" method="POST">
            <input type="text" name="username" id="usernameInput" placeholder="Username">
            <input type="text" name="subject" id="subjectInput" placeholder="Sujet">
            <input type="text" name="message" id="messageInput" placeholder="Message">
            <input type="submit" value="Connexion" id="adminSubmit">
        </form>
    </main>

    <footer>
        <a href="./../actuality/actualityScreen.php">Mention Légale</a>
    </footer>
</body>
</html>