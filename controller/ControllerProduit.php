<?php

require_once(File::build_path(array("model", "ModelProduit.php")));
require_once(File::build_path(array("model", "ModelCommandes.php")));
require_once(File::build_path(array("model", "ModelCommandeProduit.php")));



class ControllerProduit
{
    public static function readAll()
    {
        $controller = 'produit';
        $view = 'list';
        $pagetitle = 'Liste des produits';
        $tab_prod = ModelProduit::getAllProduits();     //appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }

    public static function read()
    {
        $p = ModelProduit::getProduitById($_GET["idProd"]);
        if ($p === false) {
            $controller = 'produit';
            $view = 'error';
            $pagetitle = 'Erreur';
            require File::build_path(array("view", "view.php"));
        } else {
            $controller = 'produit';
            $view = 'detail';
            $pagetitle = 'Detail ' . $p->getNomProduit();
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function produit()
    {
        $view = 'produit';
        $pagetitle = 'Produit';
        require(File::build_path(array("view", "view.php")));
    }


    public static function ajouterProduit()
    {
        if (isset($_SESSION['panier'])) $tabPanier = $_SESSION['panier'];
        else $tabPanier = array();

        if (!isset($tabPanier[$_GET['idProd']])) $tabPanier[$_GET['idProd']] = 1;
        else $tabPanier[$_GET['idProd']]++;

        $_SESSION['panier'] = $tabPanier;


        $p = ModelProduit::getProduitById($_GET["idProd"]);

        $view = 'suppressionAjoutProduit';
        $pagetitle = 'Ajouter produit' ;
        $message = 'ajouté';

        require File::build_path(array("view", "view.php"));
    }

    public static function panier()
    {
        $value=0;
        $produits = ModelProduit::getAllProduits();
        if(isset($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $idProduit=> $quantite){
                $p = ModelProduit::getProduitById($idProduit);
                $value+=$quantite*($p->getPrixProduit());
            }
        }


        $view = 'panier';
        $pagetitle = 'Le Panier';
        require(File::build_path(array("view", "view.php")));
    }
    
    public static function supprimerProduit(){

        if($_SESSION['panier'][$_GET['idProd']]==1){
            $tabPanier = array();
            foreach($_SESSION['panier'] as $idProduit =>$value ){
                if($idProduit!=$_GET['idProd']){
                    $tabPanier[$idProduit]=$value;
                }
            }
            $_SESSION['panier'] = $tabPanier;
        }else{
             $_SESSION['panier'][$_GET['idProd']] --;
        }
        $p = ModelProduit::getProduitById($_GET["idProd"]);
        $message= "supprimé. ";
        $view = 'suppressionAjoutProduit';
        $pagetitle = 'Supression Produit';
        require(File::build_path(array("view", "view.php")));

    }

    public static function create(){
        $view = 'creerProduit';
        $pagetitle = 'Creer Produit';
        $controller='produit';
        require(File::build_path(array("view", "view.php")));
    }

    public static function update(){
        if(isset($_GET['idProd'])) {
            $p = ModelProduit::getProduitById($_GET['idProd']);
        }
        $view = 'modifierProduit';
        $pagetitle = 'Modifier Produit';
        $controller='produit';
        require(File::build_path(array("view", "view.php")));
    }

    public static function updated(){
        if(ModelProduit::getProduitById($_POST['idProd'])){

            $data=array(
                'nomProduit'=>$_POST['nomProduit'],
                'prixProduit'=>$_POST['prixProduit'],
                'descriptionProduit'=>$_POST['descriptionProduit'],
                'categorieProduit'=>$_POST['categorieProduit'],
                'idProduit'=>$_POST['idProd'],

            );
            if( ModelProduit::modifierProduit($data)==false){
                $p=ModelProduit::getProduitById($data['idProduit']);
                $view = 'modifierProduit';
                $pagetitle = 'Modifier Produit';
                $controller='produit';
                require(File::build_path(array("view", "view.php")));

            }else{
                $view = 'suppressionAjoutModification';
                $pagetitle = 'Modification Produit';
                $message='modifié';
                $controller='produit';
                require(File::build_path(array("view", "view.php")));
            }


        }else{
            $p = new ModelProduit($_POST['nomProduit'],$_POST['prixProduit'],$_POST['descriptionProduit'],$_POST['categorieProduit']);
            $res = $p->save();
            /*if($res==false){
                $message='créé';
                $view = 'creerProduit';
                $pagetitle = 'Creer Produit';
                $controller='produit';
                require(File::build_path(array("view", "view.php")));
            }else{*/
            $view = 'suppressionAjoutModification';
            $pagetitle = 'Creer Produit';
            $message='créé';
            $controller='produit';
            require(File::build_path(array("view", "view.php")));
            //}

        }

    }

    public static function delete(){
        ModelProduit::supprimerProduit($_GET['idProd']);
        $view = 'suppressionAjoutModification';
        $pagetitle = 'supprimer Produit';
        $message='supprimé';
        $controller='produit';
        require(File::build_path(array("view", "view.php")));
    }
}

