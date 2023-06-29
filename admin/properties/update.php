<?php

use App\Property;
use Intervention\Image\ImageManagerStatic as Image;

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
        //Validate
        $errors = $property->validate();

        //Upload files
        //Generate a unique name for images(4)
        $imageName = md5( uniqid( rand(), true )) . ".jpg";

        if ($_FILES['property']['tmp_name']['image']) {
            $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
            $property->setImage($imageName);
        }

        if (empty($errors)) {
            //Image storage
            $image->save(FILES_IMAGES . $imageName);
            $property->save();
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