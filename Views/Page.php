<?php

class Page extends Element
{
    private function MakeHead(): string
    {
        ob_start();?>
    <head>
        <link rel="stylesheet" href="styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
        <?php return ob_get_clean();
    }

    private function MakeBody(): string
    {
        ob_start();?>
        <body>
            <header></header>
            <?=$this->BodyContent?>
            <footer></footer>
            <script src="page-scripts.js"></script>
        </body>
        <?php return ob_get_clean();
    }

    private Element|null $BodyContent = null;

    public final function WithBody(Element|string ...$content): Page
    {
        if(!$this->BodyContent && is_array($content))
        {
            $this->BodyContent = new Element();
            $this->BodyContent->WithContent(...$content);
        }
        else
        {
            $this->BodyContent = $content;
        }

        return $this;
    }

    protected final function Build() : void
    {
        $this
            ->Wrapped('html')
            ->WithContent($this->MakeHead(), $this->MakeBody());
    }
}
