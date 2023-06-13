<?php
    require '../includes/functions.php';
    $auth = isAuthenticate();
    if (!$auth) {
        header('Location: /Project_RealEstates/index.php');
    }
    //Import conection
    require '../includes/config/database.php';
    $db = dbConnection();
    //Write a Query
    $query_properties = "SELECT * FROM properties";
    //Check database
    $result_properties = mysqli_query($db, $query_properties);

    //Show conditional messages
    $result = $_GET['result'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);


        if ($id) {
            //Delete file(9)
            $query_image = "SELECT image FROM properties WHERE id = $id";
            $result_image = mysqli_query($db, $query_image);
            $property_image = mysqli_fetch_assoc($result_image);

            unlink('../images/' . $property_image['image']);
            //Delete property
            $query_delete = "DELETE FROM properties WHERE id = $id";
            $result_delete = mysqli_query($db, $query_delete);

            if ($result_delete) {
                header('Location: /Project_RealEstates/admin/index.php?result=3');
            }
        }
    }

    //Includes a templeates
    includeTemplate('header');

?>

    <main class="container">
        <h1>Real Estate Manager</h1>
        <?php   if (intval($result) === 1) { ?>
            <p class="alert succes">Advertisement successfully created</p>
        <?php } elseif(intval($result) === 2) { ?>
            <p class="alert succes">Advertisement successfully updated</p>
        <?php } elseif(intval($result) === 3) { ?>
            <p class="alert succes">Advertisement successfully deleted</p>
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
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $row_properties['id'];	?>"> 
                                <input type="submit" class="button-red" value="Delete">
                            </form>
                            
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