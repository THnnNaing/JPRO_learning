<?php
session_start();

if (isset($_SESSION["views"])) {
    if ($_SESSION["views"] < 5) {
        echo "views = " . $_SESSION["views"];
        $_SESSION["views"] = $_SESSION["views"] + 1;
    } else {
        session_destroy();
        echo "destroy";
    }
} else {
    $_SESSION["views"] = 1;
    echo "Your Session does not exist";
}

?>