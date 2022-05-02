<?php
function createinfobank(){
if($_POST['carteid'] !== '' && $_POST['dateperm'] !== '' && $_POST['name'] !== '' && $_POST['cryptogramme'] !== '')
{
    $carteid = $_POST['carteid'];
    $dateperm = $_POST['dateperm'];
    $name = $_POST['name'];
    $cryptogramme = $_POST['cryptogramme'];

    if(strlen($carteid) !== 16){
        Echo 'Carte Invalade';
    }
    else{if(strlen($cryptogramme) !== 3)
    {
        Echo'Crypto Invalide';
    }else{
        $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');
        $insert = "INSERT INTO Carte([numero],[date_carte],[cryptogramme])VALUES('$carteid','$dateperm','$name','$cryptogramme')";
        $bdd->prepare($insert)->execute();
        'Location: ../index.php';
            }
        }
    }
}

createinfobank();
?>