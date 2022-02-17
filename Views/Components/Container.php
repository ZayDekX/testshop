<?php

abstract class Container extends Block
{
    private string $Name;

    function __construct(string $name)
    {
        $this->Name = $name;
    }

    protected function GetStyleClass(): string
    {
        return 'container ' . parent::GetStyleClass();
    }

    public function MakeHeader(): string
    {
        return new ContainerHeader($this->Name, 2);
    }
}