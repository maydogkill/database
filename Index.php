<?php require_once "./Server/Server.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="./Style.css" rel="stylesheet">
</head>
<body>

<div class="Box">
    <?php include_once "./component/success.php" ?>
    <?php include_once "./component/error.php" ?>

    <?php if (!empty($_SESSION["username"])) { ?>

        <h1>Hello <?php echo $_SESSION["username"] ?></h1>
        <p>Your email : <?php echo $_SESSION["email"] ?></p>
        <p>Your rank : <?php echo $_SESSION["rank"] ?></p>
        <form action="./component/logout.php" method="post">
            <button type="submit" name="logout">logout</button>
        </form>

    <?php } ?>
</div>    

</body>
</html>