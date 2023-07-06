<?php
    use App\Property;

    $properties = Property::all();
?>

<div class="ads-container">
    
    <?php foreach($properties as $property) { ?>
        <div class="ads">
            <picture>
                <img loading="lazy" src="images/<?php echo $property->image;?>" alt="ads-image">
            </picture>
            <div class="a-content">
                <h3><?php echo $property->title;?></h3>
                <p><?php echo $property->description;?></p>
                <p class="price">$ <?php echo $property->price;?></p>
                <ul class="features-icons">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="wc-icon">
                        <p><?php echo $property->wc;?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking-icon">
                        <p><?php echo $property->parking;?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="bedroom-icon">
                        <p><?php echo $property->rooms;?></p>
                    </li>
                </ul>
            </div>

            <a class="button" href="ad.php?id=<?php echo $property->id;?>">View property</a>
        </div> <!-- ads -->
    <?php }	?>
</div>
