<?php require_once '../Server/Server.php'; ?>
<?php require_once '../Server/Server.php';
    //not logged in
    if (empty($_SESSION["username"])) {
        header("location: ../Login.php");
        exit;
    }

    if ($_SESSION["rank"] != "admin") {
        header("location: ../Index.php");
        exit;
    }

    //check empty userid
    if (empty($_GET["userid"])) {
        header("location: ./user.php");
    }

    //get userid
    $userid = $_GET["userid"];
    $sql = "SELECT * FROM user WHERE id = '$userid'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAGHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="./Style.css" rel="stylesheet">
</head>
<body>

<?php include_once './component/sidebar.php' ?>

<div class="box">

<?php include_once './component/success.php'?>
<?php include_once './component/error.php'?>

<form action="" method="post">
    <div class="">
        <label for="username">username</label> <br>
        <input type="text" name="username" id="username" class="border" value="<?php echo $result["username"]?>"> 
    </div>

    <div class="">
        <label for="password">password</label> <br>
        <input type="password" name="password" id="password" class="border" value="<?php echo $result["password"]?>"> 
    </div>

    <div class="">
        <label for="gmail">gmail</label> <br>
        <input type="gmail" name="gmail" id="gmail" class="border" value="<?php echo $result["gmail"]?>"> 
    </div>

    <label for="rank"></label>
    <select name="rank" id="rank" class=""> 
        <option value="<?php echo $result["rank"]?>" default hidden><?php echo $result["rank"] ?></option>
        <option value="member">Member</option>
        <option value="admin">Admin</option>
    </select>

    <button type="submit" name="edituser">submit</button>

</form>
</div>
    
</body>
</html>