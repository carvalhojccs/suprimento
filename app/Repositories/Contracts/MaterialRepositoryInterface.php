<?php

namespace App\Repositories\Contracts;
interface MaterialRepositoryInterface 
{
    public function search(array $filters);
}