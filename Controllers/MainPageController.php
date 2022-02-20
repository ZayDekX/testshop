<?php

class MainPageController
{
    private mysqli $DbConnection;

    function __construct()
    {
        $this->DbConnection = $this->SetupDbConnection();
    }

    private function SetupDbConnection(): mysqli
    {
        $data = file_get_contents("../private/db_connection.json");
        $info = json_decode($data);

        return mysqli_connect($info->hostname, $info->username, $info->password, $info->database, $info->port);
    }

    function GetProducts(): array
    {
        $result = $this->DbConnection->query("SELECT * FROM `products`");
        $products = array();

        foreach ($result->fetch_all() as $arr) {
            $products[$arr[0]] = new ProductData($arr[0], $arr[1], $arr[2]);
        }

        return $products;
    }

    function GetReviews(): array
    {
        $result = $this->DbConnection->query("SELECT * FROM `reviews`");
        $reviews = array();

        foreach ($result->fetch_all() as $arr) {
            $reviews[$arr[0]] = new ReviewData($arr[1], date_create($arr[2]), $arr[3]);
        }

        return $reviews;
    }

    public function RenderPage(): string
    {
        $page = new Page();
        $page->WithBody(new PageContent($this->GetProducts(), $this->GetReviews()));
        return $page;
    }
}