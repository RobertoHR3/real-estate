<?php
    include './includes/templetes/header.php';
?>

    <main class="container blog-section">
        <h3>Our Blog</h3>
        <div class="blog-post">
            <div class="blog-post_img">
                <picture>
                    <source srcset="build/img/blog1.avif" type="image/avif">
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="blog-image">
                </picture>
            </div>
            <div class="blog-image_info">
                <div class="blog-post_date">
                    <span>Vanessa Hernandez</span>
                    <span>Sep 19 2023</span>
                </div>
                <h1 class="blog-post_title">Terrace on the roof of your home</h1>
                <p class="blog-post_text">Tips for building a rooftop terrace with the best materials and saving money</p>
            </div>
        </div>

        <div class="blog-post">
            <div class="blog-post_img">
                <picture>
                    <source srcset="build/img/blog2.avif" type="image/avif">
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="blog-image">
                </picture>
            </div>
            <div class="blog-image_info">
                <div class="blog-post_date">
                    <span>Roberto Hernandez</span>
                    <span>Nov 12 2023</span>
                </div>
                <h1 class="blog-post_title">Build a pool at home</h1>
                <p class="blog-post_text">Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
            </div>
        </div>

        <div class="blog-post">
            <div class="blog-post_img">
                <picture>
                    <source srcset="build/img/blog3.avif" type="image/avif">
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="blog-image">
                </picture>
            </div>
            <div class="blog-image_info">
                <div class="blog-post_date">
                    <span>Daniel Montes</span>
                    <span>May 31 2023</span>
                </div>
                <h1 class="blog-post_title">Home decorating guide</h1>
                <p class="blog-post_text">Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
            </div>
        </div>

        <div class="blog-post">
            <div class="blog-post_img">
                <picture>
                    <source srcset="build/img/blog4.avif" type="image/avif">
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <img loading="lazy" src="build/img/blog4.jpg" alt="blog-image">
                </picture>
            </div>
            <div class="blog-image_info">
                <div class="blog-post_date">
                    <span>Sael Montiel</span>
                    <span>Ene 27 2023</span>
                </div>
                <h1 class="blog-post_title">Bedroom decorating guide</h1>
                <p class="blog-post_text">Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
            </div>
        </div>
    </main>

    <?php
        include './includes/templetes/footer.php';
    ?>