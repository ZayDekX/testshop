<?php

class MainPageController extends Controller
{
    private mysqli $DbConnection;

    private ProductsController $ProductsController;
    private ReviewsController $ReviewsController;

    function __construct()
    {
        parent::__construct();
        $this->DbConnection = $this->SetupDbConnection();

        $this->ProductsController = new ProductsController($this->DbConnection);
        $this->ReviewsController = new ReviewsController($this->DbConnection);
    }

    private function SetupDbConnection(): mysqli
    {
        $data = file_get_contents("../private/db_connection.json");
        $info = json_decode($data);

        return mysqli_connect($info->hostname, $info->username, $info->password, $info->database, $info->port);
    }

    #[HttpRequestHandler(HTTP_GET)]
    public function main(): string
    {
        return (new Page())->WithBody(new MainPageContent($this->ProductsController->GetProducts(), $this->ReviewsController->GetReviews()));
    }
}