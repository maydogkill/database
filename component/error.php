<?php if (!empty($_SESSION["error"])) { ?>

    <div class="Box">
        <p><?php echo $_SESSION["error"];
        unset ($_SESSION["error"]) ?></p>
    </div>



<?php } ?>