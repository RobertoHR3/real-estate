<?php
    require 'includes/functions.php';
    includeTemplate('header');

?>

    <main class="about_head">
        <div class="container">
            <h1>About <span>us</span></h1>
        </div>

        <div class="image_container">
            <picture>
                <source srcset="build/img/about_head.avif" type="image/avif">
                <source srcset="build/img/about_head.webp" type="image/webp">
                <img loading="lazy" src="build/img/about_head.jpg" alt="about-image">
            </picture>
        </div>
        

        <div class="container about_info">
            <h2>Hi, we're Real Estate</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In sit quos corrupti cupiditate distinctio tempora assumenda labore nemo. Dignissimos voluptas cumque voluptates, dolores hic excepturi quam quisquam sapiente? Incidunt, temporibus Lorem ipsum, dolor sit amet consectetur adipisicing elit. In sit quos corrupti cupiditate distinctio tempora .</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta ad assumenda inventore unde rerum maxime debitis quo reprehenderit officiis iusto accusantium tenetur sit eveniet quasi, non perferendis voluptatem explicabo laboriosam.</p>
        </div>

        <div class="image_container image_grid">
            <picture>
                <source srcset="build/img/about_1.avif" type="image/avif">
                <source srcset="build/img/about_1.webp" type="image/webp">
                <img loading="lazy" src="build/img/about_1.jpg" alt="image-about">
            </picture>

            <picture>
                <source srcset="build/img/about_2.avif" type="image/avif">
                <source srcset="build/img/about_2.webp" type="image/webp">
                <img loading="lazy" src="build/img/about_2.jpg" alt="image-about">
            </picture>

            <picture>
                <source srcset="build/img/about_3.avif" type="image/avif">
                <source srcset="build/img/about_3.webp" type="image/webp">
                <img loading="lazy" src="build/img/about_3.jpg" alt="image-about">
            </picture>

            <picture>
                <source srcset="build/img/about_4.avif" type="image/avif">
                <source srcset="build/img/about_4.webp" type="image/webp">
                <img loading="lazy" src="build/img/about_4.jpg" alt="image-about">
            </picture>
        </div>

        <div class="container about_info">
            <h2>How we work</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In sit quos corrupti cupiditate distinctio tempora assumenda labore nemo. Dignissimos voluptas cumque voluptates, dolores hic excepturi quam quisquam sapiente? Incidunt, temporibus Lorem ipsum, dolor sit amet consectetur adipisicing elit. In sit quos corrupti cupiditate distinctio tempora .</p>
        </div>

    </main>

    <!-- <main class="container">
        <h1>About us</h1>

        <div class="about">
            <picture>
                <source srcset="build/img/nosotros.avif" type="image/avif">
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="about-image">
            </picture>

            <div class="about-info">
                <h3>25 Years Experience</h3>
                <p>Proin consequat viverra sapien, malesuada tempor tortor feugiat vitae. In dictum felis et nunc aliquet molestie. Proin tristique commodo felis, sed auctor elit auctor pulvinar. Nunc porta, nibh quis convallis sollicitudin, arcu nisl semper mi, vitae sagittis lorem dolor non risus. Vivamus accumsan maximus est, eu mollis mi. Proin id nisl vel odio semper hendrerit. Nunc porta in justo finibus tempor. Suspendisse lobortis dolor quis elit suscipit molestie. Sed condimentum, erat at tempor finibus, urna nisi fermentum est, a dignissim nisi libero vel est. Donec et imperdiet augue. Curabitur malesuada sodales congue. Suspendisse potenti. Ut sit amet convallis nisi.</p>

                <p>Aliquam lectus magna, luctus vel gravida nec, iaculis ut augue. Praesent ac enim lorem. Quisque ac dignissim sem, non condimentum orci. Morbi a iaculis neque, ac euismod felis. Fusce augue quam, fermentum sed turpis nec, hendrerit dapibus ante. Cras mattis laoreet nibh, quis tincidunt odio fermentum vel. Nulla facilisi.</p>
            </div>
        </div>

        <section class="we_icons-head">
            <h2>More About Us</h2>
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
        </section>
        
    </main> -->

    <?php
        includeTemplate('footer');
    ?>