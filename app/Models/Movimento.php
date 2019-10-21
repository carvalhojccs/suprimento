<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = 'movimentos';
    protected $fillable = [
        'material_id',
        'local_id',
        'user_id',
        'tipo_movimento', 
        'numero_documento',
        'data_documento',
        'estoque_anterior',
        'entrada',
        'saida',
        'estoque_atual',        
        ];
}
