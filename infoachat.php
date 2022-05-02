<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Nom du Site</title>
</head>

<body>
    <header>
        <h1>les G@m3rz</h1>
    </header>
    
    <nav>
        <ul class="gauche">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Actualités</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="#">Boutique</a></li>
        </ul>
        <ul class="droite">
            <li><a href="#">Se connecter</a></li>
            <li><a href="#">S'inscrire</a></li>
        </ul>
    </nav>
    <form class="" action="infoachatbdd.php" method="post">
        <div>
            Information Personnel
        </div>
        <HR>
        <div>    
            <ul>
                <li>Nom</li>
                <li>Prénom</li>
            </ul>
        </div>
        <div>
            <ul>
                <li><input class="" type="text"  name="name" placeholder="Nom"></li>
                <li><input class="" type="text"  name="firstname" placeholder="Prénom"></li>
            </ul>
        </div>    
        <div>    
            <ul>
                <li>Date de Naissance</li>
                <li>Pays</li>
            </ul>
        </div>
        <div>
            <ul>
                <li><input class="" type="number"  name="birthdate" placeholder="XX/XX/XXXX"></li>
                <li><select  name="country" placeholder="Pays">
                    <Option>
                        <?php
                        $bdd = new PDO('mysql:host=localhost;dbname=cour','root','');        
                        } catch (PDOException $e) {
                        echo 'Échec lors de la connexion : ' . $e->getMessage();
                        
                        $reponse = $bdd->query([SELECT]);
                        while ($donnees = $reponse->fetch())
                        {
                            echo '<option>' .$donnees[] '</option>'
                        }
                        
                        ?>
                    </option>
                </select></li>
            </ul>
        </div>
        <div>    
            <ul>
                <li>Adresse</li>
            </ul>
        </div>
        <div>
            <ul>
                <li><input class="" type="text"  name="adresse1" placeholder="Adresse"></li>
            </ul>
        </div>
        <div>
            <ul>
                <li>Numéro</li>
                <li>Date de péremption</li>
            </ul>
        </div>
        <div>
            <ul>
                <li><input class="" type="text"  name="adresse2" placeholder="Adresse"></li>
                <li><input class="" type="number"  name="phone" placeholder="Téléphone"></li>
            </ul>
        </div>
        <div>
            <button class="" type="submit">
                Confirmer
            </button>
        </div>
    </form>
    <footer>
        <ul class="footer">
            <li><a href="#">Mentions légales</a></li>
            <li><a href="#">Nous contacter</a></li>
            <li><a href="#">À propos</a></li>
        </ul>
    </footer>
</body>
</html>