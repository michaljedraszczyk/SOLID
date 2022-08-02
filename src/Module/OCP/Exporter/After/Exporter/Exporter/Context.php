<?php

namespace App\Module\OCP\Exporter\After\Exporter\Exporter;

use RuntimeException;

class Context
{
    public static function getExporter(?ExportType $type = null): ExporterInterface
    {
        return match ($type) {
            ExportType::CSV => new CSVExporter(),
            ExportType::JSON => new JsonExporter(),
            null => throw new RuntimeException("Unsupported export type.")
        };
    }
}
