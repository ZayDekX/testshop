<?php

class ReviewsContainer extends Container
{
    private array $ReviewData;

    function __construct(array $reviews)
    {
        parent::__construct("Reviews", true, false, true, true);
        $this->ReviewData = $reviews;
    }

    protected function MakeBody(): string
    {
        ob_start();

        foreach ($this->ReviewData as $data) {
            echo new ReviewCard($data);
            echo new Separator();
        }

        return ob_get_clean();
    }

    protected function MakeFooter(): string
    {
        return new ReviewInputForm();
    }
}