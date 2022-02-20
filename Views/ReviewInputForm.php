<?php

class ReviewInputForm extends Element
{
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
        ob_start()?> 
            <div class="button--primary">Save Review</div>
        <?php return ob_get_clean();
    }

    function Build(): void
    {
        $this->Wrapped()
            ->WithStyle('review-input-form')
            ->WithContent(array($this->MakeHeader(), $this->MakeBody(), $this->MakeFooter()));
    }
}