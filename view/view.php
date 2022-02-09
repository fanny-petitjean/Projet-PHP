<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo $pagetitle ?></title>
    <link href="images/incon.ico" rel="icon">
    <link href="css/commun.css" rel="stylesheet" type="text/css">
    <link href="css/responsiveCommun.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <div id="divLogo">
        <img alt="Logo" id="logo" src="images/logoLight.png">
    </div>
    <nav>
        <ul id="menu">
            <li><a href="index.php?action=accueil">Accueil</a></li>
            
            <li><a href="index.php?action=contact">Contact</a></li>
            <li><a href="index.php?action=equipe">Equipe</a></li>
            <li><a href="index.php?action=presse">Presse</a></li>

            <?php if(!isset($_SESSION['login'])){
                echo '<li><a href="index.php?action=seConnecter">Se Connecter</a></li>';
                echo '<li><a href="index.php?action=creerCompte">S\'inscrire</a></li>';
            }else{
                echo '<li><a href="index.php?action=seDeconnecter">Se Deconnecter</a></li>';
                echo '<li><a href="index.php?action=modificationUtilisateur">Modifier Compte</a><ul id="sousMenuNR"> ';
                if(isset($_SESSION['isAdmin'])){
                    echo '<li><a href="index.php?action=comptes">Tous les Comptes</a></li>';
                }
                echo '<li><a href="index.php?action=readAll&controller=Commande">Historique commande</a></li></ul>';
                echo '</li>';  
            }
             echo '<li><a href="index.php?action=readAll&controller=Produit">Produits</a>';
                if(isset($_SESSION['isAdmin'])){
                    echo '<ul id="sousMenuNR"><li><a href="index.php?controller=Produit&action=update">Ajouter Produit</a></li></ul>';
                }
                echo '</li>';
            ?>

            <li><a href="index.php?controller=Produit&action=panier">Panier</a></li>

        </ul>
    </nav>
    <div id="burger">
        <img alt="burger" id="imgBurger" src="images/burger.png">
        <ul id="menuBurger">
            <li><a href="index.php?action=accueil">Accueil</a></li>
            <li><a href="index.php?action=contact">Contact</a></li>
            <li><a href="index.php?action=equipe">Equipe</a></li>
            <li><a href="index.php?action=presse">Presse</a></li>
             
            <?php if(!isset($_SESSION['login'])){
                echo '<li><a href="index.php?action=seConnecter">Se Connecter</a></li>';
                echo '<li><a href="index.php?action=creerCompte">S\'inscrire</a></li>';
            }else{
                echo '<li><a href="index.php?action=seDeconnecter">Se Deconnecter</a></li>';
                echo '<li><a> Compte</a><ul id="sousMenuNR"> ';
                echo '<li><a href="index.php?action=modificationUtilisateur">Modifier Compte</a> ';
                if(isset($_SESSION['isAdmin'])){
                    echo '<li><a href="index.php?action=comptes">Tous les Comptes</a></li>';
                }
                echo '<li><a href="index.php?action=readAll&controller=Commande">Historique commande</a></li></ul>';
                echo '</li>';  
            }
             echo '<li><a>Produits</a><ul id="sousMenuNR">';
            echo '<li><a href="index.php?action=readAll&controller=Produit">Liste Produits</a>';

                if(isset($_SESSION['isAdmin'])){
                    echo '<li><a href="index.php?controller=Produit&action=update">Ajouter Produit</a></li></ul>';
                }
                echo '</li>';
            ?>
            <li><a href="index.php?controller=Produit&action=panier">Panier</a></li>
        </ul>
    </div>
</header>
<?php
if (isset($controller)) $filepath = File::build_path(array("view", $controller, "$view.php"));
else $filepath = File::build_path(array("view", "$view.php"));

require $filepath;
?>
<footer>
    <div>
        <img alt="logo" src="images/logoLight.png">
    </div>
    <div>
        <div>
            <p>
                Mail : <a href="mailto:dysprokope.technologies@gmail.com">dysprokope.technologies@gmail.com</a></p>
            <p>
                Facebook : <a href="https://www.facebook.com/">DysprokopeTechnologies</a></p>
            <p>
                Instagram : <a href="https://www.instagram.com/">@DT</a></p>
            <p>
                Twitter : <a href="https://www.twitter.com/">@DT</a>
            </p>
        </div>
        <form action="subscibeNewsletter.php" method="get">
            <fieldset>
                <legend>GARDONS LE CONTACT</legend>
                <div><label for="email">Newsletter</label></div>
                <div><input id="email" name="email" placeholder="Votre e-mail" required type="email"></div>
                <input type="submit" value="Inscprition">
            </fieldset>
        </form>
    </div>
</footer>
</body>
</html>