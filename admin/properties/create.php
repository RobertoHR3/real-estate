<?php
    //Database
    require '../../includes/config/database.php';
    $db = dbConnection();
    // var_dump($db);
    
    /*if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }*/

    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $rooms = $_POST["rooms"];
    $wc = $_POST["wc"];
    $parking = $_POST["parking"];
    $sellers_id = $_POST["seller"];
    
    //Insert into database
    $query = " INSERT INTO properties (title, price, description, rooms, wc, parking, sellers_id) VALUES( '$title', '$price', '$description', '$rooms', '$wc', '$parking', '$sellers_id' ) ";

    // echo $query;

    $result = mysqli_query($db, $query);

    if ($result) {
        echo "Successful Insert";
    } else {
        echo "Failed Insert";
    }

    require '../../includes/functions.php';
    includeTemplate('header');

?>

    <main class="container">
        <h1>Create</h1>
        

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