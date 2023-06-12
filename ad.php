<?php
    //Validate id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: /Project_RealEstates/index.php');
    }
    //Import conection
    require 'includes/config/database.php';
    $db = dbConnection();
    //Consult
    $query_ad = "SELECT * FROM properties WHERE id = $id";
    //Read a results
    $result_ad = mysqli_query($db, $query_ad);
    if (!$result_ad->num_rows) {
        header('Location: /Project_RealEstates/index.php');
    }
    $row_ad = mysqli_fetch_assoc($result_ad);

    require 'includes/functions.php';
    includeTemplate('header');

?>

    <main class="container content-centered">
            <h1><?php echo $row_ad['title']; ?></h1>

            <picture>
                <img loading="lazy" src="images/<?php echo $row_ad['image'];?>" alt="ad-image">
            </picture>

            <div class="property_summary">
                <p class="price">$ <?php echo $row_ad['price']; ?></p>
                <ul class="features-icons">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="wc-icon">
                        <p><?php echo $row_ad['wc']; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking-icon">
                        <p><?php echo $row_ad['parking']; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="bedroom-icon">
                        <p><?php echo $row_ad['rooms']; ?></p>
                    </li>
                </ul>
                <p><?php echo $row_ad['description']; ?></p>
            </div>


    </main>

    <?php
        mysqli_close($db);
        includeTemplate('footer');
    ?>