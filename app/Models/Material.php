<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiais';
    protected $fillable = ['conta_id', 'unidade_id', 'pn', 'nomenclatura'];
}
