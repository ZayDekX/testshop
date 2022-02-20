<?php

class ReviewCard extends Element
{
    public ReviewData $Data;

    function __construct(ReviewData $data)
    {
        $this->Data = $data;
    }

    private function MakeHeader(): Element
    {
        $header = new Element();

        ob_start();?>
        <div class="review-card__info">
            <span>
                <?=$this->Data->Username?>
            </span> 
            <span class="text-annotation">
                <?= date_format($this->Data->Date, "d.m.Y")?>
            </span>
        </div>

        <?php 

        return $header
            ->Wrapped()
            ->WithStyle('review-card__header')
            ->WithContent(array(ob_get_clean(), new Separator()));
    }

    private function MakeBody(): Element
    {
        $element = new Element();

        return 
        $element
            ->Wrapped()
            ->WithStyle('review-card__body')
            ->WithContent($this->Data->Text);
    }

    function Build():void{
        parent::Build();

        $this
            ->Wrapped()
            ->WithStyle('review-card')
            ->WithContent(array($this->MakeHeader(), $this->MakeBody()));
    }
}