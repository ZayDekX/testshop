<?php

class MainPage extends Block
{
    private PageController $Controller;

    function __construct(PageController $controller) {
        $this->Controller = $controller;
    }

    public function MakeBody():string
    {
        ob_start();?><!doctype html>
        <html>
        <head>
            <link rel="stylesheet" href="styles.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        
        <body>
            <header></header>
            <?=new PageContent($this->Controller->GetProducts(), $this->Controller->GetReviews())?>
            <footer></footer>
            <script src="page-scripts.js"></script>
        </body>
        </html><?php return ob_get_clean();   
    }
}
