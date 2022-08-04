<?php

namespace App\Module\ISP\Repository\After;

interface StorageInterface
{
    public function find();

    public function save();

    public function remove();
}
