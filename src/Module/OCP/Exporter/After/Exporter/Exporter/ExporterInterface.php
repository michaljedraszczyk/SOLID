<?php

namespace App\Module\OCP\Exporter\After\Exporter\Exporter;

interface ExporterInterface
{
    public function export(array $data): string;
}
