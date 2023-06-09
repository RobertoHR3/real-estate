<?php

    $result = $_GET['result'] ?? null;

    require '../includes/functions.php';
    includeTemplate('header');

?>

    <main class="container">
        <h1>Real Estate Manager</h1>
        <?php   if (intval($result) === 1) { ?>
            <p class="alert succes">Advertisement successfully created</p>
        <?php } ?>
        <div class="view-all-start">
            <a class="button_all-start" href="/Project_RealEstates/admin/properties/create.php">New Property</a>
        </div>
    </main> 

<?php
    includeTemplate('footer');
?>