<?php

abstract class Container extends Block
{
    private string $Name;

    function __construct(string $name, bool $wrapSelf, bool $wrapHeader, bool $wrapBody, bool $wrapFooter)
    {
        parent::__construct($wrapSelf, $wrapHeader, $wrapBody, $wrapFooter);
        $this->Name = $name;
    }

    protected function GetStyle(): string
    {
        return "container " . parent::GetStyle();
    }

    public function MakeHeader(): string
    {
        return new ContainerHeader($this->Name, 2);
    }
}