<?php

class PageController
{
    private mysqli $DbConnection;

    function __construct()
    {
        $this->DbConnection = $this->SetupDbConnection();
    }

    private function SetupDbConnection() : mysqli
    {
        $data = file_get_contents(__DIR__."/../private/db_connection.json");
        $info = json_decode($data);
        
        return mysqli_connect($info->hostname, $info->username, $info->password, $info->database, $info->port);
    }
    
    private function GetProducts(): array
    {
        $result = $this->DbConnection->query("SELECT * FROM `products`");
        $products = array();

        foreach($result->fetch_all() as $arr)
        {
            $products[$arr[0]] = new ProductData($arr[1], $arr[2]);
        }

        return $products;
    }

    private function GetReviews(): array
    {
        $result = $this->DbConnection->query("SELECT * FROM `reviews`");
        $reviews = array();

        foreach($result->fetch_all() as $arr)
        {
            $reviews[$arr[0]] = new ReviewData($arr[1], date_create($arr[2]), $arr[3]);
        }

        return $reviews;
    }

    public function MakeView(): string
    {
        ob_start();?>
        
        <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles.css">
        </head>

        <header>

        </header>
        <body>
            <?= new PageContent($this->GetProducts(), $this->GetReviews())?>
        </body>
        <footer>

        </footer>
        </html>

        <?php return ob_get_clean();
    }
}