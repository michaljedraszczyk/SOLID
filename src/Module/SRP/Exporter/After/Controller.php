<?php

namespace App\Module\SRP\Exporter\After;

use App\Module\SRP\Exporter\After\Exporter\Exporter\ExporterInterface;
use App\Module\SRP\Exporter\After\Exporter\Repository\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function exportUsers(
        UserRepositoryInterface $userRepository,
        ExporterInterface $exporter
    )
    {
        $users = $userRepository->getUsers();

        $response = new Response();
        $response->setContent($exporter->export($users));
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="testing.csv"');

        return $response;
    }
}
