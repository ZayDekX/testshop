<?php

include_once __DIR__ . "/../utils.php";

//spl_autoload_register(function ($class){IncludeClass($class);});

IncludeDir("Models");
IncludeDir("Views/Components");
IncludeDir("Views");
IncludeDir("Controllers");

$pageController = new PageController();

echo $pageController->MakeView();