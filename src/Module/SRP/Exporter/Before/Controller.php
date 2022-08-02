<?php

namespace App\Module\SRP\Exporter\Before;

use Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function exportUsers(
        UsersExporter $exporter
    )
    {
        $users = $exporter->export();

        $response = new Response();
        $response->setContent($users);
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="testing.csv"');

        return $response;
    }
}
