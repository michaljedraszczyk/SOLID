<?php

namespace App\Module\ISP\Repository\After;

interface UserProviderInterface
{
    public function findByUsernameOrEmail();
}
