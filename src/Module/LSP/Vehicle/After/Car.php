<?php

namespace App\Module\LSP\Vehicle\After;

class Car extends AbstractVehicle
{
    public function drive(): void
    {
        echo 'drive logic';
    }
}
