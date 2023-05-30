<?php
    include './includes/templetes/header.php';
?>

    <main class="container">
        <h1>Contact</h1>

        <picture>
            <source srcset="build/img/destacada3.avif" type="image/avif">
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="contact-image">
        </picture>

        <h2>Fill out the contact form</h2>

        <form class="form">
            <fieldset>
                <legend>Personal Information</legend>

                <label for="name">Name</label>
                <input id="name" type="text" placeholder="Your Name">

                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Your E-mail">

                <label for="phone">Phone</label>
                <input id="phone" type="tel" placeholder="Your Phone">

                <label for="message">Message</label>
                <textarea id="message"></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Information</legend>

                <label for="options">Buy or Sell</label>
                <select id="options">
                    <option value="" disabled selected>-- Choose --</option>
                    <option value="Buy">Buy</option>
                    <option value="Sell">Sell</option>
                </select>

                <label for="price">Price or Budget</label>
                <input id="price" type="number" placeholder="Your price or budget">

            </fieldset>

            <fieldset>
                <legend>Contact</legend>
                <p>How would you like to be contacted</p>
                <div class="contact-form">
                    <label for="phone-contact">Phone</label>
                    <input name="contact" type="radio" value="phone" id="phone-contact">

                    <label for="email-contact">E-mail</label>
                    <input name="contact" type="radio" value="email" id="email-contact">
                </div>

                <p>If you chose phone, select date and time</p>
                <label for="date">Date</label>
                <input id="date" type="date">

                <label for="time">Time</label>
                <input id="time" type="time" min="09:00" max="06:00">
            </fieldset>

            <input type="submit" value="Send">
        </form>
    </main>

    <footer>
        <div class="footer-content">
            <h3>Real Estate</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis commodi quia iusto porro libero.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
            
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2023 RealEstate. designed by <span>Roberto</span></p>
        </div>
    </footer>
    <script src="build/js/modernizr.js"></script>
    <script src="build/js/app.js"></script>
</body>
</html>