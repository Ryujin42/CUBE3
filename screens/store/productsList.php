<?php
$conn = new PDO("mysql:host=localhost;dbname=cube3", "root", "");

$request = $conn->prepare("SELECT * FROM produit");

$request->execute();

$result = $request->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../app/css/index.css">
    <title>Store</title>
</head>
<body>
<header>
        <h1><a href="/CUBE3">Zepplinium</a></h1>
        <nav>
            <div>
                <ul>
                    <li><a href="./actualityScreen.php">Actualités</a></li>
                    <li><a href="./../store/productsList.php">Boutique</a></li>
                    <li><a href="./../screens/contact/contactScreen.php">Contact</a></li>
                </ul>
                <div class="auth-container">
                    <a href="./../authentication/login/loginScreen.php">Connexion</a>
                    <a href="./../authentication/signup/signupScreen.php">Inscription</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
    <div class="container">
        <table>
            <?php
            foreach ($result as $row) {
                echo '<div class="card">';
                if (is_file(__DIR__ . './../../app/assets/imgs/product/' . $row['urlPhoto'])) {
                    echo '<img src="./../../app/assets/imgs/product/' . $row['urlPhoto'] . '" alt="image produit">';
                }
                echo '<h1>' . utf8_encode($row['nom']) . '</h1>';
                echo '<p>' . utf8_encode($row['description']) . '</p>';
                echo '<button><a href="./productsShow.php?id=' . $row['id_produit'] . '">En savoir plus</a></button>'; 
                echo '</div>';
            }
            ?>
        </table>
    </main>
    <footer>
        <a href="#">Mention Légale</a>
    </footer>
</body>
</html>