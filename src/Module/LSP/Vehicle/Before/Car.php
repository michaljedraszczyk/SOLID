<?php

namespace App\Module\LSP\Vehicle\Before;

use RuntimeException;

class Car extends Vehicle
{
    public function drive(): void
    {
        echo "I can drive";
    }

    public function fly(): void
    {
        throw new RuntimeException("Only plains can fly.");
    }
}
