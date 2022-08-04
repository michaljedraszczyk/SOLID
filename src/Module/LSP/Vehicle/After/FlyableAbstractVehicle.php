<?php

namespace App\Module\LSP\Vehicle\After;

abstract class FlyableAbstractVehicle extends AbstractVehicle
{
    abstract public function fly(): void;
}
