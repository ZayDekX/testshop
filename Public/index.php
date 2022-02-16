<?php

include_once __DIR__."/../utils.php";

Load("Models");
Load("Views/Components");
Load("Views");
Load("Controllers");

$pageController = new PageController();

echo $pageController->MakeView();