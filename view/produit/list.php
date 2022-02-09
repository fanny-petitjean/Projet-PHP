<head>
    <link href="css/listeProduit.css" rel="stylesheet" type="text/css">
</head>
<main>
    <h1 class="title">Nos Produits :</h1>
    <div id="content">
        <article>
        <?php
            foreach ($tab_prod as $p)
            echo '<p>' . '<a href="index.php?action=read&controller=Produit&idProd=' .rawurlencode($p->getIdProduit()) . '">' . htmlspecialchars($p->getNomProduit()) . '</a>' . '</p>';
        ?>
        </article>
    </div>
</main>
