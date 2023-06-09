<?php
    //Import conection
    require '../includes/config/database.php';
    $db = dbConnection();
    //Write a Query
    $query_properties = "SELECT * FROM properties";
    //Check database
    $result_properties = mysqli_query($db, $query_properties);

    //Show conditional messages
    $result = $_GET['result'] ?? null;

    //Includes a templeates
    require '../includes/functions.php';
    includeTemplate('header');

?>

    <main class="container">
        <h1>Real Estate Manager</h1>
        <?php   if (intval($result) === 1) { ?>
            <p class="alert succes">Advertisement successfully created</p>
        <?php } else { ?>
            <p class="alert succes">Advertisement successfully updated</p>
        <?php }	?>

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
            
            <tbody> <!-- Show results -->
                <?php while ($row_properties = mysqli_fetch_assoc($result_properties)) { ?>
                    <tr>
                        <td><?php echo $row_properties['id']; ?></td>
                        <td><?php echo $row_properties['title']; ?></td>
                        <td><img src="/Project_RealEstates/images/<?php echo $row_properties['image']; ?>" class="image-table" alt="table-image"></td>
                        <td>$ <?php echo $row_properties['price']; ?></td>
                        <td class="flex-button">
                            <a href="#" class="button-red">Delete</a>
                            <a href="../admin/properties/update.php?id=<?php echo $row_properties['id']; ?>" class="button-yellow">Update</a>
                        </td>
                    </tr>
                <?php }	?> 
            </tbody>
        </table>

        <div class="view-all-start">
            <a class="button_all-start" href="/Project_RealEstates/admin/properties/create.php">New Property</a>
        </div>
    </main> 

<?php

    //Close conection
    mysqli_close($db);

    includeTemplate('footer');
?>