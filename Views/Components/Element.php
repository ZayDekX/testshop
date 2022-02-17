<?php

class Element
{
    private bool $Wrapped;

    private string|null $Style;

    private string $Tag;

    private Element|string|null $Content;

    public function __construct(string $tag = '', bool $wrapped = false, $style = null, Element|string|null $content = null)
    {
        $this->Tag = $tag;
        $this->Wrapped = $wrapped;
        $this->Style = $style;
        $this->Content = $content;
    }

    public function Wrapped(): Element
    {
        $this->Wrapped = true;
        return $this;
    }

    public function WithStyle(string $style): Element
    {
        $this->Style = $style;
        return $this;
    }

    public function WithContent(Element|string $content): Element
    {
        $this->Content = $content;
        return $this;
    }

    protected function Build(): string
    {
        ob_start();

        if ($this->Wrapped) {
            echo '<', $this->Tag;

            if ($this->Style) {
                echo ' ', 'class="', $this->Style, '"';
            }

            echo '>', PHP_EOL;
        }

        echo $this->Content, PHP_EOL;

        if ($this->Wrapped) {
            echo '</', $this->Tag, '>', PHP_EOL;
        }

        return ob_get_clean();
    }

    public final function __toString()
    {
        return $this->Build();
    }
}