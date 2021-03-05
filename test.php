<?php
if( isset( $_POST['Login']) && ($_POST['Login']!="")) {
    $user = $_POST[ 'username' ];
    $pass = $_POST[ 'password' ];
    $pass = bcrypt( $pass );
    $base = mysqli_connect('localhost', 'root', 'motdepasserobuste', 'test');
    # $query  = mysqli_fetch_assoc(mysqli_query($base, "SELECT * FROM `utilisateurs` WHERE `email` = '". $user."'"));
    print_r($query);
    if($query){
        $passwordUser = $query["password"];
        if($pass == $passwordUser){
            $prenom = $query["prenom"];
            $nom = $query["nom"];
            echo "Bienvenue " . $prenom . " " . $nom;
            session_start();
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
            $html .= "<img src=\"{$avatar}\" />";
        }
        else {
            echo "Mot de passe incorrect";
        }
    }
    else {
        echo "Connexion échouée";
    }


} else {
    echo "Il y a une erreur";
}
?>