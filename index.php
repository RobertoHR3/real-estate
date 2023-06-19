<?php
    require 'includes/app.php';
    includeTemplate('header', $first = true);

?>
    <main class="container">
        <h1>About us</h1>

        <div class="we-icons">
            <div class="icon">
                <img src="build/img/icono1.svg" alt="image-icon" loading="lazy">
                <h3>Security</h3>
                <p>Eos aut a ut numquam non cum quo veniam voluptate, amet iusto cumque totam ab! Vitae necessitatibus totam dolores!</p>
            </div>

            <div class="icon">
                <img src="build/img/icono2.svg" alt="image-icon" loading="lazy">
                <h3>Price</h3>
                <p>Eos aut a ut numquam non cum quo veniam voluptate, amet iusto cumque totam ab! Vitae necessitatibus totam dolores!</p>
            </div>

            <div class="icon">
                <img src="build/img/icono3.svg" alt="image-icon" loading="lazy">
                <h3>Time</h3>
                <p>Eos aut a ut numquam non cum quo veniam voluptate, amet iusto cumque totam ab! Vitae necessitatibus totam dolores!</p>
            </div>
        </div>
    </main>

    <section class="container">
        <h2>Homes & Apartments for Sale</h2>

        <?php
            $limit = 3;
            include 'includes/template/ads.php';
        ?>

        <div class="view-all">
            <a class="button_all" href="ads.php">View All</a>
        </div>
    </section>

    <section class="image-contact"> 
        <h2>Find your dream house</h2>
        <p>Fill out the contact form and a consultant will contact you as soon as possible.</p>
        <a class="button-display" href="contact.php">Contact</a>
    </section>

    <section class="blog_grid">
        <div class="container blog-section">
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
                    <a href="blog.php" class="blog-post_cta">Read More</a>
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
                    <h1 class="blog-post_title">Home decorating guide</h1>
                    <p class="blog-post_text">Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
                    <a href="blog.php" class="blog-post_cta">Read More</a>
                </div>
            </div>

        </div>

        <!-- <section class="testimonials container">
            <h3>Testimonials</h3>
            <div class="testimonial">
                <blockquote>
                    The staff behaved in an excellent way, very good attention and the house they offered me meets all my expectations.
                </blockquote>
                <p>- Roberto Hernandez</p>
            </div>

            <div class="testimonial">
                <blockquote>
                    The staff behaved in an excellent way, very good attention and the house they offered me meets all my expectations.
                </blockquote>
                <p>- Roberto Hernandez</p>
            </div>
        </section> -->

        <section class="testimonial_head container">
            <h3>Testimonials</h3>
            <div class="testimonial_grid">
                <div class="testimonial_content">
                    <div class="image_test">
                        <picture>
                            <source srcset="build/img/woman.avif" type="image/avif">
                            <source srcset="build/img/woman.webp" type="image/webp">
                            <img loading="lazy" src="build/img/woman.jpg" alt="person-image">
                        </picture>
                    </div>

                    <div class="into_person">
                        <h4>Kate Bush</h4>
                        <blockquote>The staff behaved in an excellent way, very good attention and the house they offered me meets all my expectations.</blockquote>
                    </div>
                </div>

                <div class="testimonial_content">
                    <div class="image_test">
                        <picture>
                            <source srcset="build/img/man.avif" type="image/avif">
                            <source srcset="build/img/man.webp" type="image/webp">
                            <img loading="lazy" src="build/img/man.jpg" alt="person-image">
                        </picture>
                    </div>
                    
                    <div class="into_person">
                        <h4>Robert Shuster</h4>
                        <blockquote>The staff behaved in an excellent way, very good attention and the house they offered me meets all my expectations.</blockquote>
                    </div>
                </div>
            </div>
        </section>
    
    </section>
    


        <!-- <section class="blog">
            <h3>Our Blog</h3>
        

            <article class="blog-entry">
                <div class="image">
                    <picture>
                        <source srcset="build/img/blog1.avif" type="image/avif">
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="blog-image">
                    </picture>
                </div>

                <div class="text-entry">
                    <a href="#"><h4>Terrace on the roof of your home</h4></a>
                    <p>Written on: <span>20/10/2023</span> by: <span>Admin</span></p>
                    <p>Tips for building a rooftop terrace with the best materials and saving money</p>
                </div>
            </article>

            <article class="blog-entry">
                <div class="image">
                    <picture>
                        <source srcset="build/img/blog2.avif" type="image/avif">
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="blog-image">
                    </picture>
                </div>

                <div class="text-entry">
                    <a href="#"><h4>Home decorating guide</h4></a>
                    <p>Written on: <span>20/10/2023</span> by: <span>Admin</span></p>
                    <p>Maximize the space in your home with this guide, learn how to combine furniture and colors to give life to your space.</p>
                </div>
            </article>
        </section> Design_1 -->



        
    </div>

<?php
    includeTemplate('footer');
?>