<!DOCTYPE html>
<?php

require "../Utils/Autoloader.php";

Autoloader::SetRoot(__DIR__ . '/..');
Autoloader::RegisterDirectories('/Utils', '/Models', '/Views', '/Controllers');

new MainPageController();
new OrderController();

Router::Handle();