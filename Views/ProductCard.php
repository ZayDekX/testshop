<?php

class ProductCard extends Block
{
    public ProductData $Data;

    function __construct(ProductData $data)
    {
        $this
        ->Wrapped()
        ->WithWrappedBody()
        ->WithWrappedFooter();

        $this->Data = $data;
    }

    function MakeBody():string
    {
        return "<div class=\"placeholder\"></div>";
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
            <span>Buy</span>
        </div>
        
        <?php return ob_get_clean();
    }
}