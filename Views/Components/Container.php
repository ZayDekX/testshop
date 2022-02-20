<?php

include_once 'Element.php';

class Container extends Element
{
    private string $Name;

    function __construct(string $name)
    {
        $this->Name = $name;
    }

    protected function MakeHeader()
    {
        ob_start();?>
        <div class="container__header">
            <h2><?=$this->Name?></h2>
            <div class="separator"></div>
        </div>
        <?php return ob_get_clean();
    }

	protected function Build(): void {
        $this
            ->Wrapped()
            ->WithStyle('container')
            ->WithContent($this->MakeHeader());
	}
}