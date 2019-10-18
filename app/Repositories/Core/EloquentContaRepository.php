<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\ContaRepositoryInterface;
use App\Models\Conta;

class EloquentContaRepository extends BaseEloquentRepository implements ContaRepositoryInterface
{
    public function entity()
    {
        return Conta::class;
    }

    public function search(array $filters)
    {
        return $this->entity->where(function($query) use($filters){
            if($filters['campo1']):
                $query->where('campo1','LIKE',"%{$filters['campo1']}%");
            endif;

            if($filters['campo2']):
                $query->orWhere('campo2','LIKE',"%{$filters['campo2']}%");
            endif;
        })->paginate();
    }
    
    public function selectContas() 
    {
        return $this->entity->pluck('codigo','id');
    }
}