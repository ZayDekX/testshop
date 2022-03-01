<?php

class ProductsController extends Controller
{
    private mysqli $DbConnection;

    function __construct(mysqli $connection)
    {
        $this->DbConnection = $connection;
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
}