<?php

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\CsvImport;
use App\Repositories\Contracts\ContaRepositoryInterface;


class CsvFile extends Controller
{
    protected $unidadeRepository;
    
    public function __construct(ContaRepositoryInterface $contaRepository) 
    {
        $this->contaRepository = $contaRepository;
    }


    public function index() 
    {
        //recupera todos as unidades
        $contas = $this->contaRepository->selectContas();
        
        return view('admin.imports.csv_file', compact('contas'));
    }
    
    
    public function csv_import() 
    {
        Excel::import(new CsvImport, request()->file('file'));
        //return back();
    }
}
