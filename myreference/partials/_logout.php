<?php

session_start();
echo "signing you out please wait...";

session_destroy();

if ((!isset($_SESSION))|| session_status() == PHP_SESSION_NONE) {
    header("Location: /myreference/index.php?logoutsuccess=true");
}else{
    if ((isset($_SESSION))||(session_status() == PHP_SESSION_ACTIVE)) {
        header("Location: /myreference/index.php?logoutsuccess=false");
    }
}



?>