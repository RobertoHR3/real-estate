<?php
    //Import conection
    require 'includes/config/database.php';
    $db = dbConnection();
    //Consult
    $query_ads = "SELECT * FROM properties LIMIT $limit";
    //Read a results
    $result_ads = mysqli_query($db, $query_ads);



?>

<div class="ads-container">
    
    <?php while($row_ads = mysqli_fetch_assoc($result_ads)) { ?>
        <div class="ads">
            <picture>
                <img loading="lazy" src="images/<?php echo $row_ads['image'];?>" alt="ads-image">
            </picture>
            <div class="a-content">
                <h3><?php echo $row_ads['title'];?></h3>
                <p><?php echo $row_ads['description'];?></p>
                <p class="price">$ <?php echo $row_ads['price'];?></p>
                <ul class="features-icons">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="wc-icon">
                        <p><?php echo $row_ads['wc'];?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking-icon">
                        <p><?php echo $row_ads['parking'];?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="bedroom-icon">
                        <p><?php echo $row_ads['rooms'];?></p>
                    </li>
                </ul>
            </div>

            <a class="button" href="ad.php?id=<?php echo $row_ads['id'];?>">View property</a>
        </div> <!-- ads -->
    <?php }	?>
</div>

<?php
	//Close conection
    mysqli_close($db);
?>