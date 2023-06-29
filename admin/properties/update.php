<?php

use App\Property;

    require '../../includes/app.php';
    isAuthenticate();
    
    //Validate that its a valid id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /Project_RealEstates/admin/index.php');
    }

    $property = Property::find($id);

    //Query to obtain vendors
    $consulta = "SELECT * FROM sellers;";
    $resultado = mysqli_query($db, $consulta);

    //Array to errors
    $errors = Property::getErrors();
    
    

    //Run after the form is sumbitted
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        //Assign attributes
        $args = $_POST['property'];
        $property->sincronize($args);
        
        $errors = $property->validate();
        if (empty($errors)) {
            //Create file
            $imageFile = '../../images/';

            if (!is_dir($imageFile)) {
                mkdir($imageFile);
            }

            $imageName = '';

            /**Files upload(3)**/
            if ($image['name']) {
                //Delete a previous image(8)
                unlink($imageFile . $properties['image']);

                //Generate a unique name for images(4)
                $imageName = md5( uniqid( rand(), true )) . ".jpg";

                //Image upload
                move_uploaded_file($image['tmp_name'], $imageFile . $imageName);
            } else {
                $imageName = $properties['image'];
            }

            
            $query = " UPDATE properties SET title = '$title', price = $price, image = '$imageName', description = '$description', rooms = $rooms, wc = $wc, parking = $parking, sellers_id = $sellers_id WHERE id = $id";

            // echo $query;
            $result = mysqli_query($db, $query);

            if ($result) {
                //query_string to generate a alert
                header('Location: /Project_RealEstates/admin/index.php?result=2');
            } else {
                echo "Failed Insert";
            }
        }

        
    }   
    
    includeTemplate('header');

?>

    <main class="container">
        <h1>Update Property</h1>
        
        <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        <!-- (2) && (7) -->
        <form class="form" method="POST" enctype="multipart/form-data">

            <?php include '../../includes/template/properties_form.php'	?>

            <div class="view-all-start">
                <input type="submit" value="Update property">
                <a class="button_all-start" href="/Project_RealEstates/admin/index.php">Back</a>
            </div>
        </form> 
    </main>

<?php
    includeTemplate('footer');
?>