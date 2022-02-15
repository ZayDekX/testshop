<?php

abstract class Block
{    
    
    private bool $WrapSelf = true;

    private bool $WrapHeader = true;
    
    private bool $WrapBody = true;

    private bool $WrapFooter = true;
    
    protected function __construct(bool $wrapSelf, bool $wrapHeader, bool $wrapBody, bool $wrapFooter)
    {
        $this->WrapSelf = $wrapSelf;
        $this->WrapHeader = $wrapHeader;
        $this->WrapBody = $wrapBody;
        $this->WrapFooter = $wrapFooter;
    }

    protected function GetStyle(): string
    {
        return Block::GetStyleOf($this);
    }

    public static final function GetStyleOf(Block $block): string
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
    
    private function MakeBlock(string $body, bool $wrap = true, string $class = "") : string{
        ob_start();
        
        if($wrap){
            echo "<div";
            if($class) echo " class=\"{$class}\"";
            echo ">";
        } 
        echo $body;
        if($wrap) echo "</div>";

        return ob_get_clean();
    }

    function __toString()
    {
        $header = $this->MakeHeader();
        $body = $this->MakeBody();
        $footer = $this->MakeFooter();

        $style = $this->GetStyle();
        $elementStyle = Block::GetStyleOf($this);

        $headerClass = $style ? "{$elementStyle}__header" : "";
        $bodyClass = $style ? "{$elementStyle}__body" : "";
        $footerClass = $style ? "{$elementStyle}__footer" : "";

        $headerBlock = $this->MakeBlock($header, $this->WrapHeader, $headerClass);
        $bodyBlock = $this->MakeBlock($body, $this->WrapBody, $bodyClass);
        $footerBlock = $this->MakeBlock($footer, $this->WrapFooter, $footerClass);

        return $this->MakeBlock($headerBlock.$bodyBlock.$footerBlock, $this->WrapSelf, $style);
    }
}