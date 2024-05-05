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

    <link href="./Style.css" rel="stylesheet">

</head>

<body class="p-3">
    <?php include_once './component/sidebar.php' ?>
    <?php include_once './component/success.php' ?>
    <?php include_once './component/error.php' ?>

    <h3>Total user</h3>

    <table class="tablebox table table-bordered w-75 m-auto mt-5">
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
                <td class="d-flex">
                    <a href="./EditUser.php?userid=<?php echo $row["id"] ?>" class="btn btn-warning text-black rounded-2 m-auto">Edit</a>
                    <button type="submit" name="delete" class="btn btn-danger m-auto" onclick="return confirm_delete('<?php echo $row['id'] ?>')">Delete</button>
                </td>

            </tr>


        <?php } ?>
    </table>


</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //sweetalert2
    const confirm_delete = (value) => {
        $(document).ready(function() {
            Swal.fire({
                title: "u fr?",
                text: "ID : " + value,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "green",
                cancelButtonColor: "#d33",
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("../process/DeleteUser.php", {
                        method: "POST",
                        body: new URLSearchParams("delUser=" + value)
                    })
                    .then(response => response.text())
                    .then(data =>{
                        if (data == "data purge successfully"){
                            Swal.fire({
                                title: "data purge successfully",
                                icon: "success",
                            }).then(function() {
                                window.location = "./user.php"
                            })
                        } else {
                            Swal.fire({
                                title: "unable to purge data",
                                icon: "error"
                            }).then(function(){
                                window.location = "./user.php"
                            })
                        }
                    })
                }
            });
        })
    }
</script>

</html>