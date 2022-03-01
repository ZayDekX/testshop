<?php

class Router
{
    private static array $Routes = [];

    public static function Register(string $method, string $action, string $controllerClass): void
    {
        if (!$action) {
            $action = 'main';
        }

        Router::$Routes[$action][$method] = $controllerClass;
    }

    private static array $Handlers = [];

    public static function AddHandler(Controller $handler): void
    {
        $class = get_class($handler);

        if (array_key_exists($class, static::$Handlers)) {
            return;
        }

        static::$Handlers[$class] = $handler;
    }

    public static function Handle(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $action = trim($_SERVER['REQUEST_URI'], '/');

        if (!$action) {
            $action = 'main';
        }

        if (!array_key_exists($action, Router::$Routes)) {
            return;
        }

        $handlers = Router::$Routes[$action];

        if (!array_key_exists($method, $handlers)) {
            return;
        }

        $handlerClass = $handlers[$method];

        $handler = static::$Handlers[$handlerClass];

        echo $handler->$action(...$_REQUEST);
    }
}
