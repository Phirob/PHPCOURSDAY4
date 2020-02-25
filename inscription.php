<?php

session_start();
include './templates/header.php';

?>

    <!--Création du formulaire avec ses différents attributs -->
    <form name="Inscription" class="inscription" method="post">
        <h1>INSCRIPTION</h1>
        <input type="text" name="username" placeholder="Username" required></br>
        <?php
        if(isset($er_username)){
            echo $er_username;
        }

        ?>
        <input type="password" name="password" placeholder="Password" required></br>
        <?php
        if(isset($er_password)){
            echo $er_password;
        }

        ?>
        <input type="password" name="confpassword" placeholder="Confirm password" required></br>
        <input type="submit" name="submit-form" value="S'inscrire">
    </form>

<?php

include('database.php');

if(!empty($_POST)) {
    extract($_POST);
    $valid = true;

    if (isset($_POST['submit-form'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];

        if (empty($username)) {
            $valid = false;
            $er_username = ("Le nom d' utilisateur ne peut pas être vide");
        }
        if (empty($password)) {
            $valid = false;
            $er_password = "Le mot de passe ne peut pas être vide";
        }elseif ($password != $confpassword){
            $valid = false;
            $er_password = "La confirmation du mot de passe ne correspond pas";
        }
        if($valid){

            $data = [$username, $password];
            $query = $db->prepare('INSERT INTO day4 (pseudo, password) VALUES ( ?, ? )');
            $result = $query->execute( $data );

        }
    }
}

?>

<?php

include './templates/footer.php';

?>
