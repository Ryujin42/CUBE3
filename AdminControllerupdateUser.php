<?php
  function updateUser(){
    var_dump($_POST);
    if($_POST['prenom'] !== '' && $_POST['nom'] !== ''&& $_POST['identifiant'] !== '' && $_POST['mdp'] !== ''){
      $identifiant = $_POST['identifiant'];
      $mdp = $_POST['mdp'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $id = intval($_POST["id"]);
      $db = new PDO('mysql:host=localhost;dbname=html','root','root');
      $sql = "UPDATE Utilisateur
      SET nom = :nom,
          prenom = :prenom,
          identifiant = :identifiant,
          mdp = :mdp
      WHERE id = :id";
      $valeur = array(
          'nom' => $nom,
          'prenom' => $prenom,
          'identifiant' => $identifiant,
          'mdp' => $mdp,
          'id' => $id
      );
      $query = $db->prepare($sql);
      $result = $query->execute($valeur);
      if($result){
        header('Location: ./Adminindex.php');
      }else{
        header('Location: ./AdminupdateUser.php?error=update&id='.$_POST["id"]);
      }
    }else{
      header('Location: ./AdminupdateUser.php?error=form&id='.$_POST["id"]);
    }
  }
  updateUser();
?>