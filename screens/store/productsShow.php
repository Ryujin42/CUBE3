<?php
//recuperer l'ID qui est passé dans l'URL
$id = $_GET['id'];
//etablir la connection (PDO)
$conn = new PDO("mysql:host=localhost;dbname=cube3", "root", "");
//preparation de la requete
$request = $conn->prepare("SELECT * FROM produit WHERE id_produit = ?");
//execution de la requete sur le serveur bdd
$request->execute([$id]);
//recuperation un resultat
$result = $request->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../app/css/index.css">
    <title>Detail du produit</title>
</head>

<body>
    <header>
        <h1><a href="/CUBE3">Zepplinium</a></h1>
        <nav>
            <div>
                <ul>
                    <li><a href="./../actuality/actualityScreen.php">Actualités</a></li>
                    <li><a href="./../store/productsList.php">Boutique</a></li>
                    <li><a href="./../admin/adminScreen.php">admin</a></li>
                </ul>
                <div class="auth-container">
                    <a href="./../authentication/login/loginScreen.php">Connexion</a>
                    <a href="./../authentication/signup/signupScreen.php">Inscription</a>
                </div>
            </div>
        </nav>
    </header>

    <body>
        <main>
            <div class="container">
                <div class="row">
                    <?php
                    if (is_file(__DIR__ . './../../app/assets/imgs/product/' . $result['urlPhoto'])) {
                        echo '<img src="./../../app/assets/imgs/product/' . $result['urlPhoto'] . '" alt="image produit">';
                    } ?>
                    <h1><?php echo $result['nom'] ?></h1>
                    <div><?php echo utf8_encode($result['nom']) ?></div>
                    <div>Description</div>
                    <div><?php echo utf8_encode($result['description']) ?></div>
                    <div>Prix</div>
                    <div><?php echo utf8_encode($result['prix']) ?> €</div>
                    <button><a href="./confirm.php">J'achète ce produit !</a></button>
                </div>
            </div>
        </main>
        <footer>
            <a href="#">Mention Légale</a>
        </footer>
    </body>

</html>