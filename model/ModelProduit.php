<?php
require_once(File::build_path(array("model", "Model.php")));


class ModelProduit
{
    private $idProduit;
    private $nomProduit;
    private $prixProduit;
    private $descriptionProduit;
    private $categorieProduit;

    /**
     * ModelProduit constructor.
     * @param $idProduit
     * @param $nomProduit
     * @param $prixProduit
     * @param $descriptionProduit
     * @param $categorieProduit
     */
    public function __construct($nomProduit = NULL, $prixProduit = NULL, $descriptionProduit = NULL, $categorieProduit = NULL)
    {
        if ( !is_null($nomProduit) && !is_null($prixProduit) && !is_null($descriptionProduit) && !is_null($categorieProduit)) {
            $this->nomProduit = $nomProduit;
            $this->prixProduit = $prixProduit;
            $this->descriptionProduit = $descriptionProduit;
            $this->categorieProduit = $categorieProduit;
        }
    }

    public function save(){
        try{
            $sql = "INSERT INTO `p_produits`( `nomProduit`, `prixProduit`, `descriptionProduit`, `categorieProduit`) VALUES (:nom_tag1,:nom_tag2,:nom_tag3,:nom_tag4) ";
            $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "nom_tag1" => $this->nomProduit,
                "nom_tag2" => $this->prixProduit,
                "nom_tag3" => $this->descriptionProduit,
                "nom_tag4" => $this->categorieProduit,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        }catch(PDOException $e) {
            return false;      
        }
        
    }


    public static function getAllProduits()
    {
        try {
            $pdo = Model::getPDO();
            $rep = $pdo->query("SELECT * FROM p_produits");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_prod = $rep->fetchAll();
            return $tab_prod;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function getProduitById($id)
    {
        $sql = "SELECT * from p_produits WHERE idProduit=:idProduit";
        // Préparation de la requête
        try {
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "idProduit" => $id,
            );
            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            $tab_prod = $req_prep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_prod))
            return false;
        return $tab_prod[0];
    }

     public static function supprimerProduit($idProduit)
    {
        try {
            $sql = "DELETE FROM `p_produits` WHERE idProduit=:tag";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "tag" => $idProduit,
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function modifierProduit($infos)
    {
        try {
            $sql = "UPDATE `p_produits` SET `nomProduit`=:tag,`prixProduit`=:tag2,`descriptionProduit`=:tag3,`categorieProduit`=:tag4 WHERE idProduit=:tag5";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "tag" => $infos["nomProduit"],
                "tag2" => $infos["prixProduit"],
                "tag3" => $infos["descriptionProduit"],
                "tag4" => $infos["categorieProduit"],
                "tag5" => $infos["idProduit"],

            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
           return false;
        }
    }


    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @return mixed
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * @return mixed
     */
    public function getPrixProduit()
    {
        return $this->prixProduit;
    }

    /**
     * @return mixed
     */
    public function getDescriptionProduit()
    {
        return $this->descriptionProduit;
    }

    /**
     * @return mixed
     */
    public function getCategorieProduit()
    {
        return $this->categorieProduit;
    }


}