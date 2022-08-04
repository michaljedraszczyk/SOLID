<?php

namespace App\Module\ISP\Repository\Before;

interface UserRepositoryInterface
{
    public function findByUsername();

    public function userExists();

    public function save();

    public function remove();
}
