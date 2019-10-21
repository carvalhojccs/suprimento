<?php

namespace App\Imports;

use App\Models\Unidade;
use App\Models\Material;
use App\Models\Movimento;
//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Http\Request;

//class CsvImport implements ToModel
class CsvImport implements ToCollection
{
//    public function model(array $row)
//    {
//        if(!isset($row[0])):
//            return null;
//        endif;
//        
//        //dd($row[3]);
//        return new Unidade([
//            'descricao' => $row[3],
//        ]);
//    }
//    
//    public function getConta() 
//    {
//        return Request::;
//    }
//    
    public function collection(Collection $rows) 
    {
        //dd(request()->get('conta_id'));
        
        /**
         * Cadastro de unidades de fornecimento
         * 
         */
        $unidades = [];
        
        foreach($rows as $row):
            array_push($unidades, $row[3]);
        endforeach;
        
        $unidades_unique = array_unique($unidades);
        $retira_primeiro_item = array_shift($unidades_unique);
        $insert_unidades = $unidades_unique;
        
        foreach($insert_unidades as $unidade):
                Unidade::updateOrCreate([
                'descricao' => $unidade,
            ]);
        endforeach;
        
        /**
         * Cadastro de materiais
         * 
         */
        foreach($rows as $row):
            if($row[0] != null):
                //busca o id da unidade
                $unidade = Unidade::where('descricao',$row[3])->first();
                Material::updateOrCreate([
                    'conta_id' => request()->get('conta_id'),
                    'unidade_id' => $unidade->id,
                    'pn' => $row[0],
                    'nomenclatura'  => $row[2]
                ]);
            endif;
        endforeach;
        
        /**
         * Cadastro de movimentos
         */
        foreach($rows as $row):
            if($row[0] != null):
                $material = Material::where('nomenclatura',$row[2])->first();
                
                Movimento::updateOrCreate([
                    'material_id'       =>  $material->id,
                    'local_id'          =>  request()->get('local_id'),
                    'user_id'           =>  1,
                    'tipo_movimento'    => 'E',
                    'numero_documento'  => '',
                    'data_documento'     => null,
                    'estoque_anterior'  => 0,
                    'entrada'           => $row[10],
                    'saida'             => 0,
                    'estoque_atual'     => $row[10]                    
                ]);
            endif;
        endforeach;
        

    }
}
