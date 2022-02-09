<head>
    <link href="css/listeProduit.css" rel="stylesheet" type="text/css">
</head>
<main>
    <h1 class="title">Vos anciennes commandes :</h1>
    <div id="content">
        <article class="total">
        <?php
   

            foreach ($produit as $p){
                if(isset($quantiteProd[$p->getIdProduit()])){
                    echo '<h3> '.htmlspecialchars($p->getNomProduit()).'</h3>';
                    echo '<div class="alignement">';
                    echo '<p> Categorie :'.htmlspecialchars($p->getCategorieProduit()).'</p>';
                    echo '<p> Prix : '.htmlspecialchars($p->getPrixProduit()).'</p>';
                    echo '<p> Quantite: '.htmlspecialchars($quantiteProd[$p->getIdProduit()]).'</p>';
                }

               
             }

        ?>
        </article>
    </div>
</main>
