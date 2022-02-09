<head>
    <link href="css/compte.css" rel="stylesheet" type="text/css">
</head>
<main>
    <form id="formulaire" method="post" action="index.php">
        <fieldset>
            <?php if(isset($data['mailUtilisateur'])) {
                echo 'Erreur';
            }?>
            <legend>Se connecter</legend>
            <p>
                <label for="mailUtilisateur">Adresse Mail</label>
                <input type="text"  value="<?php if(isset($data['mailUtilisateur'])){ echo $data['mailUtilisateur']; } ?>" placeholder="Mail" name="mailUtilisateur" id="mailUtilisateur" required/>
            </p>
            <p>
                <label for="mdpUtilisateur">Mot de Passe</label>
                <input type="password" placeholder="Mot de passe" name="mdpUtilisateur" id="mdpUtilisateur" required>
            </p>
            <p>
                <input type="submit" value="Envoyer"/>
                <input type='hidden' name='action' value='connexion'>
            </p>
            <p>
                <a href="index.php?action=creerCompte">Créer un compte</a>
            </p>
        </fieldset>
    </form>

</main>