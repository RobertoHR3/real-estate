<?php
    require 'includes/app.php';
    includeTemplate('header');

?>

    <main class="container">
        <h2>Homes & Apartments for Sale</h2>

        <?php
            $limit = 10;
            include 'includes/template/ads.php';	
        ?>
    </main>

    <?php
        includeTemplate('footer');
    ?>