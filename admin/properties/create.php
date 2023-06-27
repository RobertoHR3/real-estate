<?php
    require '../../includes/app.php';
    use App\Property;
    use Intervention\Image\ImageManagerStatic as Image;
    //Authenticate function to login
    isAuthenticate();
    //conection to database
    $db = dbConnection();

    //Query to obtain vendors
    $consulta = "SELECT * FROM sellers;";
    $resultado = mysqli_query($db, $consulta);

    $errors = Property::getErrors();
    
    //Default value in variables
        $title = '';
        $price = '';
        $description = '';
        $rooms = '';
        $wc = '';
        $parking = '';
        $sellers_id = '';

    //Run after the form is sumbitted
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        //Create an instance to object
        $property = new Property($_POST);

        //Generate a unique name for images(4)
        $imageName = md5( uniqid( rand(), true )) . ".jpg";

        //Setear image
        //Resize the image with intervetion #22
        if ($_FILES['image']['tmp_name']) {
            $image = Image::make($_FILES['image']['tmp_name'])->fit(800, 600);
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
            <fieldset>
                <legend>General Information</legend>

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Property title" value="<?php echo $title;?>">

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Property price" value="<?php echo $price;?>">

                <label for="image">Image:</label>
                <input type="file" id="image" accept="image/jpeg, image/png" name="image">

                <label for="description">Description</label>
                <textarea id="description" name="description"><?php echo $description;?></textarea>

            </fieldset>

            <fieldset>
                <legend>Property Information</legend>

                <label for="room">Rooms:</label>
                <input type="number" id="room" name="rooms" placeholder="Ex: 3" min="1" max="9" value="<?php echo $rooms;?>">

                <label for="wc">Bathrooms:</label>
                <input type="number" id="wc" name="wc" placeholder="Ex: 3" min="1" max="9" value="<?php echo $wc;?>">

                <label for="parking">Parking:</label>
                <input type="number" id="parking" name="parking" placeholder="Ex: 3" min="1" max="9" value="<?php echo $parking;?>">
            </fieldset>

            <fieldset>
                <legend>Seller</legend>

                <select name="sellers_id">
                    <option value="" selected>--Select--</option>
                    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                        <option <?php echo $sellers_id === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"> <?php echo $row[' name'] . " " . $row['lastName']; ?> </option>
                    <?php }; ?>
                    
                </select>
            </fieldset>

            <div class="view-all-start">
                <input type="submit" value="Create property">
                <a class="button_all-start" href="/Project_RealEstates/admin/index.php">Back</a>
            </div>
        </form> 
    </main>

<?php
    includeTemplate('footer');
?>