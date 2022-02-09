<head>
    <link href="css/produit.css" rel="stylesheet" type="text/css">
</head>
<main>


    <h1 class="title">Panier</h1>

   
    <div id="content">
            <article>Le Panier que vous avez se compose des produits :





        <?php
        if(!isset($_SESSION['panier'])){
            echo "aucun produit dans le panier";
        } else {
            echo '<div class="divTexte"> ';
            foreach ($produits as $p) {
                if (isset($_SESSION['panier'][$p->getIdProduit()])) {
                    echo "<div><p>".$p->getNomProduit() . " * " . $_SESSION['panier'][$p->getIdProduit()]."</p>";
                    echo '<a href="index.php?controller=produit&action=supprimerProduit&idProd='.$p->getIdProduit() . '"> Enlever un  produit </a>';
                    echo '<a href="index.php?controller=produit&action=ajouterProduit&idProd='.$p->getIdProduit() . '"> Ajouter un  produit </a></div>';
                }
            }
            echo " = ".$value;
        }

        if($value>0){

        ?>
        <form id="formulaire" method="post" action="index.php">
         <p>
                <input type="submit" value="Commander"/>
                <input type='hidden' name='controller' value='Commande'>
                <input type='hidden' name='action' value='commande'>
                <input type='hidden' name='total' value="<?php echo $value?>">
            </p>
    </form>
    <?php } ?>
    </article>

</div>
</main>