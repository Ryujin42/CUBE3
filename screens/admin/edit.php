<?php

    $tabAutoryse = ['image/jpeg', 'image/png'];

    //etablir la connection (PDO)
    $conn = new PDO("mysql:host=localhost;dbname=cube3", "root", "");

    //test pour eviter l'execution du php en arrivant sur la page la permiere fois
    if(isset($_POST) && !empty($_POST)){

        if(isset($_FILES['urlPhoto'])){
            //verifier absolument le type mime du fichier et les tailles
            if($_FILES['urlPhoto']['size'] < 5000000){
                if(in_array($_FILES['urlPhoto']['type'], $tabAutoryse)){
                    $photoName = uniqid();
                    $extension = explode('.', $_FILES['urlPhoto']['name'])[1];
                    move_uploaded_file($_FILES['urlPhoto']['tmp_name'], "photos/".$photoName.".".$extension);
                    $data['urlPhoto'] = $photoName.".".$extension;
                }else{
                    echo 'le type de fichier n\'est pas autoriser';
                }
            }else{
                echo 'le fichier photo est trop gros.';
            }
        }else{
            $request = $conn->prepare("SELECT * FROM produit WHERE id_produit = ?");
            $request->execute([$_POST['id_produit']]);
            $result = $request->fetch(PDO::FETCH_ASSOC);

            $data['urlPhoto'] = $result['urlPhoto'];
        }

        $request = $conn->prepare("UPDATE produit SET nom = ?, description = ?, urlPhoto = ? WHERE id_produit = ?");

        $request->execute([$_POST['nom'], $_POST['description'], $data['urlPhoto'], $_POST['id_produit']]);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_produit" value="<?php echo $result['id_produit'] ?>"> 
                    <div class="col-4">Nom du produit</div>
                    <div class="col-8">
                        <input type="text" name="nom" value="<?php echo $result['nom'] ?>">
                    </div>
                    <div class="col-4">Description du produit</div>
                    <div class="col-8">
                        <textarea name="description"><?php echo $result['description'] ?></textarea>
                    </div>
                    <div class="col-4">Prix du produit</div>
                    <div class="col-8">
                        <input type="text" name="prix" value="<?php echo $result['prix'] ?>">
                    </div>
                    <br />
                    <?php if(is_file(__DIR__.'/photos/'.$result['urlPhoto'])){ ?>
                        <img style="width:150px;border:1px solid #ccc;" src="photos/<?php echo $result['urlPhoto']; ?>">
                        <a href="deletepicture.php?id=<?php echo $result['id_produit'] ?>">
                            <span class="fa fa-trash"></span>
                        </a>
                    <?php }else{ ?>
                        <input type="file" name="urlPhoto" accept=".jpg,.png">
                    <?php } ?>
                    <br />
                    <input type="submit" value="Modifier le produit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>