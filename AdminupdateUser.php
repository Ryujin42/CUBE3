<?php 
  function getUserById($id){
      $db = new PDO('mysql:host=localhost;dbname=html','root','root');
      $sql = "SELECT * FROM users where id= '$id'";
      $query = $db->prepare($sql);
      $query->execute();
      $result=$query->fetch(PDO::FETCH_ASSOC);
      
  return $result;
  }
  $user = getUserById($_POST['id']);
?>

<form class="" action="./AdminControllerupdateUser.php" method="post">
  <div>
    <span>Nom : </span>
    <input type="text" name="lastname" value="<?php echo $user["nom"] ?>" class="" id="nom" placeholder="Entrez votre nom">
  </div>
  <div>
    <span>Prénom : </span>
    <input type="text" name="firstname" value="<?php echo $user["prenom"] ?>" class="" id="prenom" placeholder="Entrez votre prénom">
  </div>
  <div>
    <span>Identifiant : </span>
    <input type="text" name="identifiant" value="<?php echo $user["identifiant"] ?>" class="" id="identifiant" placeholder="Entrez votre identifiant">
  </div>
  <div>
    <span>Mot de passe: </span>
    <input type="password" name="password" value="<?php echo $user["mdp"] ?>" class="" id="mdp" placeholder="Entrez un mot de passe">
  </div>
  <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
  <div class="formButton">
      <button type="submit">Envoyer</button>
  </div>
</form>
