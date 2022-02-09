
<head>
    <link href="css/produit.css" rel="stylesheet" type="text/css">
</head>
<main>
    <h1 class="title">Notre produit</h1>
    <div id="content">
        <h2>Notre puce :</h2>
        <article>
            <div class="divTexte">
                <p>Notre puce DT-14, sûre, fiable est une prouesse technologique qui vous apportera une tranquillité
                    d'esprit.</p>
                <p>Elle est le résultat de deux années de recherches poussées et intensives qui ont abouti à un produit
                    d'une finition parfaite.</p>
                <p>De nombreux tests ont été réalisés garantissant une sûreté maximale et une stabilité du système
                    optimale</p>
                <p>L'installation de notre puce se réalise en seulement 30 secondes</p>
            </div>
            <div>
                <img alt="puce" class="space" id="imgChip" src="images/chip.png">
            </div>
        </article>
        <h2>Fonctionnalités proposées :</h2>
        <article>
            <div>
                <img alt="app" id="imgApp" src="images/app.png">
            </div>
            <div class="divTexte space">
                <p>Notre puce propose de nombreuses fonctionnalités qui permettent la sécurité de votre enfant et qui
                    vous apportent sérénité.</p>
                <p>A partir de notre application vous pouvez controller les constantes vitales de votre enfant tel que
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
            <h2>Prix : 20000 €</h2>
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
