
<head>
    <link href="css/produit.css" rel="stylesheet" type="text/css">
</head>
<main>
    <h1 class="title">Notre produit</h1>
    <div id="content">
        <h2>Notre Montre :</h2>
        <article>
            <div class="divTexte">
                <p>Notre montre est exceptionnelle d'une prouesse technologique qui vous apportera une tranquillité
                    d'esprit.</p>
                <p>De nombreux tests ont été réalisés garantissant une sûreté maximale et une stabilité du système
                    optimale</p>
                <p>L'installation de notre bague se réalise très rapidement, vous n'êtes pas obligé de la garder en permanence même si c'est préférable</p>
                <p> Cette bague est ultra résistante, au feu, à l'eau, aux chocs.</p>
            </div>

        </article>
        <h2>Fonctionnalités proposées :</h2>
        <article>
            <div>
                <img alt="app" id="imgApp" src="images/app.png">
            </div>
            <div class="divTexte space">
                <p>Notre bague propose de nombreuses fonctionnalités qui permettent la sécurité et qui
                    vous apportent sérénité.</p>
                <p>A partir de notre application vous pouvez controller les constantes vitales tel que
                    :</p>
                <ul>
                    <li>Sa température corporel</li>
                    <li>Son rythme cardiaque</li>
                    <li>Sa pression sanguine</li>
                    <li>Son taux d'hydratation</li>
                </ul>
                <p>Vous pouvez également accéder a la position GPS de votre enfant ainsi qu'à son flux optique.</p>
            </div>
        </article>
        <h2>Achat :</h2>
        <article>
            <p>
            <h2>Prix : 260 €</h2>
            </p>
            <div>
                <img alt="trade" class="space" id="imgTrade" src="images/trade.png">
            </div>
                <a class="btn btn-primary" href="index.php?controller=produit&action=ajouterProduit&idProd=1" role="button">Ajouter au panier</a>
            <?php if(isset($_SESSION['login'])){
                echo '<a class="btn btn-primary" href="index.php?controller=produit&action=delete&idProd=1" role="button">Supprimer le Produit</a>';
                echo '<a class="btn btn-primary" href="index.php?controller=produit&action=update&idProd=1" role="button">Modifier le Produit</a>';
            }
            ?>
        </article>
    </div>
</main>
