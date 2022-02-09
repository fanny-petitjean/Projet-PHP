<?php require_once (File::build_path(array("lib","Contact.php")));?>

<head>
    <link href="css/contact.css" rel="stylesheet" type="text/css">
</head>
<main>
    <h1 class="title">Contactez-Nous</h1>
    <?php echo $alert; ?>
    <form action="index.php" method="post">
        <fieldset>
            <legend>Informations personnelles</legend>
            <div class="input">
                <span class="inputItem">Nom*</span>
                <input class="inputField" id="surname" name="surname" required type="text">
            </div>
            <div class="input">
                <span class="inputItem">Prénom*</span>
                <input class="inputField" id="firstname" name="firstname" required type="text">
            </div>
            <div class="input">
                <span class="inputItem">Email*</span>
                <input class="inputField" id="emailB" name="email" placeholder="votremail@domaine.com" required
                       tabindex="1" type="email">
            </div>
            <div class="input">
                <span class="inputItem">Code postal*</span>
                <input class="inputField" id="zip" name="zip" pattern="[0-9]{5}" required type="text">
            </div>
            <div class="input">
                <span class="inputItem">Pays d'origine</span>
                <select class="inputField" id="countryselect" name="countryselect">
                    <option name="uk" value="United Kindgdom">United Kingdom</option>
                    <option selected name="France" value="fr">France</option>
                    <option name="sp" value="Spain">Spain</option>
                    <option name="ge" value="Germany">Germany</option>
                    <option name="us" value="United States">United States of America</option>
                </select>
            </div>
        </fieldset>
        <fieldset>
            <legend>Vous avez entendu parler de nous via ?</legend>
            <div class="input">
                <select class="inputField" id="viaselect" name="via">
                    <option name="publicite" value="ad">Une publicité</option>
                    <option name="twitter" value="twitter">Twitter</option>
                    <option name="facebook" value="facebook">Facebook</option>
                    <option selected name="recommendation" value="recommandation">Une recommandation</option>
                    <option name="autre" value="autre">Autre</option>
                </select>
            </div>
            <div class="input">
                <span class="inputItem">Si autre</span>
                <input class="inputField" id="autre" name="autreOption" type="text">
            </div>
        </fieldset>
        <fieldset>
            <legend>Date à laquelle vous souhaitez être recontacté*</legend>
            <div class="input">
                <input class="inputField" id="datecontact" name="datecontact" required type="Date">
            </div>
        </fieldset>
        <fieldset>
            <legend>Message*</legend>
            <div class="input" id="inputMsg">
	            <textarea class="inputField" cols="80" id="msg" name="msg"
                          placeholder="Nous vous répondrons dans les meilleurs délais dans la mesure du possible"
                          required rows="10"></textarea>
            </div>
        </fieldset>
        <div class="input" id="send">
            <input class="inputField" name="submit" type="submit" value="Envoyer">
        </div>
        <input type='hidden' name='action' value='sendEmail'>
    </form>
</main>

<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
