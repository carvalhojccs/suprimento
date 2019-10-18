<?php

namespace App\Repositories\Contracts;
interface ContaRepositoryInterface 
{
    public function search(array $filters);
}