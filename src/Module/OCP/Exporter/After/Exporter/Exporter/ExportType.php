<?php

namespace App\Module\OCP\Exporter\After\Exporter\Exporter;

enum ExportType: string {
    case CSV = 'csv';
    case JSON = 'json';
}
