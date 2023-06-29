<?php
    require '../../includes/app.php';
    use App\Property;
    use Intervention\Image\ImageManagerStatic as Image;
    //Authenticate function to login
    isAuthenticate();
    //conection to database
    $db = dbConnection();

    $property = new Property;

    //Query to obtain vendors
    $consulta = "SELECT * FROM sellers;";
    $resultado = mysqli_query($db, $consulta);

    $errors = Property::getErrors();
    

    //Run after the form is sumbitted
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        //Create an instance to object
        $property = new Property($_POST['property']);

        //Generate a unique name for images(4)
        $imageName = md5( uniqid( rand(), true )) . ".jpg";

        //Setear image
        //Resize the image with intervetion #22
        if ($_FILES['property']['tmp_name']['image']) {
            $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
            $property->setImage($imageName);
        }
        
        //Call to validate method
        $errors =$property->validate();
        
        //Check to error array is empty
        if (empty($errors)) {
            
            //Create file
            if (!is_dir(FILES_IMAGES)) {
                mkdir(FILES_IMAGES);
            } 
            
            //Save image in server #22
            $image->save(FILES_IMAGES . $imageName);

            //Call to save method
            $result = $property->save();


            //Message success or error
            if ($result) {
                //query_string to generate a alert
                header('Location: /Project_RealEstates/admin/index.php?result=1');
            } else {
                echo "Failed Insert";
            }
        }

        
    }   
    includeTemplate('header');

?>

    <main class="container">
        <h1>Create</h1>
        
        <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        <!-- (2) -->
        <form class="form" method="POST" action="/Project_RealEstates/admin/properties/create.php" enctype="multipart/form-data">
            <?php include '../../includes/template/properties_form.php'	?>

            <div class="view-all-start">
                <input type="submit" value="Create property">
                <a class="button_all-start" href="/Project_RealEstates/admin/index.php">Back</a>
            </div>
        </form> 
    </main>

<?php
    includeTemplate('footer');
?>