<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\Console\Exception\InvalidArgumentException;

class RepositoryInterfaceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repository-interface';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model Repository Interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'RepositoryInterface';

    /**
     * The name of class being generated.
     *
     * @var
     */
    private $repositoryInterface;


    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws FileNotFoundException
     */
    public function handle()
    {
        $this->setRepositoryInterface();
        $name = $this->qualifyClass($this->repositoryInterface);
        $path = $this->getPath($name);

        if ($this->alreadyExists($name)) {
            $this->error($this->type . ' already exists!');
            return false;
        }

        $this->makeDirectory($path);
        $this->files->put($path, $this->sortImports($this->buildClass($name)));
        $this->info($this->type . ' created successfully.');
        $this->line("<info>Created Repository Interface: </info> $name");
    }

    /**
     * Set repository interface class name
     *
     * @return $this
     */
    private function setRepositoryInterface()
    {
        $name = ucwords(strtolower($this->getNameInput()));
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

        return str_replace('DummyRepositoryInterface', $this->repositoryInterface, $stub);
    }


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('stubs/RepositoryInterface.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Contracts\Repositories';
    }
}
