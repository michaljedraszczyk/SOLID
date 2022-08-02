<?php

namespace App\Module\OCP\Exporter\After;

use App\Module\OCP\Exporter\After\Exporter\Exporter\Context;
use App\Module\OCP\Exporter\After\Exporter\Exporter\ExportType;
use App\Module\SRP\Exporter\After\Exporter\Repository\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function exportUsers(
        string $exportType,
        UserRepositoryInterface $userRepository
    )
    {
        $CSVExporter = Context::getExporter(ExportType::tryFrom($exportType));
        $users = $userRepository->getUsers();

        $response = new Response();
        $response->setContent($CSVExporter->export($users));
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="testing.csv"');

        return $response;
    }
}
