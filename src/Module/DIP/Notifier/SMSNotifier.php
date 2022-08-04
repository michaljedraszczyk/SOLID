<?php

namespace App\Module\DIP\Notifier;

use App\Module\DIP\Notifier\Vendor\SMSVendorSender;

class SMSNotifier implements NotifySenderInterface
{
    public function __construct(
        private SMSVendorSender $sender
    )
    {
    }

    public function sendNotification(array $data): bool
    {
        $recipient = $data['phone'];
        return $this->sender->send($recipient, $data);
    }
}
