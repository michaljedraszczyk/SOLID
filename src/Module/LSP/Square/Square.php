<?php

namespace App\Module\LSP\Square;

class Square extends Rectangle
{
    public function setHeight(int $value): void
    {
        $this->width = $value;
        $this->height = $value;
    }

    public function setWidth(int $value): void
    {
        $this->width = $value;
        $this->height = $value;
    }
}
