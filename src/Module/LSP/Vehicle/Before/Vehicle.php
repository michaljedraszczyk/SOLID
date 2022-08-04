<?php

namespace App\Module\LSP\Vehicle\Before;

abstract class Vehicle
{
    abstract public function drive(): void;

    abstract public function fly(): void;
}
