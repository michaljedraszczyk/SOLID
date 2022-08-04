<?php

namespace App\Module\ISP\Repository\After;

interface UserCheckerInterface
{
    public function userExists(string $username);
}
