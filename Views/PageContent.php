<?php

class PageContent extends Block
{
    private array $ProductData;
    private array $ReviewData;

    function __construct(array $productData, array $reviewData)
    {
        $this->Wrapped();

        $this->ProductData = $productData;
        $this->ReviewData = $reviewData;
    }

    protected function MakeBody(): string
    {
        return new ProductsContainer($this->ProductData) .
            new ReviewsContainer($this->ReviewData);
    }
}