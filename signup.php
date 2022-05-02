<?php
function usercreate(){
if($_POST['identifiant'] !== '' && $_POST['mdp1'] !== '' && $_POST['mdp2'] !== '' && $_POST['email'] !== '')
{
    $mdp1 = $_POST['mdp1'];
    $mdp2 = $_POST['mdp2'];
    $identifiant = $_POST['identifiant'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');        
    
    $checkEmailRequest = "SELECT * FROM `Utilisateur` WHERE identifiant = '$identifiant'";
      
    $checkEmailQuery = $bdd->prepare($checkEmailRequest);
    
    $checkEmailQuery->execute();
    
    $result=$checkEmailQuery->fetch(PDO::FETCH_ASSOC);
    
    if($result){
      ;
    }else{
    
      $sql = "INSERT INTO `Utilisateur` (pseudo, pwd, mail, Telephone) VALUES ('$identifiant', '$mdp1', '$email', '$phone')";
      $query = $bdd->prepare($sql);
      $result = $query->execute();
      if($result){
        header('Location: ./accueil.html');
      }else{
        ;
      }
    }
  }else{
    ;
  }
}