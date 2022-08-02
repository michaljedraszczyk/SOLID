<?php

namespace App\Module\OCP\Exporter\Before;

use App\Module\OCP\Exporter\Before\Exporter\Exporter\ExporterInterface;
use App\Module\OCP\Exporter\Before\Exporter\Repository\UserRepositoryInterface;
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
