<?php
    require 'includes/app.php';
    use App\Property;
    //Validate id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: /Project_RealEstates/index.php');
    }
    
    $property = Property::find($id);
    includeTemplate('header');

?>

    <main class="container content-centered">
            <h1><?php echo $property->title; ?></h1>

            <picture>
                <img loading="lazy" src="images/<?php echo $property->image;?>" alt="ad-image">
            </picture>

            <div class="property_summary">
                <p class="price">$ <?php echo $property->price; ?></p>
                <ul class="features-icons">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="wc-icon">
                        <p><?php echo $property->wc; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking-icon">
                        <p><?php echo $property->parking; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="bedroom-icon">
                        <p><?php echo $property->rooms; ?></p>
                    </li>
                </ul>
                <p><?php echo $property->description; ?></p>
            </div>


    </main>

    <?php
        includeTemplate('footer');
    ?>