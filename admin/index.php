<?php
    require '../includes/app.php';
    isAuthenticate();

    use App\Property;
    
    //Implement a method to get all properties
    $properties = Property::all();

    //Show conditional messages
    $result = $_GET['result'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);


        if ($id) {
            $property = Property::find($id);
            $property->delete();
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
                <?php foreach($properties as $property) { ?>
                    <tr>
                        <td><?php echo $property->id; ?></td>
                        <td><?php echo $property->title; ?></td>
                        <td><img src="/Project_RealEstates/images/<?php echo $property->image; ?>" class="image-table" alt="table-image"></td>
                        <td>$ <?php echo $property->price; ?></td>
                        <td class="flex-button">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $property->id;	?>"> 
                                <input type="submit" class="button-red" value="Delete">
                            </form>
                            
                            <a href="../admin/properties/update.php?id=<?php echo $property->id; ?>" class="button-yellow">Update</a>
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