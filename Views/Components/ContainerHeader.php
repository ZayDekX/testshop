<?php

class ContainerHeader extends Block
{

    private string $Name;

    private int $Size;

    public function __construct(string $name, int $size)
    {
        $this->Wrapped();

        $this->Name = $name;
        $this->Size = $size;
    }

    protected function GetStyleClass(): string
    {
        return "container__header";
    }

    function MakeBody(): string
    {
        return "<h{$this->Size}>{$this->Name}</h{$this->Size}><div class=\"separator\"></div>";
    }
}
?>
