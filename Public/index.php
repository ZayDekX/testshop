<?php

require "../utils.php";

IncludeDir("Models");
IncludeDir("Views/Components");
IncludeDir("Views");
IncludeDir("Controllers");

$pageController = new MainPageController();

echo $pageController->RenderPage();