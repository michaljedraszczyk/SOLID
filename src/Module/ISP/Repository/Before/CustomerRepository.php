<?php

namespace App\Module\ISP\Repository\Before;

class CustomerRepository implements UserRepositoryInterface
{
    public function findByUsername()
    {
        throw new \Exception('Customer dont have username');
    }

    public function findByEmail()
    {
        // TODO: Implement findByEmail() method.
    }

    public function userExists()
    {
        // TODO: Implement userExists() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }
}
