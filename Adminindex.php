<?php

  function getUsers(){
    $db = new PDO('mysql:host=localhost;dbname=html','root','root');
    $sql = "SELECT * FROM Utilisateur ";
    $query = $db->prepare($sql);
    $query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

	$users = getUsers();
?>

<!doctype html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Administration</title>
    <link rel="stylesheet" href="./styles/style.css">
  </head>
    <body>
      <nav>
          <ul class="gauche">
          <li><a href="./accueil.html">Accueil</a></li>
              <li><a href="#">Actualités</a></li>
              <li><a href="./forum.html">Forum</a></li>
              <li><a href="./magasin.html">Boutique</a></li>
          </ul>
          <ul class="droite">
              <li><a href="./login.html">Se connecter</a></li>
              <li><a href="./signup.html">S'inscrire</a></li>
          </ul>
      </nav>
      <div class="exemple">
          <h1 class="title">Liste des utilisisateurs</h1>
          <ul style="width:80%;">
            <?php 
              foreach($users as $user):
                extract($user);
            ?>
                  <li id="<?php echo $id ?>" style="width:100%; display: flex; justify-content: space-around;">
                    <span><?php echo $nom ?></span>
                    <span><?php echo $prenom ?></span>
                    <span><?php echo $identifiant ?></span>
                    <form method="POST" action="./AdminupdateUser.php" style="width:250px;">
                        <button type="submit" name="id" value="<?php echo $id ?>">Modifier</button>
                    </form>
                    <form method="POST" action="./AdminControllerdeleteUser.php" style="width:250px;">
                        <button type="submit" name="id" value="<?php echo $id ?>">Supprimer</button>
                    </form>
                  </li>
            <?php endforeach; ?>
        </ul>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>