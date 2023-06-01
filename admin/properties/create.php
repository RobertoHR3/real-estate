<?php
    require '../../includes/functions.php';
    includeTemplate('header');

?>

    <main class="container">
        <h1>Create</h1>
        <div class="view-all-start">
            <a class="button_all-start" href="/Project_RealEstates/admin/index.php">Back</a>
        </div>

        <form class="form">
            <fieldset>
                <legend>General Information</legend>

                <label for="title">Title:</label>
                <input type="text" id="title" placeholder="Property title">

                <label for="price">Price:</label>
                <input type="number" id="price" placeholder="Property price">

                <label for="image">Image:</label>
                <input type="file" id="image" accept="image/jpeg, image/png">

                <label for="description">Description</label>
                <textarea id="description"></textarea>

            </fieldset>

            <fieldset>
                <legend>Property Information</legend>

                <label for="room">Rooms:</label>
                <input type="number" id="room" placeholder="Ex: 3" min="1" max="9">

                <label for="wc">Bathrooms:</label>
                <input type="number" id="wc" placeholder="Ex: 3" min="1" max="9">

                <label for="parking">Parking:</label>
                <input type="number" id="parking" placeholder="Ex: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Seller</legend>

                <select>
                    <option value="1">Roberto</option>
                    <option value="2">Vanessa</option>
                </select>
            </fieldset>

            <input type="submit" value="Create property">
        </form> 
    </main>

<?php
    includeTemplate('footer');
?>