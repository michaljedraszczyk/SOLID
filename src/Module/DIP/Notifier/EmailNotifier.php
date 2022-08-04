<?php

namespace App\Module\DIP\Notifier;

class EmailNotifier implements NotifySenderInterface
{
    public function sendNotification(array $data): bool
    {
        // email notification logic
        return true;
    }
}
