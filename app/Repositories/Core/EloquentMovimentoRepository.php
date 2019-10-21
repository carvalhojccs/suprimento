<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\MovimentoRepositoryInterface;
use App\Models\Movimento;

class EloquentMovimentoRepository extends BaseEloquentRepository implements MovimentoRepositoryInterface
{
    public function entity()
    {
        return Movimento::class;
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
}