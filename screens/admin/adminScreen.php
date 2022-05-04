<?php
    //etablir la connection (PDO)
    $conn = new PDO("mysql:host=localhost;dbname=cube3", "root", "");
    //Pour mamp -- $conn = new PDO("mysql:host=localhost:8889;dbname=jarditool", "root", "root");

    //requete preparer
    $request = $conn->prepare("SELECT * FROM produit");
    //execution de la requete sur le serveur bdd
    $request->execute();
    //recuperation des resultats
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/css/index.css">
    <title>CUBE</title>
</head>

<body>
    <header>
        <h1><a href="/CUBE3">Admin</a></h1>
        <nav>
            <div>
                <ul>
                    <li><a href="./screens/actuality/actualityScreen.php">Actualités</a></li>
                    <li><a href="./screens/store/productsList.php">Boutique</a></li>
                    <li><a href="./screens/admin/adminScreen.php">admin</a></li>
                </ul>
                <div class="auth-container">
                    <a href="./screens/authentication/login/loginScreen.php">Connexion</a>
                    <a href="./screens/authentication/signup/signupScreen.php">Inscription</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
    <div class="container">
        <div class="row">
            <a href="add.php">Ajouter un nouvel article</a>
            <table class="table table-bordered">
                <?php
                    foreach($result as $row){
                        echo '<tr>';
                        echo '<td>';
                        if(is_file(__DIR__.'./../../app/assets/imgs/product/' . $row['urlPhoto'])){
                            echo '<img style="width:150px;" src="./../../app/assets/imgs/product/'.$row['urlPhoto'].'">';
                        }
                        echo '</td>';
                        echo '<td><a href="detail.php?id='.$row['nom'].'">'.utf8_encode($row['nom']).'</a></td>';
                        echo '<td>'.utf8_encode($row['description']). '</td>';
                        echo '<td>';
                        echo '  <a href="edit.php?id='.$row['id_produit'].'">Modifier</a>';
                        echo '  <a href="delete.php?id='.$row['id_produit'].'">Supprimer</span></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>
    </main>

    <footer>
        <a href="./screens/actuality/actualityScreen.php">Mention Légale</a>
    </footer>
</body>
</html>