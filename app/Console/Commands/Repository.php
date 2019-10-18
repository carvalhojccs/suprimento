<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Repository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name : Class (singular) for example User}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria a interface e o repositorio';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->repositoryInterface($name);
        $this->repository($name);
    }
    
    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }
    
    protected function repositoryInterface($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('ModelRepositoryInterface')
        );
        file_put_contents(app_path("/Repositories/Contracts/{$name}RepositoryInterface.php"), $modelTemplate);
    }
    
    protected function repository($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('EloquentModelRepository')
        );
        file_put_contents(app_path("/Repositories/Core/Eloquent{$name}Repository.php"), $modelTemplate);
    }
}
