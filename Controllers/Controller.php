<?php

abstract class Controller
{
    function __construct()
    {
        $classInfo = new ReflectionClass($this);

        $methods = $classInfo->getMethods();
        $methods = array_filter($methods, fn(ReflectionMethod $m) => count($m->getAttributes(HttpRequestHandler::class)) > 0);

        if (!$methods) {
            return;
        }

        Router::AddHandler($this);

        foreach ($methods as $method) {
            $attribute = $method->getAttributes(HttpRequestHandler::class)[0]->newInstance();

            Router::Register($attribute->GetHttpMethod(), $method->getName(), $classInfo->getName());
        }
    }
}