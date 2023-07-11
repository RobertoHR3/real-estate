<?php	
    require_once __DIR__ . 'Project_RealEstates/../includes/app.php';

    use MVC\Router;

    $router = new Router();

    $router->get('/ours', 'function_ours');
    $router->get('/admin', 'function_ours');
    $router->checkUrl();
?>
