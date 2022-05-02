<?php
if($_POST['identifiant'] !== '' && $_POST['mdp1'] !== '' && $_POST['mdp2'] !== '' && $_POST['email'] !== '')
{
    $mdp1 = $_POST['mdp1'];
    $mdp2 = $_POST['mdp2'];
    $identifiant = $_POST['identifiant'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if($mdp1 != $mdp2){
        Echo 'Mdp incorrect';
    }
    else{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');        
                } catch (PDOException $e) {
                    echo 'Échec lors de la connexion : ' . $e->getMessage();
                }
            $check = $bdd->prepare(/*"SELECT * FROM users WHERE Email = '$email'"*/);
            $check-> execute();
            $row = $data->rowcount();
            if($row == 0)
            {
                $insert = /*"INSERT INTO users(PSEUDO , Email , MDP) VALUES('$pseudo','$email','$mdp1')"*/;
                $bdd->prepare($insert)->execute();
                Echo 'Email dispo';
                header("Location: accueil.html");
            }
            else 
            {
                Echo 'Email deja use';
            }
            }
        else {
            Echo 'Email Non valide';
        }
        
    }
}

?>