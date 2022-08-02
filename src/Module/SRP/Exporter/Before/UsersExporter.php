<?php

namespace App\Module\SRP\Exporter\Before;

use Doctrine\DBAL\Connection;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UsersExporter
{
    public function __construct(
        private Connection $connection
    ) {
    }

    public function export()
    {
        return $this->outputCSV();
    }

    private function outputCSV(): string
    {
        $encoders = [new CsvEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->serialize($this->getData(), 'csv');
    }

    public function getData(): array
    {
        return $this->connection->fetchAllAssociative('SELECT * FROM users');
    }
}
