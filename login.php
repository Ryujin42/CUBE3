<?php
  function checkAutent(){
    if ($_POST['identifant'] !== '' && $_POST['password'] !== ''){
  
      $identifant = $_POST['identifant'];
      $password = $_POST['password'];
  
      $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');        
      $query = "SELECT * FROM Utilisateur WHERE pseudo='$identifiant' and password='$password'";
      $result = $bdd->prepare($sql);
      $query->execute();
      $result=$query->fetch(PDO::FETCH_ASSOC);
      if($result){
        header('Location: ./accueil.html');
      }
      else {
        header('Location: ../connexion.php?error=ids');
      }
    }
checkAutent();
?>