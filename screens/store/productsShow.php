<?php

//recuperer l'ID qui est passé dans l'URL
$id = $_GET['id'];
//etablir la connection (PDO)
$conn = new PDO("mysql:host=localhost;dbname=cube3", "root", "");
//Pour mamp -- $conn = new PDO("mysql:host=localhost:8889;dbname=jarditool", "root", "root");
//preparation de la requete
$request = $conn->prepare("SELECT * FROM produit WHERE id_produit = ?");
//execution de la requete sur le serveur bdd
$request->execute([$id]);
//recuperation un resultat
$result = $request->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail produit</title>
    <link rel="stylesheet" href="css/detail.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            if (is_file(__DIR__ . './../../app/assets/imgs/product/' . $result['urlPhoto'])) {
                echo '<img src="./../../app/assets/imgs/product/' . $result['urlPhoto'] . '" alt="image produit">';
            } ?>
            <h1><?php echo $result['nom']?></h1>
            <div class="col-6"><?php echo utf8_encode($result['nom']) ?></div>
            <div class="col-6">Description</div>
            <div class="col-6"><?php echo utf8_encode($result['description']) ?></div>
            <div class="col-6">Prix</div>
            <div class="col-6"><?php echo utf8_encode($result['prix']) ?> €</div>
        </div>
    </div>
</body>

</html>