<?php

namespace App\Module\DIP\Notifier;

interface NotifySenderInterface
{
    public function sendNotification(array $data): bool;
}
