<?php
    //Database
    require '../../includes/config/database.php';
    $db = dbConnection();
    // var_dump($db);

    //Array to errors
    $errors = [];
    
    //Run after the form is sumbitted
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $title = $_POST["title"];
        $price = (int)$_POST["price"];
        $description = $_POST["description"];
        $rooms = (int)$_POST["rooms"];
        $wc = (int)$_POST["wc"];
        $parking = (int)$_POST["parking"];
        $sellers_id = $_POST["seller"];

        if ($title === '') {
            $errors[] = 'Add a title';
        }

        if ($price <= 0) {
            $errors[] = 'Price is obligatory';
        }

        if (strlen($description)  < 50) {
            $errors[] = 'Add description with at least 50 characters';
        }

        if ($rooms <= 0) {
            $errors[] = 'Add number of rooms';
        }

        if ($wc <= 0) {
            $errors[] = 'Add number of wc';
        }

        if ($parking <= 0) {
            $errors[] = 'Add number of parking';
        }

        if ($sellers_id == '') {
            $errors[] = 'Choose a salesperson';
        }

        // echo "<pre>";
        // var_dump($errors);
        // echo "</pre>";
        
        //Check to error array is empty

        //Insert into database
        
        if (empty($errors)) {
            $query = " INSERT INTO properties (title, price, description, rooms, wc, parking, sellers_id ) VALUES ( '$title', '$price', '$description', '$rooms', '$wc', '$parking', '$sellers_id' ) ";

            // echo $query;
            $result = mysqli_query($db, $query);

            if ($result) {
                echo "Successful Insert";
            } else {
                echo "Failed Insert";
            }
        }

        
    }   
    require '../../includes/functions.php';
    includeTemplate('header');

?>

    <main class="container">
        <h1>Create</h1>
        
        <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="form" method="POST" action="/Project_RealEstates/admin/properties/create.php">
            <fieldset>
                <legend>General Information</legend>

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Property title">

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Property price">

                <label for="image">Image:</label>
                <input type="file" id="image" accept="image/jpeg, image/png">

                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>

            </fieldset>

            <fieldset>
                <legend>Property Information</legend>

                <label for="room">Rooms:</label>
                <input type="number" id="room" name="rooms" placeholder="Ex: 3" min="1" max="9">

                <label for="wc">Bathrooms:</label>
                <input type="number" id="wc" name="wc" placeholder="Ex: 3" min="1" max="9">

                <label for="parking">Parking:</label>
                <input type="number" id="parking" name="parking" placeholder="Ex: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Seller</legend>

                <select name="seller">
                    <option value="" selected>--Select--</option>
                    <option value="1">Roberto</option>
                    <option value="2">Vanessa</option>
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