<?php

require_once File::build_path(array("lib", "Contact.php"));
require_once File::build_path(array("model", "ModelUtilisateur.php"));
require_once File::build_path(array("lib", "security.php"));


class ControllerUtilisateur
{

    public static function accueil()
    {
        $view = 'accueil';
        $pagetitle = 'Accueil';
        require(File::build_path(array("view", "view.php")));
    }

    public static function contact()
    {
        $view = 'contact';
        $pagetitle = 'Contact';
        $alert = "";
        require(File::build_path(array("view", "view.php")));
    }

    public static function equipe()
    {
        $view = 'equipe';
        $pagetitle = 'Contact';
        require(File::build_path(array("view", "view.php")));
    }


    public static function presse()
    {
        $view = 'presse';
        $pagetitle = 'Presse';
        require(File::build_path(array("view", "view.php")));
    }

    //Partie connexion et creation compte

    public static function seConnecter()
    {
        $view = 'connexion';
        $pagetitle = 'Connexion';
        require(File::build_path(array("view", "view.php")));
    }

    public static function creerCompte()
    {
        $view = 'creerCompte';
        $pagetitle = 'Créer Utilisateur';
        require(File::build_path(array("view", "view.php")));
    }

    public static function connexion()
    {
        $data = array(
            'mailUtilisateur' => $_POST['mailUtilisateur'],
        );

        $passwordHache = Security::hacher($_POST['mdpUtilisateur']);
        $data['mdpUtilisateur'] = $passwordHache;

        $U = ModelUtilisateur::verifierUtilisateur($data);
        //TODO probleme avec la nonce
        $dataNonce = array(
                'mailUtilisateur' => $_POST['mailUtilisateur'],
                'nonce' => $U->getNonce(),
            );
        if (ModelUtilisateur::verifNonce($dataNonce) == true){
            if ($U == NULL) {
                $view = 'connexion';
                $pagetitle = 'Connexion';
                require(File::build_path(array("view", "view.php")));
            } else {
                $_SESSION['login'] = $data['mailUtilisateur'];
                if (ModelUtilisateur::getTypeID($_SESSION['login']) == 1) {
                    $_SESSION['isAdmin'] = 1;
                }
                $view = 'accueil';
                $pagetitle = 'Page Accueil';
                require(File::build_path(array("view", "view.php")));
            }
        }

    }

    public static function creationCompte()
    {
        $data = array(
            'pseudoUtilisateur' => $_POST['pseudoUtilisateur'],
            'prenomUtilisateur' => $_POST['prenomUtilisateur'],
            'nomUtilisateur' => $_POST['nomUtilisateur'],
            'mailUtilisateur' => $_POST['mailUtilisateur'],
        );
        if ($_POST['mdpUtilisateur'] == $_POST['verifMdp']) {

            $d = filter_var($_POST['mailUtilisateur'], FILTER_VALIDATE_EMAIL);
            if ($d != false) {
                $data['mailUtilisateur'] = $_POST['mailUtilisateur'];
                $mdp = Security::hacher($_POST['mdpUtilisateur']);
                $data['mdpUtilisateur'] = $mdp;
            }

            if (ModelUtilisateur::verifierUtilisateur($data) != NULL) {
                $view = 'erreurCompteExiste';
                $pagetitle = 'Erreur : compte déjà existant';
                require(File::build_path(array("view", "view.php")));


            } else {
                // To send HTML mail, the Content-type header must be set
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                $data['nonce'] = Security::generateRandomHex();
                $mail = ' Bonjour <a href="https://webinfo.iutmontp.univ-montp2.fr/~randrianasolom/ProjetPhp/projetphp-petitjean-randrianasolo-biron/index.php?action=validate&mailUtilisateur=' . rawurldecode($data["mailUtilisateur"]) . '&nonce=' . $data["nonce"] . '">cliquez ici pour valider</a>';
                $u = new ModelUtilisateur($data['pseudoUtilisateur'],$data['mdpUtilisateur'],$data['mailUtilisateur'],$data['prenomUtilisateur'],$data['nomUtilisateur'],1,$data['nonce']);
                $u->save();
                mail($data['mailUtilisateur'], 'Activation de votre compte', $mail, implode("\r\n", $headers));

                $view = 'erreurNonce';
                $pagetitle = 'Confirmez votre compte';
                require(File::build_path(array("view", "view.php")));
            }
        } else {
            $view = 'creerCompte';
            $pagetitle = 'Page compte';
            require(File::build_path(array("view", "view.php")));

        }
    }

    public static function modifierUtilisateur()
    {
        $data = array(
            'pseudoUtilisateur' => $_POST['pseudoUtilisateur'],
            'mailUtilisateur' => $_POST['mailUtilisateur'],
            'prenomUtilisateur' => $_POST['prenomUtilisateur'],
            'nomUtilisateur' => $_POST['nomUtilisateur'],
        );
        if ($_POST['mdpUtilisateur'] == $_POST['verifMdp']) {

            $passwordHache = Security::hacher($_POST['mdpUtilisateur']);
            $data['mdpUtilisateur'] = $passwordHache;

            ModelUtilisateur::modifierUtilisateur($data);
            $view = 'modificationUtilisateurReussi';
            $pagetitle = 'Modifier Utilisateur';
            require(File::build_path(array("view", "view.php")));
        } else {
            $view = 'modificationCompte';
            $pagetitle = 'Modification Utilisateur';
            require(File::build_path(array("view", "view.php")));

        }
    }

    public static function validate()
    {
        $data = array(
            'mailUtilisateur' => $_GET['mailUtilisateur'],
            'nonce' => $_GET['nonce']
        );
        if (ModelUtilisateur::checkNonce($data) != NULL) {

            $_SESSION['login'] = $_GET['mailUtilisateur'];
            if (ModelUtilisateur::getTypeID($_SESSION['login']) == 1) {
                $_SESSION['isAdmin'] = 1;
            }
            ModelUtilisateur::updateNonce($_GET["mailUtilisateur"]);
            $_SESSION['mailUtilisateur'] = $_GET["mailUtilisateur"];
            $controller = 'utilisateur';
            $view = 'accueil';
            $pagetitle = 'Page d\'accueil';
            require(File::build_path(array("view", "view.php")));

        } else {
            $view = 'erreurNonce';
            $pagetitle = 'Confirmez votre compte';
            require(File::build_path(array("view", "view.php")));
        }
    }

    public
    static function sendEmail()
    {
        $alert = Contact::sendEmail();
        $view = 'contact';
        $pagetitle = 'Contact';
        require(File::build_path(array("view", "view.php")));
    }


    public
    static function seDeconnecter()
    {
        session_unset();
        $view = 'accueil';
        $pagetitle = 'Accueil';
        require(File::build_path(array("view", "view.php")));
    }

    public
    static function comptes()
    {
        $utilisateurs = ModelUtilisateur::getAllUtilisateurs();
        $view = 'utilisateurs';
        $pagetitle = 'Utilisateurs';
        require(File::build_path(array("view", "view.php")));
    }

    public
    static function modificationUtilisateur()
    {
        $utilisateur = ModelUtilisateur::getUtilisateurByPseudo($_SESSION['login']);
        $view = 'modificationCompte';
        $pagetitle = 'Modification Utilisateur';
        require(File::build_path(array("view", "view.php")));

    }


    public
    static function supprimerutilisateur()
    {
        ModelUtilisateur::supprimerUtilisateur($_GET['mailUtilisateur']);
        $view = 'suppressionUtilisateurReussi';
        $pagetitle = 'Supprimer Utilisateur';
        require(File::build_path(array("view", "view.php")));
    }
}

?>
