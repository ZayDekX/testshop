<?php

class ReviewsContainer extends Container
{
    private array $ReviewData;

    function __construct(array $reviews)
    {
        parent::__construct("Reviews");
        $this->ReviewData = $reviews;
    }

    private function MakeBody(): Element
    {
        $body = new Element();

        $content = array();

        foreach ($this->ReviewData as $data) {
            array_push($content, new ReviewCard($data), new Separator());
        }

        return $body->Wrapped()
            ->WithStyle('container__body reviews-container__body')
            ->WithContent($content);
    }

    private function MakeFooter(): Element
    {
        $element = new Element;

        return
            $element->Wrapped()
            ->WithStyle('container__footer reviews-container__footer')
            ->WithContent(new ReviewInputForm());
    }

    protected function Build(): void
    {
        parent::Build();

        $this
            ->Wrapped()
            ->WithStyle('reviews-container')
            ->WithContent(array($this->MakeBody(), $this->MakeFooter()));
    }
}