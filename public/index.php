<?php	
    require_once __DIR__ . '/../includes/app.php';

    use MVC\Router;
    use Controllers\PropertyController;
    $propertyControll = new PropertyController();

    $router = new Router();
    $router->get('/admin', [$propertyControll::class, 'index']);
    $router->get('/properties/create', [$propertyControll::class, 'create']);
    $router->get('/properties/update', [$propertyControll::class, 'update']);
    $router->checkUrl();
?>