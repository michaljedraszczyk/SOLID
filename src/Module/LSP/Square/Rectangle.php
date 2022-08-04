<?php

namespace App\Module\LSP\Square;

class Rectangle
{
    protected int $width;

    protected int $height;

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function area(): int
    {
        return $this->height * $this->width;
    }
}
