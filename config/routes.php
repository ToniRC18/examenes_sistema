<?php
use Cake\Routing\Route\DashedRoute;

return static function (\Cake\Routing\RouteBuilder $routes) {
    $routes->setRouteClass(DashedRoute::class);
    $routes->scope('/', function ($builder) {
        $builder->connect('/', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/dashboard', ['controller' => 'Pages', 'action' => 'dashboard']);
        $builder->fallbacks();
    });
};
