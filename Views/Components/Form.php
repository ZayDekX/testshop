<?php

class Form extends Element
{
    private array $Inputs = array();

    private string $Name;

    private string $SubmitText;

    public function __construct(string $name, string $submitText)
    {
        $this->Name = strtolower($name);
        $this->SubmitText = $submitText;
    }

    public final function WithInputs(array $inputs): Form
    {
        $this->Inputs = array_merge($this->Inputs, $inputs);
        return $this;
    }

    protected function Build(): void
    {
        $inputs = array();

        foreach ($this->Inputs as $id => $type) {
            $input = new Input($id, $type, $this->Name);

            array_push($inputs, $input);
        }

        $button = new Input('make-order-button', 'submit', $this->Name);
        $button->WithStyle('button--primary')
            ->WithAttribute('value', $this->SubmitText);

        array_push($inputs, $button);

        $this->Wrapped('form')
            ->WithStyle($this->Name . '-form')
            ->WithContent(...$inputs);
    }
}