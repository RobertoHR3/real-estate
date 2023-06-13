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
            //Check if user exists
            $query_user = "SELECT * FROM users WHERE email = '$email';";
            $result_user = mysqli_query($db, $query_user);

            
            if ($result_user->num_rows) {
                //If password is correct(12)
                $user = mysqli_fetch_assoc($result_user);
                $auth = password_verify($password, $user['password']);
                if ($auth) {
                    //User has been authenticated(13)
                    session_start();

                    //Fiil  session array 
                    $_SESSION['user'] = $user['email'];
                    $_SESSION['login'] = true;

                } else {
                    $errors[] = 'Incorrect password';
                }
            } else {
                $errors[] = 'No user exists';
            }
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