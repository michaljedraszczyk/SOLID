<?php

namespace App\Module\LSP\Vehicle\Before;

class Program
{
    public function init(): void
    {
        $garage = new Garage();
        $garage->parkVehicle(new Car());
        $garage->parkVehicle(new Plain());

        foreach ($garage->getVehicles() as $vehicle) {
            $vehicle->drive();
            $vehicle->fly(); // Car can not fly will return exception, breaking LSP.
        }
    }
}
