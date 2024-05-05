<?php require_once '../Server/Server.php' ; 

    if (isset($_POST["delUser"])) {
        $iduser = $_POST["delUser"];

        $sql = "DELETE FROM user WHERE id = '$iduser'";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "data purge successfully";
        } else {
            echo "unable to purge data";
        }
    }

?>