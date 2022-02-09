<?php
require_once(File::build_path(array("model", "Model.php")));


class ModelCommandes
{
    private $idCommande;
    private $adresseDestinataire;
    private $loginUtilisateur;
    private $nomDestinataire;
    private $prixTotal;


    public function __construct( $login = NULL, $nomDestinataire = NULL, $adresseDestinataire = NULL, $prixTotal = NULL)
    {
        if (!is_null($login) && !is_null($nomDestinataire) && !is_null($adresseDestinataire) && !is_null($prixTotal)) {
            $this->loginUtilisateur = $login;
            $this->nomDestinataire = $nomDestinataire;
            $this->adresseDestinataire = $adresseDestinataire;
            $this->prixTotal = $prixTotal;
        }
    }

    public function save()
    {
        $sql = "INSERT INTO `p_commandes`( `adresseDestinataire`, `loginUtilisateur`, `nomDestinataire`, `prixTotal`) VALUES (:nom_tag1, :nom_tag2, :nom_tag3, :nom_tag4) ";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array(
            "nom_tag2" => $this->loginUtilisateur,
            "nom_tag1" => $this->adresseDestinataire,
            "nom_tag3" => $this->nomDestinataire,
            "nom_tag4" => $this->prixTotal,

        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandes');
    }

    public static function getCommandeByInfo($infos){
      
        try {
              $sql = "SELECT * from p_commandes WHERE adresseDestinataire=:adr AND loginUtilisateur=:log AND nomDestinataire=:nom AND prixTotal=:prix";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "adr" => $infos['adresseDestinataire'],
                "log" => $infos['loginUtilisateur'],
                "nom" => $infos['nomDestinataire'],
                "prix" => $infos['prixTotal'],
            );
            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandes');
            $commande = $req_prep->fetchAll();

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        if (empty($commande))
            return false;
        return $commande[0];
    }
     public static function getCommandeByLogin($login){
      
        try {
              $sql = "SELECT * from p_commandes WHERE loginUtilisateur=:log";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "log" => $login,
            );
            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandes');
            $commande = $req_prep->fetchAll();

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
        if (empty($commande))
            return false;
        return $commande;
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
    public function getLoginUtilisateur()
    {
        return $this->loginUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getNomDestinataire()
    {
        return $this->nomDestinataire;
    }

    /**
     * @return mixed
     */
    public function getAdresseDestinataire()
    {
        return $this->adresseDestinataire;
    }

    /**
     * @return mixed
     */
    public function getPrixTotal()
    {
        return $this->prixTotal;
    }


}