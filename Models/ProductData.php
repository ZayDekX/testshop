<?php

final class ProductData
{
    public string $Name;

    public int $Cost;

    public function __construct(string $name, int $cost)
    {
        $this->Name = $name;
        $this->Cost = $cost;
    }
}