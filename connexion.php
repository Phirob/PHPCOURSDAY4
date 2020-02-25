<?php

include './templates/header.php';

?>

<!--Création du formulaire avec ses différents attributs -->
<form action="accueil.php" name="Connexion" class="connexion" method="post">
    <h1>CONNEXION</h1>
    <input type="text" name="username" placeholder="Username"></br>
    <input type="password" name="password" placeholder="Password"></br>
    <input type="submit" name="submit-form" value="Se connecter">
</form>

<?php

include './templates/footer.php';

?>
