<?php require_once "./Server/Server.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maybe you should explode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="./Style.css" rel="stylesheet">
</head>
<body>
    <?php include_once "./component/error.php" ?>
<form action="./process/register_db.php" method="post">
    <div class="Box">

    <h4>Sign-up</h4>
    <p>Username</p>
    <input type="text" name="username">
    <p>Email</p>
    <input type="email" name="email">
    <p>Password</p>
    <input type="password" name="password">
    <p>Confirm Password</p>
    <input type="password" name="c-password">
    <p>Rank</p>
    <input type="text" name="rank">
    <br>
    <button type="submit" name="reg">Submit</button>

    </div>
</form>

</body>
</html>