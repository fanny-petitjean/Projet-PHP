<head>
    <link href="css/compte.css" rel="stylesheet" type="text/css">

</head>
<main>
    <form id="formulaire" method="post" action="index.php">
        <fieldset>
            <?php if(isset($data['pseudoUtilisateur'])) {
                echo 'Erreur';
            }?>
            <legend>Création de compte</legend>
            <p>
                <label for="pseudoUtilisateur">Identifiant</label>
                <input type="text" value="<?php if(isset($data['pseudoUtilisateur'])){ echo $data['pseudoUtilisateur']; } ?>" placeholder="pseudo" name="pseudoUtilisateur" id="pseudoUtilisateur" required/>
            </p>
            <p>
                <label for="nomUtilisateur">Nom</label>
                <input placeholder="nom"  value="<?php if(isset($data['nomUtilisateur'])){ echo $data['nomUtilisateur']; } ?>" name="nomUtilisateur" id="nomUtilisateur" type="text" required>
            </p>
            <p>
                <label for="prenomUtilisateur">Prénom</label>
                <input placeholder="prenom"  value="<?php if(isset($data['prenomUtilisateur'])){ echo $data['prenomUtilisateur']; } ?>" name="prenomUtilisateur" id="prenomUtilisateur" type="text" required>
            </p>
            <p>
                <label for="mailUtilisateur">Mail</label>
                <input placeholder="Email"  value="<?php if(isset($data['mailUtilisateur'])){ echo $data['mailUtilisateur']; } ?>"name="mailUtilisateur" id="mailUtilisateur" type="email" required>
            </p>
            <p>
                <label for="mdpUtilisateur">Mot de Passe</label>
                <input type="password" placeholder="Mot de passe" name="mdpUtilisateur" id="mdpUtilisateur" required>
            </p>
            <p>
                <label for="verifMdp">Vérification mot de Passe</label>
                <input type="password" placeholder="Mot de passe" name="verifMdp" id="verifMdp" required>
            </p>
            <p>
                <input type="submit" value="Envoyer"/>
                <input type='hidden' name='action' value='creationCompte'>

            </p>
        </fieldset>
    </form>

</main>