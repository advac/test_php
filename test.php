<?php
if( isset( $_GET[ 'Login' ] ) ) {
    $user = $_GET[ 'username' ];
    $pass = $_GET[ 'password' ];
    $pass = md5( $pass );
    $query  = "SELECT * FROM `users` WHERE user = '$user' AND password = '$pass';";
    $result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );
    if( $result && mysqli_num_rows( $result ) == 1 ) {
        $row    = mysqli_fetch_assoc( $result );
        $avatar = $row["avatar"];
        $html .= "<p>Bienvenue {$user}</p>";
        $html .= "<img src=\"{$avatar}\" />";
    }
    else {
        $html .= "<pre><br />Username and/or password incorrect.</pre>";
    }
    ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}
?>