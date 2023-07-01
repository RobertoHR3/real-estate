<?php	
    require '../../includes/app.php';
    use App\Sellers;
    //Authenticate function to login
    isAuthenticate();
    
    $seller = new Sellers;

    //Array with errors messages
    $errors = Sellers::getErrors();

    //Run after the form is sumbitted
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    }

    includeTemplate('header');
?>

<main class="container">
        <h1>Register Seller</h1>
        
        <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        <!-- (2) -->
        <form class="form" method="POST" action="/Project_RealEstates/admin/sellers/create.php" enctype="multipart/form-data">
            <?php include '../../includes/template/sellers_form.php'?>

            <div class="view-all-start">
                <input type="submit" value="Register seller">
                <a class="button_all-start" href="/Project_RealEstates/admin/index.php">Back</a>
            </div>
        </form> 
    </main>

<?php
    includeTemplate('footer');
?>