<?php
    require '../includes/functions.php';
    includeTemplate('header');

?>

    <main class="container">
        <h1>Real Estate Manager</h1>

        <div class="view-all">
            <a class="button_all" href="/Project_RealEstates/admin/properties/create.php">New Property</a>
        </div>
    </main> 

<?php
    includeTemplate('footer');
?>