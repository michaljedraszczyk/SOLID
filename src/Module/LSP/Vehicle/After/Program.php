<?php

namespace App\Module\LSP\Vehicle\After;

class Program
{
    public function init(): void
    {
        $garage = new Garage();
        $garage->parkVehicle(new Car());
        $garage->parkVehicle(new Plain());

        foreach ($garage->getVehicles() as $vehicle) {
            $vehicle->drive(); // method fly is not needed by garage, it is ok to have just drive method.
        }
    }
}
