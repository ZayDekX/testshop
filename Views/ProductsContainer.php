<?php

class ProductsContainer extends Container
{
    private array $ProductData;

    function __construct(array $products)
    {
        parent::__construct("Products");
        $this
        ->Wrapped()
        ->WithWrappedBody()
        ->WithWrappedFooter();

        $this->ProductData = $products;
    }

    function MakeBody(): string
    {
        ob_start();

        foreach ($this->ProductData as $data) {
            echo new ProductCard($data);
        }

        return ob_get_clean();
    }
}
