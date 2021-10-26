<?php

session_start();
echo"logging you out. Please wait...";
session_destroy();


if((!isset($_SESSION)) || session_status() == PHP_SESSION_NONE) {
    // session isn't started
    header("Location: /forum/index.php?loggedoutsuccess=true");
}else{
    if(isset($_SESSION) || session_status() == PHP_SESSION_ACTIVE) {
        // session isn't started
        header("Location: /forum/index.php?loggedoutsuccess=false");

    }
}

?>
?>