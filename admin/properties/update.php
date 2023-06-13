<?php
    require '../../includes/functions.php';
    $auth = isAuthenticate();
    if (!$auth) {
        header('Location: /Project_RealEstates/index.php');
    }
    //Validate that its a valid id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /Project_RealEstates/admin/index.php');
    }

    //Database
    require '../../includes/config/database.php';
    $db = dbConnection();
    // var_dump($db);

    //Obtain property data
    $query_properties_id = "SELECT * FROM properties WHERE id = $id";
    $result_properties_id = mysqli_query($db, $query_properties_id);
    $properties = mysqli_fetch_assoc($result_properties_id);


    //Query to obtain vendors
    $consulta = "SELECT * FROM sellers;";
    $resultado = mysqli_query($db, $consulta);

    //Array to errors
    $errors = [];
    
    //Default value in variables (6)
        $title = $properties['title'];
        $price = $properties['price'];
        $description = $properties['description'];
        $rooms = $properties['rooms'];
        $wc = $properties['wc'];
        $parking = $properties['parking'];
        $sellers_id = $properties['sellers_id'];
        $imageProperty = $properties['image'];

    //Run after the form is sumbitted
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        // $number = '1HOLA';
        // $number2 = 1;

        // //sanitizar
        // $resultadoTest = filter_var($number2, FILTER_SANITIZE_NUMBER_INT);
        // var_dump($resultadoTest);

        

        //Sanitize data entries (1)
        $title = mysqli_real_escape_string($db, $_POST["title"]);
        $price = (int)mysqli_real_escape_string($db, $_POST["price"]);
        $description = mysqli_real_escape_string($db, $_POST["description"]);
        $rooms = (int)mysqli_real_escape_string($db, $_POST["rooms"]);
        $wc = (int)mysqli_real_escape_string($db, $_POST["wc"]);
        $parking = (int)mysqli_real_escape_string($db, $_POST["parking"]);
        $sellers_id = mysqli_real_escape_string($db, $_POST["seller"]);
        $startDate = date('Ydm');

        //Assign files to a variables
        $image = $_FILES['image'];

        if (!$title) {
            $errors[] = 'Add a title';
        }

        if (!$price) {
            $errors[] = 'Price is obligatory';
        }

        if (strlen($description)  < 50) {
            $errors[] = 'Add description with at least 50 characters';
        }

        if (!$rooms) {
            $errors[] = 'Add number of rooms';
        }

        if (!$wc) {
            $errors[] = 'Add number of wc';
        }

        if (!$parking) {
            $errors[] = 'Add number of parking';
        }

        if (!$sellers_id) {
            $errors[] = 'Choose a salesperson';
        }

        
        //Validate for size
        $measure = 1000 * 3000; //This will retur kilobytes

        if ($image['size'] > $measure) {
            $errors[] = 'Image is very too heavy';
        }

        // echo "<pre>";
        // var_dump($errors);
        // echo "</pre>";
        
        //Check to error array is empty

        //Insert into database
        
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
            <fieldset>
                <legend>General Information</legend>

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Property title" value="<?php echo $title;?>">

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Property price" value="<?php echo $price;?>">

                <label for="image">Image:</label>
                <input type="file" id="image" accept="image/jpeg, image/png" name="image">

                <img src="../../images/<?php echo $imageProperty;?>" alt="image-property" class="image-small"> 

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

                <select name="seller">
                    <option value="" selected>--Select--</option>
                    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                        <option <?php echo $sellers_id === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"> <?php echo $row[' name'] . " " . $row['lastName']; ?> </option>
                    <?php }; ?>
                    
                </select>
            </fieldset>

            <div class="view-all-start">
                <input type="submit" value="Update property">
                <a class="button_all-start" href="/Project_RealEstates/admin/index.php">Back</a>
            </div>
        </form> 
    </main>

<?php
    includeTemplate('footer');
?>