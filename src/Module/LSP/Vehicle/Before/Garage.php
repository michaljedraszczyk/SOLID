<?php

namespace App\Module\LSP\Vehicle\Before;

class Garage
{
    private array $vehicles = [];

    public function parkVehicle(Vehicle $vehicle)
    {
        $this->vehicles[] = $vehicle;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }
}
