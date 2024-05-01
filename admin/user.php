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

    $sql = "SELECT * FROM user";
    $query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="./Style.css" rel="stylesheet">
</head>
<body>
    <?php include_once './component/sidebar.php'?>
    <?php include_once './component/success.php'?>
    <?php include_once './component/error.php'?>

        <h3>Total user</h3>

        <table class="tablebox">
            <tr>
                <th class="">id</th>
                <th class="">username</th>
                <th class="">email</th>
                <th class="">password</th>
                <th class="">rank</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["username"] ?></td>
                    <td><?php echo $row["gmail"] ?></td>
                    <td><?php echo $row["password"] ?></td>
                    <td><?php echo $row["rank"] ?></td>
                </tr>    
                
            
            <?php } ?>
        </table>

        
</body>
</html>