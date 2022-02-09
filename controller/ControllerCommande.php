<?php

require_once(File::build_path(array("model", "ModelProduit.php")));
require_once(File::build_path(array("model", "ModelCommandes.php")));
require_once(File::build_path(array("model", "ModelCommandeProduit.php")));



class ControllerCommande
{
    public static function readAll()
    {
        $commandes = ModelCommandes::getCommandeByLogin($_SESSION['login']);
        $view = 'historiqueCommande';
        $controller = 'commande';
        $pagetitle = 'historiqueCommande';
        require(File::build_path(array("view", "view.php"))); 
    }

    public static function read()
    {
        $produits = ModelCommandeProduit::getProduitByCommande($_GET["idCommande"]);
        foreach($produits as $p){
            $quantiteProd[$p->getIdProduit()]=$p->getQuantiteProduit();
        }
        $produit = ModelProduit::getAllProduits();
        if ($produits === false) {
            $controller = 'commande';
            $view = 'error';
            $pagetitle = 'Erreur';
            require File::build_path(array("view", "view.php"));
        } else {
            $view = 'detail';
            $controller = 'commande';
            $pagetitle = 'Detail ';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function commande(){
        if(!isset($_SESSION['login'])){
            $view = 'connexion';
            $pagetitle = 'Connexion';
            require(File::build_path(array("view", "view.php")));
        }else{
            $total= $_POST['total'];
            $view = 'commandeProduit';
            $controller = 'commande';
            $pagetitle = 'Commande';
            require(File::build_path(array("view", "view.php")));
        }
    }

    public static function commander(){
        $login = $_SESSION['login'];
        $commande = new ModelCommandes($login, $_POST['nomDestinataire'], $_POST['adresseDestinataire'] ,$_POST['prixTotal']);
        $commande->save();
        $infos=array(
            'nomDestinataire'=>$_POST['nomDestinataire'],
            'adresseDestinataire'=>$_POST['adresseDestinataire'],
            'prixTotal'=> $_POST['prixTotal'],
            'loginUtilisateur'=>$login,
        );

        $c = ModelCommandes::getCommandeByInfo($infos);
        $id = $c->getIdCommande();
        foreach ($_SESSION['panier'] as $idProduit=> $quantite){
            $cp = new ModelCommandeProduit($id,$idProduit,$quantite);
            $cp ->save();
        }

        unset($_SESSION['panier']);

        $view = 'commandeProduitReussi';
        $pagetitle = 'Commande';
        $controller = 'commande';
        require(File::build_path(array("view", "view.php")));

    }
}
