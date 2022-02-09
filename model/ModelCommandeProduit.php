<?php
require_once(File::build_path(array("model", "Model.php")));


class ModelCommandeProduit
{
    private $idCommande;
    private $idProduit;
    private $quantiteProduit;




   public function __construct( $idCommande = NULL, $idProduit = NULL, $quantiteProduit = NULL)
    {
       if (!is_null($idCommande) && !is_null($idProduit) && !is_null($quantiteProduit)) {
            $this->idCommande = $idCommande;
            $this->idProduit = $idProduit;
            $this->quantiteProduit = $quantiteProduit;
        }
    }

    public function save()
    {
        $sql = "INSERT INTO `p_commandeProduits`( `idCommande`, `idProduit`, `quantiteProduit`) VALUES (:nom_tag1, :nom_tag2, :nom_tag3) ";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array(
            "nom_tag1" => $this->idCommande,
            "nom_tag2" => $this->idProduit,
            "nom_tag3" => $this->quantiteProduit,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandeProduit');
    }

    public static function getProduitByCommande($commande){
        try {
              $sql = "SELECT * from p_commandeProduits WHERE idCommande=:com";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "com" => $commande,
              
            );
            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandeProduit');
            $produits = $req_prep->fetchAll();

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        if (empty($produits))
            return false;
        return $produits;
    }


    /**
     * @return mixed
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }
      public function getQuantiteProduit()
    {
        return $this->quantiteProduit;
    }



}