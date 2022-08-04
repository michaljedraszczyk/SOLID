<?php

namespace App\Module\DIP\Notifier;

class Handler
{
    public function __construct(
        private NotifySenderInterface $notifySender
    ) {
    }

    public function handle()
    {
        $data = [];

        $this->notifySender->sendNotification($data);
    }
}
