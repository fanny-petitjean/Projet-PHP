<head>
    <link href="css/compte.css" rel="stylesheet" type="text/css">

</head>
<main>

<form method="post" action='index.php'>
    <fieldset>
        <legend>Modifier un Produit :</legend>
        <p>


            <label for="nomProduit">Nom Produit</label> :
            <input type="text" value="<?php if (isset($data['nomProduit'])) {
                           echo $data['nomProduit'];
                       } else if (isset($p)){
                        echo $p->getNomProduit();
                       }?>" name="nomProduit" id="nomProduit" required/>
        </p>
        <p>
            <label for="prixProduit">Prix du Produit</label> :
            <input type="text" value="<?php if (isset($data['prixProduit'])) {
                           echo $data['prixProduit'];
                       } else if (isset($p)){
                           echo $p->getPrixProduit();
                       }?>" placeholder="00.00" name="prixProduit" id="prixProduit" required>
        </p>
        <p>
            <label for="descriptionProduit">Description </label> :
            <input type="text" value="<?php if (isset($data['descriptionProduit'])) {
                           echo $data['descriptionProduit'];
                       } else if (isset($p)){
                           echo $p->getDescriptionProduit();
                       }?>" name="descriptionProduit" id="descriptionProduit" required>
        </p>
        <p>
            <label for="categorieProduit">Categorie </label> :
            <input type="text" value="<?php if (isset($data['categorieProduit'])) {
                           echo $data['categorieProduit'];
                       } else if (isset($p)){
                           echo $p->getCategorieProduit();
                       }?>" name="categorieProduit" id="categorieProduit" required>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
            <input type='hidden' name='controller' value='Produit'>
            <input type='hidden' name='idProd' value="<?php if (isset($data['idProduit'])) {
                           echo $data['idProduit'];
                       }  else if (isset($p)){
                           echo $p->getIdProduit();
                       }?>">
            <input type='hidden' name='action' value='updated'>

        </p>
    </fieldset>
</form>
</main>





