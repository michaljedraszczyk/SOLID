<?php

namespace App\Module\SRP\Exporter\After\Exporter\Exporter;

interface ExporterInterface
{
    public function export(array $data): string;
}
