<?php

namespace App\Module\LSP\Vehicle\After;

class Plain extends FlyableAbstractVehicle
{
    public function drive(): void
    {
        echo 'drive logic';
    }

    public function fly(): void
    {
        echo 'fly logic';
    }
}
