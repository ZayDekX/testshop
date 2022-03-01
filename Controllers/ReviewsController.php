<?php

class ReviewsController extends Controller
{
    
    private mysqli $DbConnection;

    private const TableName = 'reviews';

    function __construct(mysqli $connection)
    {
        parent::__construct();
        $this->DbConnection = $connection;
    }

    function GetReviews(): array
    {
        $result = $this->DbConnection->query('SELECT * FROM ' . ReviewsController::TableName);
        $reviews = array();

        foreach ($result->fetch_all() as $arr) {
            $reviews[$arr[0]] = new ReviewData($arr[1], date_create($arr[2]), $arr[3]);
        }

        return $reviews;
    }

    #[HttpRequestHandler(HTTP_POST)]
    function make_review(string $review_username, string $review_text): string
    {
        if($this->DbConnection->query("INSERT INTO ". ReviewsController::TableName . ' (Username, Date, Text) VALUES '."('{$review_username}', CURDATE(), '{$review_text}')")){
            return 'review saved';
        }
        else 
        {
            return 'failed to save review';
        }
    }
}