<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AdminViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:adminviews {name : Nome da View}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera os carquivos padrão de views';

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
        mkdir(resource_path("views/admin/$name"),0777, true);
        mkdir(resource_path("views/admin/$name/partials"),0777, true);
        $this->index($name);
        $this->create($name);
        $this->edit($name);
        $this->show($name);
        $this->form($name);
    }
    
    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/admin_views/$type.stub"));
    }
    
    protected function index($name)
    {
        $modelTemplate = $this->getStub('index.blade');
        file_put_contents(resource_path("/views/admin/{$name}/index.blade.php"), $modelTemplate);
    }
    
    protected function create($name)
    {
        $modelTemplate = $this->getStub('create.blade');
        file_put_contents(resource_path("/views/admin/{$name}/create.blade.php"), $modelTemplate);
    }
    
    protected function edit($name)
    {
        $modelTemplate = $this->getStub('edit.blade');
        file_put_contents(resource_path("/views/admin/{$name}/edit.blade.php"), $modelTemplate);
    }
    
    protected function show($name)
    {
        $modelTemplate = $this->getStub('show.blade');
        file_put_contents(resource_path("/views/admin/{$name}/show.blade.php"), $modelTemplate);
    }
    
    protected function form($name)
    {
        $modelTemplate = $this->getStub('form.blade');
        file_put_contents(resource_path("/views/admin/{$name}/partials/form.blade.php"), $modelTemplate);
    }
}
