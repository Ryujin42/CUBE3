<?php
if($_POST['carteid'] !== '' && $_POST['dateperm'] !== '' && $_POST['name'] !== '' && $_POST['cryptogramme'] !== '')
{
    $carteid = $_POST['carteid'];
    $dateperm = $_POST['dateperm'];
    $name = $_POST['name'];
    $cryptogramme = $_POST['cryptogramme'];

    if(strlen(string $carteid) != 16){
        Echo 'Carte Invalade';
    }
    else{
        if(strlen(string $cryptogramme === 3) {
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');        
                } catch (PDOException $e) {
                    echo 'Échec lors de la connexion : ' . $e->getMessage();
                }
            $insert = [FAIRE L INSERT];
            $bdd->prepare($insert)->execute();
            Echo 'Carte Valide';
            else 
            {
                Echo 'Cryptogramme Invalide';
            }
            }
        else {
            Echo 'Email Non valide';
        }
        
    }
}

?>