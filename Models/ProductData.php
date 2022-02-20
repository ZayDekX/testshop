<?php

final class ProductData
{
    public int $Id;

    public string $Name;

    public int $Cost;

    public function __construct(int $id, string $name, int $cost)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->Cost = $cost;
    }
}