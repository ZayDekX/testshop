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

    public function WithStyle(string $style): Element
    {
        array_push($this->Styles, $style);
        return $this;
    }

    public function WithContent(string|array |null $content = null): Element
    {
        if (is_string($content)) {
            array_push($this->Content, $content);
        }
        elseif (is_array($content)) {
            $this->Content = array_merge($this->Content, $content);
        }
        return $this;
    }

    public function WithAttributes(string|array |null $attributes = null): Element
    {
        if (is_string($attributes)) {
            array_push($this->Attributes, $attributes);
        }
        elseif (is_array($attributes)) {
            $this->Attributes = array_merge($this->Attributes, $attributes);
        }
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