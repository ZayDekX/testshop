<?php

class ProductCard extends Block
{
    public ProductData $Data;

    function __construct(ProductData $data)
    {
        parent::__construct(true, false, true, true);
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
        <div class="button--primary">
            <span>Buy</span>
        </div>
        <?php return ob_get_clean();
    }
}