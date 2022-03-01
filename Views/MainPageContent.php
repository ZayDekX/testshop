<?php

class MainPageContent extends Element
{
    private array $ProductData;
    private array $ReviewData;

    function __construct(array $productData, array $reviewData)
    {
        $this->ProductData = $productData;
        $this->ReviewData = $reviewData;
    }

    function Build(): void
    {
        $this->Wrapped()
            ->WithStyle('page-content')
            ->WithContent(
            new OrderModal(),
            new ProductsContainer($this->ProductData),
            new ReviewsContainer($this->ReviewData)
        );
    }
}