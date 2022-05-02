<?php
if($_POST['code'] !== '' && $_POST['ville'] !== '' && $_POST['name'] !== '' && $_POST['firstname'] !== '' && $_POST['birthdate'] !== '' && $_POST['country'] !== '' && $_POST['adresse1'] !== '')
{
    
        $code = $_POST['code'];
        $ville = $_POST['ville'];
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $birthdate = $_POST['birthdate'];
        $country = $_POST['country'];
        $adresse1 = $_POST['adresse1'];
        $adresse2 = $_POST['adresse2'];
        $phone = $_POST['phone'];


    
    $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');        
    $Update = "UPDATE Utilisateur SET nom = '$name', prenom = '$firstname', date_de_naissance = '$birthdate'";
    $bdd->prepare($Update)->execute();
    $insert = "INSERT INTO Adresse([id_pays],[ligne1],[ligne2],[ville],[code_postal])SELECT [id_pays],[ligne1]='$adresse1',[ligne2]='$adresse2',[ville]='$ville',[code_postal] ='$code' FROM Pays WHERE Pays = '$country'";
    $bdd->prepare($insert)->execute();
    header("Location: payement.html");
    
    }else {
    Echo 'Champ Vide';
    }
        
    
?>