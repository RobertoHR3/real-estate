<?php
    
    //14
    if (!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700;900&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Project_RealEstates/build/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="header <?php echo $first ? 'first': '';?>">
        <div class="container header-content">
            <div class="barra">
                <a href="/Project_RealEstates/index.php">
                    <h2>Real<span>Estate</span></h2>
                </a>

                <div class="mobile-menu">
                    <img src="/Project_RealEstates/build/img/barras.svg" alt="icon-barra">
                </div>
                
                <div class="right">
                    <img class="dark-mode-button" src="/Project_RealEstates/build/img/dark-mode.svg" alt="image-button">
                    <nav class="browsing">
                        <a href="/Project_RealEstates/about.php">About</a>
                        <a href="/Project_RealEstates/ads.php">Ads</a>
                        <a href="/Project_RealEstates/blog.php">Blog</a>
                        <a href="/Project_RealEstates/contact.php">Contact</a>
                        <?php   if($auth) {	?>
                            <a href="/Project_RealEstates/log-out.php">Log out</a>
                        <?php } ?>
                    </nav>
                </div>
                
            </div>

            <?php
                if ($first) { ?>
            <h1>Houses and Apartments for sale <span>Exclusive luxury</span></h1>
            <?php } ?>
        </div>
    </header>