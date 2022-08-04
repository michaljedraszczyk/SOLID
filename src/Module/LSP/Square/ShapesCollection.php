<?php

namespace App\Module\LSP\Square;

class ShapesCollection
{
    private array $shapes = [];

    public function addShape(Rectangle $shape)
    {
        $this->shapes[] = $shape;
    }

    public function getShapes(): array
    {
        return $this->shapes;
    }

}
