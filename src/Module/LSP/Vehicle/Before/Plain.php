<?php

namespace App\Module\LSP\Vehicle\Before;

class Plain extends Vehicle
{
    public function drive(): void
    {
        echo "I can drive";
    }

    public function fly(): void
    {
        echo "I can fly";
    }
}
