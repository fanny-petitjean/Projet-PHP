
<head>
    <link href="css/produit.css" rel="stylesheet" type="text/css">
</head>
<main>
    <h1 class="title">Notre produit</h1>
    <div id="content">
        <h2>Nos lunettes :</h2>
        <article>
            <div class="divTexte">
                <p>Notre paire de lunettes RA-14 est une prouesse technologique qui vous apporta une experience du monde sous un différent angle.</p>
                <p>Elles sont le résultat de deux années de recherches poussées et intensives qui ont abouti à un produit
                    d'une finition parfaite.</p>
                <p>De nombreux tests ont été réalisés garantissant une sûreté maximale et une stabilité du système
                    optimale</p>
            </div>
            <div>
                <img alt="app" id="imgApp" src="images/lunettes.jpg">
            </div>
        </article>
        <h2>Fonctionnalités proposées :</h2>
        <article>
            <div class="divTexte space">
                <p>Nos lunettes proposent de nombreuses fonctionnalité.</p>
                <p>
                    Il s'agit de lunettes de réalité augmentée, vous permettant de visualiser des éléments virtuels dans la vie réelle.
                </p>
                <ul>
                    <li>Vous pouvez animer des réunions depuis chez vous, comme si les distances n'étaient plus.</li>
                    <li>Jouer à des jeux intéractifs designés explicitement pour les Lunettes RA14, développés par notre partenaire.</li>
                    <li>Vous pouvez naviguer sur le world wide web et consommer le contenu qui vous intéresse.</li>
                    <li>Les lunettes vous permettent également de faire tous types de transactions.</li>
                </ul>
            </div>
        </article>

        <div>
            <p>
            <h2>Prix : 2000 €</h2>
            </p>
        </div>
        <article>

            <div>
                <img alt="trade" class="space" id="imgTrade" src="images/trade.png">
            </div>
            <a class="btn btn-primary" href="index.php?controller=produit&action=ajouterProduit&idProd=3" role="button">Ajouter au panier</a>
             <?php if(isset($_SESSION['login'])){
                    echo '<a class="btn btn-primary" href="index.php?controller=produit&action=delete&idProd=3" role="button">Supprimer le Produit</a>';
                    echo '<a class="btn btn-primary" href="index.php?controller=produit&action=update&idProd=3" role="button">Modifier le Produit</a>';
                }
                ?>
        </article>
    </div>
</main>
