<?php require_once '../Server/Server.php'; 

    if (isset($_POST["EditUser"])) {
        $userid = $_POST["id"];
        $username = $_POST["username"];
        $gmail = $_POST["gmail"];
        $password = $_POST["password"];
        $rank = $_POST["rank"];
    }

    //check empty
    if (empty($userid) || empty($username) || empty($gmail) || empty($password) || empty($rank)) {
        $_SESSION["error"] = "put all information.";
        header("location: ../admin/EditUser.php?userid=$userid");
        exit;
    }

    //check email
    $check_email_sql = "SELECT * FROM user WHERE gmail = '$gmail'";
    $check_email_query = mysqli_query($conn, $check_email_sql);
    $num_email = mysqli_num_rows($check_email_query);
    if ($num_email >= 1) {
        $_SESSION["error"] = "the email has already exist.";
        header("location: ../admin/EditUser.php?userid=$userid");
        exit;
    }

    // update user
    if (empty($_SESSION["error"])) {
        $sql = "UPDATE user SET username = '$username', gmail = '$gmail', password = '$password', rank = '$rank', userid = 'userid'";
        if ($query) {
            $_SESSION["success"] = "edit successfully";
            header(("location ../admin/EditUser.php"));
            exit;
        }
        else {
            $_SESSION["error"] = "edit unsuccessfully";
            header(("location: ../admin/EditUser.php?userid=$userid"));
            exit;
        }
    }
    
    
?>