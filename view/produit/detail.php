<?php
$p = ModelProduit::getProduitById($_GET["idProd"]);
require File::build_path(array('view', 'produit', 'description', $p->getDescriptionProduit().'.php'));
?>