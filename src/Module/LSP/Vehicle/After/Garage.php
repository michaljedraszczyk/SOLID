<?php

namespace App\Module\LSP\Vehicle\After;

class Garage
{
    private array $vehicles = [];

    public function parkVehicle(AbstractVehicle $vehicle)
    {
        $this->vehicles[] = $vehicle;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }
}
