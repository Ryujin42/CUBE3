<?php
function usercreate(){
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
            $check = $bdd->prepare("SELECT * FROM Utilisateur WHERE mail = '$email'");
            $check-> execute();
            $row = $data->rowcount();
            if($row == 0)
            {
                $insert = "INSERT INTO Utilisateur(pseudo , mail , mdp, phone) VALUES('$identifiant','$mail','$mdp1','$phone')";
                $bdd->prepare($insert)->execute();
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
}
usercreate();
?>