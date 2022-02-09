
<head>
    <link href="css/produit.css" rel="stylesheet" type="text/css">
</head>
<main>
    <h1 class="title">Notre produit</h1>
    <div id="content">
        <h2>Notre bracelet :</h2>
        <article>
            <div class="divTexte">
                <p>Notre bracelet PL14, esthétique et fiable est une prouesse technologique qui vous apportera une tranquillité
                    d'esprit.</p>
                <p>Elle est le résultat de deux années de recherches poussées et intensives qui ont abouti à un produit
                    d'une finition parfaite.</p>
                <p>De nombreux tests ont été réalisés garantissant une sûreté maximale et une stabilité du système
                    optimale</p>
            </div>
            <div>
                <img alt="app" id="imgApp" src="images/bracelet.png">
            </div>
        </article>
        <h2>Fonctionnalités proposées :</h2>
        <article>

            <div class="divTexte space">
                <p>Notre bracelet vous propose le partage de location avec tous les appareils de votre choix, et de la partager avec vos proches qui eux peuvent aussi la partager avec vous.</p>
                <p>A partir de notre application vous pouvez :
                    :</p>
                <ul>
                    <li>Contacter les secours immédiatement en cas de problème, que cela vous concerne ou les personnes qui paratagent leur localisation avec vous.</li>
                    <li>Avoir accès au pourcentage de batterie des personnes partagées</li>
                    <li>Utiliser la messagerie de l'application</li>
                </ul>
            </div>
        </article>
        <article>
        <p>
        <h2>Prix : 400 €</h2>
        </p>
            <div>
                <img alt="trade" class="space" id="imgTrade" src="images/trade.png">
            </div>
            <a class="btn btn-primary" href="index.php?controller=produit&action=ajouterProduit&idProd=4" role="button">Ajouter au panier</a>
             <?php if(isset($_SESSION['login'])){
                    echo '<a class="btn btn-primary" href="index.php?controller=produit&action=delete&idProd=4" role="button">Supprimer le Produit</a>';
                    echo '<a class="btn btn-primary" href="index.php?controller=produit&action=update&idProd=4" role="button">Modifier le Produit</a>';
            }
            ?>
        </article>
    </div>
</main>
