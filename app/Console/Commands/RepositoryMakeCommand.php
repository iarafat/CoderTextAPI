<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;


class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model Repository';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * The name of class being generated.
     *
     * @var
     */
    private $repositoryClass;
    private $repositoryInterface;

    /**
     * The name of class being generated.
     *
     * @var
     */
    private $model;
    private $modelVariable;


    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws FileNotFoundException
     */
    public function handle()
    {
        $this->setRepositoryClass();
        $name = $this->qualifyClass($this->repositoryClass);

        $path = $this->getPath($name);
        if ($this->alreadyExists($name)) {
            $this->error($this->type . ' already exists!');
            return false;
        }

        $this->makeDirectory($path);
        $this->files->put($path, $this->sortImports($this->buildClass($name)));
        $this->info($this->type . ' created successfully.');
        $this->line("<info>Created Repository: </info> $name");
    }

    /**
     * Set repository class name
     *
     * @return $this
     */
    private function setRepositoryClass()
    {
        $name = ucwords(strtolower($this->getNameInput()));
        $this->model = $name;
        $this->modelVariable = lcfirst($this->getNameInput());
        $this->repositoryClass = $name . 'Repository';
        $this->repositoryInterface = $name . 'RepositoryInterface';
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

        $stub = str_replace('DummyRepository', $this->repositoryClass, $stub);
        $stub = str_replace('DummyRepositoryInterface', $this->repositoryInterface, $stub);
        $stub = str_replace('dummyVariable', $this->modelVariable, $stub);

        return str_replace('DummyModel', $this->model, $stub);
    }


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('stubs/Repository.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model class'],
        ];
    }
}
