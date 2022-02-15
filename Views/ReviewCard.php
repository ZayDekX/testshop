<?php

class ReviewCard extends Block
{
    public ReviewData $Data;

    function __construct(ReviewData $data)
    {
        parent::__construct(true, true, true, false);
        $this->Data = $data;
    }

    protected function MakeHeader(): string
    {
        ob_start();?>
        <div class="review-card__info">
            <span>
                <?=$this->Data->Username?>
            </span> 
            <span class="text-annotation">
                <?= date_format($this->Data->Date, "d.m.Y")?>
            </span>
        </div>
        <?=new Separator()?>

        <?php return ob_get_clean();
    }

    protected function MakeBody(): string
    {
        return $this->Data->Text;
    }
}