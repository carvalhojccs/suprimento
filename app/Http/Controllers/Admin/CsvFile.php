<?php

namespace App\Http\Controllers\Admin;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\CsvImport;
use App\Repositories\Contracts\ContaRepositoryInterface;
use App\Repositories\Contracts\LocalRepositoryInterface;


class CsvFile extends Controller
{
    protected $unidadeRepository;
    protected $localRepository;


    public function __construct(ContaRepositoryInterface $contaRepository, LocalRepositoryInterface $localRepository) 
    {
        $this->contaRepository = $contaRepository;
        $this->localRepository = $localRepository;
    }


    public function index() 
    {
        //recupera todos as unidades
        $contas = $this->contaRepository->selectContas();
        
        //recupera todas as localidades
        $locais = $this->localRepository->selectLocais();
        
        return view('admin.imports.csv_file', compact('contas','locais'));
    }
    
    
    public function csv_import() 
    {
        Excel::import(new CsvImport, request()->file('file'));
        //return back();
    }
}
