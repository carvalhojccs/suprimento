<?php

namespace App\Repositories\Contracts;
interface MovimentoRepositoryInterface 
{
    public function search(array $filters);
}