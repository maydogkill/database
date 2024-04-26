<?php require_once '../Server/Server.php' ;

    if (isset ($_POST["logout"])) {
        session_destroy();
        header("location: ../index.php");
    }