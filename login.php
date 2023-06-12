<?php
    require 'includes/functions.php';
    includeTemplate('header');

?>

    <main class="container content-centered">
        <h1>Login</h1>

        <form class="form">
            <fieldset>
                <legend>Email & Password</legend>

                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Your E-mail">

                <label for="password">Password</label>
                <input id="password" type="password" placeholder="Your Password">
            </fieldset>
            <input type="submit" value="login" class="button">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>