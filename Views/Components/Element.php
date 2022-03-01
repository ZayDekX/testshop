<?php

class Element
{
    private bool $Wrapped = false;

    private array $Styles = array();

    private string $Tag = '';

    private array $Content = array();

    private array $Attributes = array();

    public function Wrapped(string $tag = 'div'): Element
    {
        $this->Tag = $tag;
        $this->Wrapped = true;
        return $this;
    }

    public function WithStyle(string...$styles): Element
    {
        $this->Styles = array_merge($this->Styles, $styles);
        return $this;
    }

    public function WithContent(Element|string...$content): Element
    {
        $this->Content = array_merge($this->Content, $content);
        return $this;
    }

    public function WithAttributes(string...$attributes): Element
    {
        $this->Attributes = array_merge($this->Attributes, $attributes);
        return $this;
    }

    public function WithAttribute(string $key, string $value): Element
    {
        $this->Attributes[$key] = $value;
        return $this;
    }

    private function Render(): string
    {
        ob_start();

        if ($this->Wrapped) {
            echo '<', $this->Tag;

            $styles = trim(join(' ', $this->Styles));

            if ($styles) {
                echo ' ', 'class="', $styles, '"';
            }

            if ($this->Attributes) {
                foreach ($this->Attributes as $name => $value) {
                    echo ' ', trim($name), '="', trim($value), '"';
                }
            }

            echo '>', PHP_EOL;
        }

        if (is_array($this->Content)) {
            foreach ($this->Content as $item) {
                echo $item, PHP_EOL;
            }
        }

        if ($this->Wrapped) {
            echo '</', $this->Tag, '>', PHP_EOL;
        }

        return ob_get_clean();
    }

    protected function Build(): void
    {

    }

    public final function __toString()
    {
        $this->Build();
        return $this->Render();
    }
}