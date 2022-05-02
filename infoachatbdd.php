<?php
if($_POST['name'] !== '' && $_POST['firstname'] !== '' && $_POST['birthdate'] !== '' && $_POST['country'] !== '' && $_POST['adresse1'] !== '')
{
    {
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $birthdate = $_POST['birthdate'];
        $country = $_POST['country'];
        $adresse1 = $_POST['adresse1'];
        $adresse2 = $_POST['adresse2'];
        $phone = $_POST['phone'];


    try{
        $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');        
    } catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
    $insert = /*"INSERT INTO users(PSEUDO , Email , MDP) VALUES('$pseudo','$email','$mdp1')"*/;
    $bdd->prepare($insert)->execute();
    header("Location: payement.html");
    
    else {
    Echo 'Champ Vide';
        }
        
    }
}

?>