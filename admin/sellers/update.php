<?php	
    require '../../includes/app.php';
    use App\Sellers;
    //Authenticate function to login
    isAuthenticate();

    //Validate that will be an id valid
    
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: /Project_RealEstates/admin');
    }
    //Obtain seller's array
    $seller = Sellers::find($id);
    //Array with errors messages
    $errors = Sellers::getErrors();
    
    //Run after the form is sumbitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Assign the values
        $args = $_POST['seller'];
        //Synchronize the object in memory with what the user wrote
        $seller->sincronize($args);

        //Validate
        $errors = $seller->validate();
        if(empty($errors)) {
            $seller->save();
        }
        
    }

    includeTemplate('header');
?>

<main class="container">
        <h1>Update Seller</h1>
        
        <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        <!-- (2) -->
        <form class="form" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/template/sellers_form.php'?>

            <div class="view-all-start">
                <input type="submit" value="Save changes">
                <a class="button_all-start" href="/Project_RealEstates/admin/index.php">Back</a>
            </div>
        </form> 
    </main>

<?php
    includeTemplate('footer');
?>