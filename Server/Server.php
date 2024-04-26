<?php session_start();

    $DB_host = "localhost";
    $DB_user = "root";
    $DB_password = "";
    $DB_name = "yakuza";

    $conn = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);

    if(!$conn) {
        echo "Error connect :". mysqli_connect_error();
    }