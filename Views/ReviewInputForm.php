<?php

class ReviewInputForm extends Block
{
    function __construct()
    {
        parent::__construct(true, true, false, false);
    }

    protected function MakeHeader(): string
    {
        return '<h3>Leave a review</h3>';
    }

    protected function MakeBody(): string
    {
        ob_start(); ?>
        
        <textarea rows="5" cols="60" name="text" placeholder="Enter text"></textarea>
        <?php return ob_get_clean();
    }

    protected function MakeFooter(): string
    {
        return '<div class="button--primary">Save Review</div>';
    }
}