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

        <table class="properties">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa en la playa</td>
                    <td><img src="/Project_RealEstates/images/8561fbf710bce191736a17f8592c0882.jpg" class="image-table" alt="table-image"></td>
                    <td>$1200000</td>
                    <td class="flex-button">
                        <a href="#" class="button-red">Delete</a>
                        <a href="#" class="button-yellow">Update</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="view-all-start">
            <a class="button_all-start" href="/Project_RealEstates/admin/properties/create.php">New Property</a>
        </div>
    </main> 

<?php
    includeTemplate('footer');
?>