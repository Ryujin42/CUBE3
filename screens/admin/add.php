<?php

    $tabAutoryse = ['image/jpeg', 'image/png'];

    //etablir la connection (PDO)
    $conn = new PDO("mysql:host=localhost;dbname=CUBE3", "root", "");
    //Pour mamp -- $conn = new PDO("mysql:host=localhost:8889;dbname=jarditool", "root", "root");

    //test pour eviter l'execution du php en arrivant sur la page la permiere fois
    if(isset($_POST) && !empty($_POST)){

        $data = $_POST;

        if(isset($_FILES['urlPhoto'])){
            //verifier absolument le type mime du fichier et les tailles
            if($_FILES['urlPhoto']['size'] < 5000000){
                if(in_array($_FILES['urlPhoto']['type'], $tabAutoryse)){
                    $photoName = uniqid();
                    $extension = explode('.', $_FILES['urlPhoto']['name'])[1];
                    move_uploaded_file($_FILES['urlPhoto']['tmp_name'], "./../../app/assets/imgs/product/".$photoName.".".$extension);
                    $data['urlPhoto'] = $photoName.".".$extension;
                }else{
                    echo 'le type de fichier n\'est pas autoriser';
                }
            }else{
                echo 'le fichier photo est trop gros.';
            }
        }

        //preparation d'une requete d'insertion
        $request = $conn->prepare(
            "INSERT INTO produit (nom, description, urlPhoto, prix)
            VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)"
        );
        //execution de la requete en lui passant les parametres en provenance du formulaire
        $request->execute([

            $data['nom'],
            $data['description'],
            $data['urlPhoto'],
            $data['prix']
        ]);
        
        //redirection de l'utilisateur
        header("Location:adminScreen.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" method="POST" enctype="multipart/form-data">   
                    <div class="col-4">Nom du produit</div>
                    <div class="col-8">
                        <input type="text" name="nom">
                    </div>
                    <div class="col-4">Description du produit</div>
                    <div class="col-8">
                        <textarea name="description"></textarea>
                    </div>
                    <div class="col-4">Prix du produit</div>
                    <div class="col-8">
                        <input type="text" name="prix">
                    </div>
                    <div class="col-4">Photo du produit</div>
                    <div class="col-8">
                        <input type="file" name="urlPhoto" accept=".jpg,.png">
                    </div>
                    <input type="submit" value="Ajouter le produit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>