<?php
  function checkAutent(){
    if($_POST['identifant'] !== '' && $_POST['password'] !== ''){

      $user = $_POST['identifant'];
      $password = $_POST['password'];
      
      $db = new PDO('mysql:host=localhost;dbname=html','root','root');
      
      $sql = "SELECT * FROM `Utilisateur` WHERE identifiant = '$user' AND mdp = '$password'";
      
      $query = $db->prepare($sql);
      $query->execute();
      
      $result=$query->fetch(PDO::FETCH_ASSOC);
      
      if($result){
        header('Location: ./accueil.html');
      }
      else {
      }
    }
    else{
    }
  }
  checkAutent();
?>