<?php if (!empty($_SESSION["success"])) { ?>

<div class="Box">
    <p><?php echo $_SESSION["success"];
    unset ($_SESSION["success"]) ?></p>
</div>



<?php } ?>