<?php

class ProductCard extends Element
{
    public ProductData $Data;

    function __construct(ProductData $data)
    {
        $this->Data = $data;
    }

    function MakeBody():string
    {
        $body = new Element();
        
        return $body
            ->Wrapped()
            ->WithStyle('product-card__body')
            ->WithContent("<div class=\"placeholder\"></div>");
    }

    protected function MakeFooter(): string
    {
        ob_start();?>

        <div class="product-card__info">
            <span>
                <?=$this->Data->Name?>
            </span> 
            <span class="text-annotation">
                <?=$this->Data->Cost?>
            </span>
        </div>
        <div class="button--primary" onclick="openOrderModalDialog(<?=$this->Data->Id?>)">
            <span>Order</span>
        </div>
        
        <?php 

        $footer = new Element();
        
        return $footer
            ->Wrapped()
            ->WithStyle('product-card__footer')
            ->WithContent(ob_get_clean());
    }

    function Build():void{
        $this
            ->Wrapped()
            ->WithStyle('product-card')
            ->WithContent($this->MakeBody(), $this->MakeFooter());
    }
}