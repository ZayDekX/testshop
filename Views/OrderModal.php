<?php

class OrderModal extends Element
{
    protected function Build(): void
    {
        $form = new Form('order', 'Make order');

        $form
            ->WithAttributes(...[
            'id' => 'order-form',
            'method' => 'post',
            'action' => 'create_order'])
            ->WithStyle('modal-content')
            ->WithInputs([
            'Name' => 'text',
            'Address' => 'text',
            'Phone' => 'tel',
            'E-mail' => 'email'
        ]);

        $this->Wrapped()
            ->WithStyle('modal modal--hidden')
            ->WithAttributes(...['id' => 'order-modal'])
            ->WithContent($form);
    }
}