<head>
    <link href="css/compte.css" rel="stylesheet" type="text/css">
</head>
<main>
    <form id="formulaire" method="post" action="index.php">
        <fieldset>
            <legend>Passer une commande </legend>
            <p>
                <label for="adresseDestinataire">Adresse postale</label>
                <input type="text"  placeholder="adresse, code postal, ville, pays " name="adresseDestinataire" id="adresseDestinataire" required/>
            </p>
            <p>
                <label for="nomDestinataire">Nom Destinataire</label>
                <input type="text"  name="nomDestinataire" id="nomDestinataire" required>
            </p>
            <p>
                <label for="prixTotal">Nom Destinataire</label>
                <input type="text"  value="<?php echo $total?>" readonly name="prixTotal" id="prixTotal">
            </p>

            <p>
                <input type="submit" value="Envoyer"/>
                <input type='hidden' name='controller' value='Produit'>
                <input type='hidden' name='action' value='commander'>
            </p>
        </fieldset>
    </form>

</main>