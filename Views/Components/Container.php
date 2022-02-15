<?php

abstract class Container extends Block
{
    private string $Name;

    function __construct(string $name)
    {
        parent::__construct(true, false, true, false);
        $this->Name = $name;
    }

    protected function GetStyle(): string
    {
        return "container ".parent::GetStyle();
    }

    public function MakeHeader(): string
    {
        return new ContainerHeader($this->Name, 2);
    }
}