<?php

class PageContent extends Block
{
    private array $ProductData;
    private array $ReviewData;

    function __construct(array $productData, array $reviewData)
    {
        parent::__construct(true, false, false, false);
        $this->ProductData = $productData;
        $this->ReviewData = $reviewData;
    }

    protected function MakeBody(): string
    {
        ob_start();?>
        <?=new ProductsContainer($this->ProductData)?>
        <?=new ReviewsContainer($this->ReviewData)?>

        <?php return ob_get_clean();
    }
}