<head>
    <link href="css/utilisateurs.css" rel="stylesheet" type="text/css">
</head>
<main>
    <article id="content">
        <?PHP
        foreach ($utilisateurs as $u){
            echo '<div><p> Pseudo : '.htmlspecialchars($u->getPseudo()).', adresse mail : '.htmlspecialchars($u->getMailUtilisateur()).', nom : '.htmlspecialchars($u->getNomUtilisateur()).', prenom :'.htmlspecialchars($u->getPrenomUtilisateur());
            echo '<p><a href="index.php?action=supprimerutilisateur&mailUtilisateur='.rawurlencode($u->getMailUtilisateur()).'"> Supprimer </a></p></div>';
        }
        ?>
    </article>
</main>