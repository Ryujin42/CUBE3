<?php

    //recuperer l'ID qui est passé dans l'URL
    $id = $_GET['id'];
        
    $conn = new PDO("mysql:host=localhost;dbname=cube3", "root", "");
    //Pour mamp -- $conn = new PDO("mysql:host=localhost:8889;dbname=jarditool", "root", "root");
    //preparation de la requete
    $request = $conn->prepare("SELECT * FROM produit WHERE id_produit = ?");
    //execution de la requete sur le serveur bdd
    $request->execute([$id]);
    //recuperation un resultat
    $result = $request->fetch(PDO::FETCH_ASSOC);

    unlink(__DIR__.'./../../app/assets/imgs/product/'.$result['urlphoto']);

    header("Location:edit.php?id=".$id);

?>