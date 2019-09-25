<?php
namespace Yjtec\LaravelHprose\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class Controller extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:rpc';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new rpc controller class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';
    
    public function handle()
    {
        if (parent::handle() === false) {
            return;
        }
    }
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Rpc\Controllers';
    }    
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/controller.stub';
    }    
}
