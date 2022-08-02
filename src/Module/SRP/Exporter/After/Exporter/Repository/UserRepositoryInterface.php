<?php

namespace App\Module\SRP\Exporter\After\Exporter\Repository;

interface UserRepositoryInterface
{
    public function getUsers(): array;
}
