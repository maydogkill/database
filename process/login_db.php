<?php require_once '../Server/Server.php';

    if (isset($_POST["log"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        //check empty
        if (empty($email) || empty($password)) {
            $_SESSION["error"] = "please fukcing ptu nooyur infkraoitn t hroughtly";
            header("location: ../Login.php");
            exit;
        }

        $sql = "SELECT * FROM user WHERE gmail = '$email'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $num = mysqli_num_rows($query);

        if ($num <= 0) {
            $_SESSION["error"] = "no data in the system LMAO";
            header("location: ../Login.php");
            exit;
        }

        //check for login
        if ($result["password"] != $password) {
            $_SESSION["error"] = "yuor paswrods arne't corrlerkt pl moam";
            header("location: ../Login.php");
            exit;
        }

        //login
        if (empty($_SESSION["error"])) {
            $_SESSION["username"] = $result["username"];
            $_SESSION["email"] = $result["email"];
            $_SESSION["rank"] = $result["rank"];
            $_SESSION["success"] = "succneunsa";

    
        if ($_SESSION["rank"] = "admin") {
            header("location: ../admin/admin.php");
            exit;
        } else {
            header("location: ../Index.php");
        }
    }
    }