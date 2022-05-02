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
    <form class="" action="payementbankinfo.php" method="post">
        <div>
            Information Banquaire
        </div>
        <HR>
        <div>
            Moyen de payement
        </div>
        <div>
            <select>
                <option> Carte Blue </option>
                <option> Paypal </option>
                <option> Carte Visa </option>
                <option> Carte prépayer </option>
            </select>
        </div>
        <ul>
            <li>Numéro</li>
            <li>Date de péremption</li>
        </ul>
        <ul>
            <li><input class="" type="Number"  name="carteid" placeholder="XXXX-XXXX-XXXX-XXXX"></li>
            <li><input class="" type="Number"  name="dateperm" placeholder="XX/XX"></li>
        </ul>
        <ul>
            <li>Nom du propiétaire</li>
            <li>Cryptogramme</li>
        </ul>
        <ul>
            <li><input class="" type="text"  name="name" placeholder="Nom du propiétaire"></li>
            <li><input class="" type="Number"  name="cryptogramme" placeholder="XXX"></li>
        </ul>
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