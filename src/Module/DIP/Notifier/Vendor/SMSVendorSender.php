<?php

namespace App\Module\DIP\Notifier\Vendor;

class SMSVendorSender
{
    public function send(string $recipient, array $data): bool
    {
        // logic
        return true;
    }
}
