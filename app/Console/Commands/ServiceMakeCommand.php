<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\Console\Exception\InvalidArgumentException;

class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model Service';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * The name of class being generated.
     *
     * @var
     */
    private $serviceClass;
    private $serviceInterface;
    private $repositoryInterface;

    /**
     * The name of class being generated.
     *
     * @var
     */
    private $repositoryVariable;


    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws FileNotFoundException
     */
    public function handle()
    {
        $this->setServiceClass();
        $name = $this->qualifyClass($this->serviceClass);
        $path = $this->getPath($name);

        if ($this->alreadyExists($name)) {
            $this->error($this->type . ' already exists!');
            return false;
        }

        $this->makeDirectory($path);
        $this->files->put($path, $this->sortImports($this->buildClass($name)));
        $this->info($this->type . ' created successfully.');
        $this->line("<info>Created Service: </info> $name");
    }

    /**
     * Set service class name
     *
     * @return $this
     */
    private function setServiceClass()
    {
        $name = ucwords(strtolower($this->getNameInput()));
        $this->serviceClass = $name . 'Service';
        $this->serviceInterface = $name . 'ServiceInterface';
        $this->repositoryInterface = $name . 'RepositoryInterface';
        $this->repositoryVariable = lcfirst($name . 'Repository');
        return $this;
    }


    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @param string $name
     * @return string|string[]
     */
    protected function replaceClass($stub, $name)
    {
        if (!$this->getNameInput()) {
            throw new InvalidArgumentException('Missing required argument model name');
        }

        $stub = str_replace('DummyServiceInterface', $this->serviceInterface, $stub);
        $stub = str_replace('DummyRepositoryInterface', $this->repositoryInterface, $stub);
        $stub = str_replace('dummyRepositoryVariable', $this->repositoryVariable, $stub);

        return str_replace('DummyService', $this->serviceClass, $stub);
    }


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('stubs/Service.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }
}
