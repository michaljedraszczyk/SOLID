<?php

namespace App\Module\OCP\Exporter\Before\Exporter\Exporter;

interface ExporterInterface
{
    public function export(array $data): string;
}
