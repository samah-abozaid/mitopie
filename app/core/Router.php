<?php
namespace core;

class Router
{
    // Maps ?page= values to their controller class and default action
    private array $routes = [
        'accueil'  => ['controller' => 'controllers\HomeController',    'default' => 'index'],
        'produits' => ['controller' => 'controllers\ProductController', 'default' => 'index'],
        'histoire' => ['controller' => 'controllers\AboutController',   'default' => 'index'],
        'trouver'  => ['controller' => 'controllers\ContactController', 'default' => 'index'],
        'admin'    => ['controller' => 'controllers\AdminController',   'default' => 'login'],
    ];

    public function dispatch(): void
    {
        $page   = trim($_GET['page']   ?? 'accueil');
        $action = trim($_GET['action'] ?? '') ?: null;

        if (!isset($this->routes[$page])) {
            $page = 'accueil';
        }

        $route  = $this->routes[$page];
        $class  = $route['controller'];
        $method = $action ?: $route['default'];

        $ctrl = new $class();

        if (!method_exists($ctrl, $method)) {
            $method = $route['default'];
        }

        $ctrl->$method();
    }
}
