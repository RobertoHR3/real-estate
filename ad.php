<?php
    include './includes/templetes/header.php';
?>

    <main class="container content-centered">
        <h1>House for sale in front of the forest</h1>

        <picture>
            <source srcset="build/img/destacada.avif" type="image/avif">
            <source srcset="build/img/destacada.webp" type="image/webp">
            <img loading="lazy" src="build/img/destacada.jpg" alt="ad-image">
        </picture>

        <div class="property_summary">
            <p class="price">$ 3,000,000</p>
            <ul class="features-icons">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="wc-icon">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking-icon">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="bedroom-icon">
                    <p>4</p>
                </li>
            </ul>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In sit quos corrupti cupiditate distinctio tempora assumenda labore nemo. Dignissimos voluptas cumque voluptates, dolores hic excepturi quam quisquam sapiente? Incidunt, temporibus Lorem ipsum, dolor sit amet consectetur adipisicing elit. In sit quos corrupti cupiditate distinctio tempora .</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta ad assumenda inventore unde rerum maxime debitis quo reprehenderit officiis iusto accusantium tenetur sit eveniet quasi, non perferendis voluptatem explicabo laboriosam.</p>
        </div>
    </main>

    <?php
        include './includes/templetes/footer.php';
    ?>