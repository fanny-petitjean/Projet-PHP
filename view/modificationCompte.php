<head>
    <link href="css/compte.css" rel="stylesheet" type="text/css">

</head>
<main>
    <form id="formulaire" method="post" action="index.php">
        <fieldset>
            <legend>Modification de compte</legend>
            <p>
                <label for="pseudoUtilisateur">Identifiant</label>
                <input class="readonly" type="text" placeholder="pseudo" name="pseudoUtilisateur"
                       value="<?php
                       if (isset($data['pseudoUtilisateur'])) {
                           echo $data['pseudoUtilisateur'];
                       } else {
                           echo htmlspecialchars($utilisateur->getPseudo());
                       } ?>" id="pseudoUtilisateur" readonly required>
            </p>
            <p>
                <label for="nomUtilisateur">Nom</label>
                <input placeholder="nom" value="<?php
                if (isset($data['nomUtilisateur'])) {
                    echo $data['nomUtilisateur'];
                } else {
                    echo htmlspecialchars($utilisateur->getNomUtilisateur());
                } ?>" name="nomUtilisateur" id="nomUtilisateur" type="text" required>
            </p>
            <p>
                <label for="prenomUtilisateur">Prénom</label>
                <input placeholder="prenom" name="prenomUtilisateur"
                       value="<?php
                       if (isset($data['prenomUtilisateur'])) {
                           echo $data['prenomUtilisateur'];
                       } else {
                           echo htmlspecialchars($utilisateur->getPrenomUtilisateur());
                       } ?>" id="prenomUtilisateur" type="text" required>
            </p>
            <p>
                <label for="mailUtilisateur">Mail</label>
                <input placeholder="Email" name="mailUtilisateur" value="<?php
                if (isset($data['mailUtilisateur'])) {
                    echo $data['mailUtilisateur'];
                } else {
                    echo htmlspecialchars($utilisateur->getMailUtilisateur());
                } ?>" id="mailUtilisateur" type="email" required>
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
                <input type='hidden' name='action' value='modifierUtilisateur'>

            </p>
        </fieldset>
    </form>

</main>