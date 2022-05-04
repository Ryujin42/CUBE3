<?php

    //etablir la connection (PDO)
    $conn = new PDO("mysql:host=localhost;dbname=cube3", "root", "");

    //test pour eviter l'execution du php en arrivant sur la page la permiere fois
    if(isset($_POST) && !empty($_POST)){

        $request = $conn->prepare("DELETE FROM produit WHERE id_produit = ?");
        $request->execute([$_POST['id_produit']]);

        header("Location:adminScreen.php");

    }else{
        //recuperer l'ID qui est passé dans l'URL
        $id = $_GET['id'];
        //Pour mamp -- $conn = new PDO("mysql:host=localhost:8889;dbname=jarditool", "root", "root");
        //preparation de la requete
        $request = $conn->prepare("SELECT * FROM produit WHERE id_produit = ?");
        //execution de la requete sur le serveur bdd
        $request->execute([$id]);
        //recuperation un resultat
        $result = $request->fetch(PDO::FETCH_ASSOC);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Etes vous sur de vouloir supprimer ce produit ?<br />
    <?php echo $result['nom']; ?>
    <form action="#" method="POST">
        <input type="hidden" name="id_produit" value="<?php echo $result['id_produit']; ?>">
        <input type="submit" name="btnValid" value="Supprimer">
    </form>
    <a href="adminScreen.php"><input type="button" name="btnCancel" value="Annuler"></a>
</body>
</html>