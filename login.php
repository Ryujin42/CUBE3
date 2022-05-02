<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');        
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }

if (isset($_POST['identifant'])){
  
  $identifant = stripslashes($_REQUEST['identifant']);
  $identifant = mysqli_real_escape_string($conn, $identifant);
  $mdp = stripslashes($_REQUEST['mdp']);
  $mdp = mysqli_real_escape_string($conn, $mdp);
  $query = /*"SELECT * FROM users WHERE username='$username' and password='".hash('sha256', $password)."'"*/;
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['identifant'] = $identifant;
      header("Location: accueil.html");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>