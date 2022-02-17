<?php

include_once 'Element.php';

abstract class Block extends Element
{
    private bool $WrapSelf = false;

    private bool $WrapHeader = false;

    private bool $WrapBody = false;

    private bool $WrapFooter = false;

    private string|null $AdditionalAttributes = null;

    function __construct()
    {
        parent::__construct('div');
    }

    protected final function WithWrappedHeader(): Block
    {
        $this->WrapHeader = true;
        return $this;
    }

    protected final function WithWrappedBody(): Block
    {
        $this->WrapBody = true;
        return $this;
    }

    protected final function WithWrappedFooter(): Block
    {
        $this->WrapFooter = true;
        return $this;
    }

    protected function GetStyleClass(): string
    {
        return Block::GetStyleClassOf($this);
    }

    public static final function GetStyleClassOf(Block $block): string
    {
        return Block::GetStyleFor(get_class($block));
    }

    public static final function GetStyleFor(string $className): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $className));
    }

    protected function MakeBody(): string
    {
        return "";
    }

    protected function MakeHeader(): string
    {
        return "";
    }

    protected function MakeFooter(): string
    {
        return "";
    }

    private function MakeBlock(string $body, bool $wrap = true, string $class = ""): string
    {
        if (!$body)
            return '';
        ob_start();

        if ($wrap) {
            echo '<div';
            if ($class)
                echo ' class="', $class, '"';
            echo '>';
        }
        echo $body;
        if ($wrap)
            echo '</div>';

        return ob_get_clean();
    }

    protected final function Build():string
    {
        $class = $this->GetStyleClass();
        $elementStyle = Block::GetStyleClassOf($this);

        $this->WithStyle($class.' '.$elementStyle);

        $headerElement = new Element('div', $this->WrapHeader, $class.'__header',$this->MakeHeader());
        $bodyElement = new Element('div', $this->WrapBody, $class.'__body',$this->MakeBody());
        $footerElement = new Element('div', $this->WrapFooter, $class.'__footer',$this->MakeFooter());
        
        $this->WithContent($headerElement.$bodyElement.$footerElement);

        return parent::Build();

        //return $this->MakeBlock($headerBlock . $bodyBlock . $footerBlock, $this->WrapSelf, $class . $this->AdditionalAttributes);
    }
}