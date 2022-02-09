<?php
require_once(File::build_path(array("model", "Model.php")));


class ModelUtilisateur
{
    private $pseudoUtilisateur;
    private $mdpUtilisateur;
    private $mailUtilisateur;
    private $prenomUtilisateur;
    private $nomUtilisateur;
    private $typeUtilisateur;
    private $nonce;

    /**
     * ModelUtilisateur constructor.
     * @param pseudoUtilisateur
     * @param $mdpUtilisateur
     * @param $mailUtilisateur
     * @param $typeUtilisateur
     */
    public function __construct($pseudoUtilisateur = NULL, $mdpUtilisateur = NULL, $mailUtilisateur = NULL, $prenomUtilisateur = NULL, $nomUtilisateur = NULL, $typeUtilisateur=NULL,  $nonce = NULL)
    {
        if (!is_null($pseudoUtilisateur) && !is_null($mdpUtilisateur) && !is_null($mailUtilisateur) && !is_null($prenomUtilisateur) && !is_null($typeUtilisateur) && !is_null($nomUtilisateur) && !is_null($nonce)) {
            $this->pseudoUtilisateur = $pseudoUtilisateur;
            $this->mdpUtilisateur = $mdpUtilisateur;
            $this->mailUtilisateur = $mailUtilisateur;
            $this->prenomUtilisateur = $prenomUtilisateur;
            $this->nomUtilisateur = $nomUtilisateur;
            $this->typeUtilisateur= $typeUtilisateur;
            $this->nonce = $nonce;
        }

    }
    public function save()
    {
         try{
            $sql = "INSERT INTO `p_utilisateurs`(`mailUtilisateur`, `pseudoUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `mdpUtilisateur`, `typeUtilisateur`, `nonce`) VALUES (:nom_tag1, :nom_tag2, :nom_tag3, :nom_tag4, :nom_tag5, :nom_tag6, :nom_tag7) ";
             $req_prep = Model::getPDO()->prepare($sql);
            $values = array(
                "nom_tag1" => $this->mailUtilisateur,
                "nom_tag2" => $this->pseudoUtilisateur,
                "nom_tag3" => $this->nomUtilisateur,
                "nom_tag4" => $this->prenomUtilisateur,
                "nom_tag5" => $this->mdpUtilisateur,
                "nom_tag6" => $this->typeUtilisateur,
                "nom_tag7" => $this->nonce,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        }catch(PDOException $e) {
            return false;
           
        }
    }

    public static function getAllUtilisateurs()
    {
        try {
            $PDO = Model::getPDO();
            $rep = $PDO->query("SELECT * FROM p_utilisateurs");
            $rep->setFetchMode(PDO::FETCH_CLASS, "ModelUtilisateur");
            $utilisateurs = $rep->fetchAll();
            return $utilisateurs;

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href="index.php?action=accueil"> retour a la page d\'accueil </a>';
            }
            die();
        }

    }



    public static function verifierUtilisateur($data)
    {
        $sql = "SELECT * from p_utilisateurs WHERE mailUtilisateur=:nom_tag AND mdpUtilisateur=:nom_tag2 AND nonce IS NULL";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $data["mailUtilisateur"],
            "nom_tag2" => $data["mdpUtilisateur"]
        );

        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $utilisateur = $req_prep->fetchAll();
        if (empty($utilisateur))
            return false;
        return $utilisateur[0];
    }

    public static function checkNonce($data)
    {
        $sql = "SELECT * from p_utilisateurs WHERE mailUtilisateur=:nom_tag AND nonce=:nom_tag2";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $data["mailUtilisateur"],
            "nom_tag2" => $data["nonce"]
        );
        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $utilisateur = $req_prep->fetchAll();
        if (empty($utilisateur))
            return false;
        return true;
    }
    public static function verifNonce($data)
    {
        $sql = "SELECT * from p_utilisateurs WHERE mailUtilisateur=:nom_tag AND nonce IS NULL";
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $data["mailUtilisateur"],
            "nom_tag2" => $data["nonce"]
        );
        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $utilisateur = $req_prep->fetchAll();
        if (empty($utilisateur))
            return false;
        return true;
    }


    public static function supprimerUtilisateur($pseudoUtilisateur)
    {
        try {
            $sql = "DELETE FROM p_utilisateurs WHERE pseudoUtilisateur=:tag";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "tag" => $pseudoUtilisateur,
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

    public static function modifierUtilisateur($infos)
    {
        try {
            $sql = "UPDATE p_utilisateurs SET mailUtilisateur=:tag2, prenomUtilisateur=:tag3, nomUtilisateur=:tag4, mdpUtilisateur=:tag5 WHERE pseudoUtilisateur=:tag";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "tag" => $infos["pseudoUtilisateur"],
                "tag2" => $infos["mailUtilisateur"],
                "tag3" => $infos["prenomUtilisateur"],
                "tag4" => $infos["nomUtilisateur"],
                "tag5" => $infos["mdpUtilisateur"],

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

    public static function getUtilisateurByPseudo($mailUtilisateur)
    {
        $sql = "SELECT * FROM p_utilisateurs WHERE mailUtilisateur=:tag";

        $req_prep = Model::getPDO()->prepare($sql);

        $value = array(
            'tag' => $mailUtilisateur);

        $req_prep->execute($value);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $utilisateur = $req_prep->fetchAll();

        return $utilisateur[0];
    }


    public static function updateNonce($mailUtilisateur)
    {
        try {
            $sql = "UPDATE p_utilisateurs SET nonce = NULL WHERE mailUtilisateur=:tag";
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "tag" => $mailUtilisateur
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
    public function getNonce()
    {
        return $this->nonce;
    }


    public function getPseudo()
    {
        return $this->pseudoUtilisateur;
    }


    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }


    public static function getTypeID($id)
    {
        $sql = "SELECT typeUtilisateur FROM p_utilisateurs WHERE mailUtilisateur=:tag";

        $req_prep = Model::getPDO()->prepare($sql);

        $value = array(
            'tag' => $id);

        $req_prep->execute($value);

        $req_prep->setFetchMode(PDO::FETCH_COLUMN, 0);
        $utilisateur = $req_prep->fetchAll();

        return $utilisateur[0];
    }

}

?>
