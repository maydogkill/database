<?php require_once "../Server/Server.php" ;

    // $username = $_POST["username"];
    // $email = $_POST["email"];
    // $password = $_POST["password"];
    // $rank = $_POST["rank"];
    // $$confirm_password = $_POST["c-password"];

    if (isset($_POST["reg"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["c-password"];
        $rank = "member";

        //check empty
        if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
            $_SESSION["error"] = "please input your information";
            header("location: ../register.php");
            exit;
        } 

        //check confirm password
        if ($password != $confirm_password) {
            $_SESSION["error"] = "your password are incorrect dumbass";
            header("location: ../register.php");
            exit;
        }

        //register
        if (empty($SESSION["error"])) {
            $sql = "INSERT INTO user (username, gmail, password, rank)
            VALUES ('$username', '$email', '$password', '$rank')";
            $query = mysqli_query($conn, $sql);
            
            //check runnable
            if ($query) {
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                $_SESSION["rank"] = $rank;
                $_SESSION["success"] = "lol u did it lol fart sound effect";
                header("location ../index.php");
                exit;
            } else {
                $_SESSION["error"] = "lol can't register rn skill issue ezez";
                header("location ../register.php");
                exit;
                }   


        }

    }

?>