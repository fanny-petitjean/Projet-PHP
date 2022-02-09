<head>
    <link href="css/produit.css" rel="stylesheet" type="text/css">
</head>
<main>
    <div id="content">
        <h2><?php echo $pagetitle ?></h2>
        <article>
            <div class="divTexte">
                <p> Le produit a été <?php echo $message ?></p> 
                <p> Retourner sur le panier :<a href="index.php?controller=produit&action=panier"> Panier </a></p>
            </div>

        </article>
    </div>
</main>
