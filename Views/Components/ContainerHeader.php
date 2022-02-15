<?php

class ContainerHeader extends Block{

    private string $Name;

    private int $Size;

    public function __construct(string $name, int $size)
    {
        parent::__construct(true, false, false, false);
        $this->Name = $name;
        $this->Size = $size;
    }

    protected function GetStyle():string{
        return "container__header";
    }

    function MakeBody(): string
    {
        return "<h{$this->Size}>{$this->Name}</h{$this->Size}><div class=\"separator\"></div>";
    }
}
?>
