<?php
    //Import conection
    require 'includes/config/database.php';
    $db = dbConnection();

    //Authenticate user
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$email) {
            $errors[] = 'Email is required';
        }

        if (!$password) {
            $errors[] = 'Password is required';
        }

        if (empty($errors)) {
            # code...
        }

    }
    

    //Include header
    require 'includes/functions.php';
    includeTemplate('header');

?>
    <!-- Validate form (11) -->
    <main class="container content-centered">
        <h1>Login</h1>

        <?php foreach($errors as $error) { ?>
            <div class="alert error">
                <?php echo $error;?>
            </div>
        <?php }	?>
        <form class="form" method="POST" novalidate>
            <fieldset>
                <legend>Email & Password</legend>

                <label for="email">E-mail</label>
                <input name="email" id="email" type="email" placeholder="Your E-mail">

                <label for="password">Password</label>
                <input name="password" id="password" type="password" placeholder="Your Password">
            </fieldset>
            <input type="submit" value="login" class="button">
        </form>
    </main>

<?php
    includeTemplate('footer');
?>