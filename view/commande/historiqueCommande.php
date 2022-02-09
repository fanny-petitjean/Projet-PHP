<head>
    <link href="css/listeProduit.css" rel="stylesheet" type="text/css">
</head>
<main>
    <h1 class="title">Vos anciennes commandes :</h1>
    <div id="content">
        <article class="total">
        <?php
        if($commandes!=false){

            foreach ($commandes as $c){
                echo '<h3> Commande</h3><div class="alignement"><p> Destinataire :'.htmlspecialchars($c->getNomDestinataire()).'</p><p> Adresse : '.htmlspecialchars($c->getAdresseDestinataire()).'</p><p> Prix total : '.htmlspecialchars($c->getPrixTotal()).'</p>';
                echo '<p>' . '<a href="index.php?action=read&controller=Commande&idCommande=' .rawurlencode($c->getIdCommande()) . '"> Cliquez pour plus d\'informations sur les produits de la commande </a>' . '</p></div>';
             }
        }else{
            echo '<p> Vous n\'avez encore jamais passé de commandes </p>';
        }
        ?>
        </article>
    </div>
</main>
