<?php

function Load(string $folder){
    foreach (glob(__DIR__."/{$folder}/*.php") as $filename)
    {
        include_once $filename;
    }
}

Load("Models");
Load("Views/Components");
Load("Views");

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    
    <header>

    </header>
    <body>
        <?= new PageContent()?>
    </body>
    <footer>

    </footer>
</html>