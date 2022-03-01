<?php

class ProductsContainer extends Container
{
    private array $ProductData;

    function __construct(array $products)
    {
        $this->ProductData = $products;
        parent::__construct("Products");
    }

    function MakeBody(): Element
    {
        $body = new Element();

        $content = array();

        foreach ($this->ProductData as $data) {
            array_push($content, new ProductCard($data));
        }

        return $body->Wrapped()
            ->WithStyle('container__body')
            ->WithContent(...$content);
    }

    protected function Build(): void
    {
        parent::Build();

        $this
            ->Wrapped()
            ->WithStyle('products-container')
            ->WithContent($this->MakeBody());
    }
}
