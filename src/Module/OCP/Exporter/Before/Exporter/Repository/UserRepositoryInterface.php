<?php

namespace App\Module\OCP\Exporter\Before\Exporter\Repository;

interface UserRepositoryInterface
{
    public function getUsers(): array;
}
