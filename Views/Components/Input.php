<?php

class Input extends Element
{

    private string $Type = 'text';

    private string $Pattern = '';

    private string $Name = '';

    private string $FormName;

    private static array $Patterns
         = array(
        'email' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$',
        'tel' => '\+7\d{10}'
    );

    function __construct(string $id, string $type, string $formName)
    {
        $this->Type = $type;
        $this->Name = $id;
        $this->FormName = $formName;

        if (array_key_exists($type, Input::$Patterns)) {
            $this->Pattern = Input::$Patterns[$type];
        }
    }

    protected function Build(): void
    {
        $this->Wrapped('input')
            ->WithAttribute('type', $this->Type)
            ->WithAttribute('form', $this->FormName . '-form');

        if ($this->Pattern) {
            $this->WithAttribute('pattern', $this->Pattern);
        }

        if ($this->Type != 'button' && $this->Type != 'submit') {
            $this
                ->WithAttribute('placeholder', $this->Name)
                ->WithAttribute('name', strtolower($this->FormName . '_' . $this->Name));
        }
    }
}