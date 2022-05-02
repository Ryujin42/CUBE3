<?php
if($_POST['name'] !== '' && $_POST['firstname'] !== '' && $_POST['birthdate'] !== '' && $_POST['country'] !== '' && $_POST['adresse1'] !== '' && $_POST['adresse2'] !== '' && $_POST['phone'] !== '')
{
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $country = $_POST['country'];
    $adresse1 = $_POST['adresse1'];
    $adresse2 = $_POST['adresse2'];
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
            /*$check = $bdd->prepare("SELECT * FROM users WHERE Email = '$email'");
            $check-> execute();
            $row = $data->rowcount();
            if($row == 0)
            {
                $insert = "INSERT INTO users(PSEUDO , Email , MDP) VALUES('$pseudo','$email','$mdp1')";
                $bdd->prepare($insert)->execute();
                Echo 'Email dispo';
            }
            else 
            {
                Echo 'Email deja use';
            }*/
            }
        else {
            Echo 'Email Non valide';
        }
        
    }
}

?>