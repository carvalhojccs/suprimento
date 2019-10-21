<?php

namespace App\Repositories\Contracts;
interface LocalRepositoryInterface 
{
    public function search(array $filters);
}