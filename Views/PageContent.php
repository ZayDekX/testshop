<?php

class PageContent extends Block
{
    private array $ProductData;
    private array $ReviewData;

    function __construct()
    {
        parent::__construct(true, false, false, false);
        $this->ProductData = $this->GetProductData();
        $this->ReviewData = $this->GetReviewData();
    }

    private function GetReviewData()
    {
        return array(
            new ReviewData("User1", date_create(), "Test review text"),
            new ReviewData("User2", date_create(), "Test review text 2")
        );
    }

    private function GetProductData()
    {
        return array(
            new ProductData("Product", 100),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200),
            new ProductData("Product 2", 200));
    }


    protected function MakeBody(): string
    {
        ob_start();?>
        <?=new ProductsContainer($this->ProductData)?>
        <?=new ReviewsContainer($this->ReviewData)?>

        <?php return ob_get_clean();
    }
}