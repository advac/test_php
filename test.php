<?php
if( isset( $_POST[ 'Login' ] ) ) {
    $user = $_POST[ 'username' ];
    $pass = $_POST[ 'password' ];
    $pass = bcrypt( $pass );
    $query  = mysqli_query($mysqli,"select* from user where username='$user' and password='$pass'");
    $result = mysqli_fetch_array($query);
    if($result){
        $html .= "<p>Bienvenue {$user}</p>";
        $html .= "<img src=\"{$avatar}\" />";
    }
    else {
        $html .= "<pre><br />Username and/or password incorrect.</pre>";
    }}
?>