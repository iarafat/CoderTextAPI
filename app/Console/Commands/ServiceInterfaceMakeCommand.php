<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\Console\Exception\InvalidArgumentException;

class ServiceInterfaceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:service-interface';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model Service Interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ServiceInterface';

    /**
     * The name of class being generated.
     *
     * @var
     */
    private $serviceInterface;


    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws FileNotFoundException
     */
    public function handle()
    {
        $this->setServiceInterface();
        $name = $this->qualifyClass($this->serviceInterface);
        $path = $this->getPath($name);

        if ($this->alreadyExists($name)) {
            $this->error($this->type . ' already exists!');
            return false;
        }

        $this->makeDirectory($path);
        $this->files->put($path, $this->sortImports($this->buildClass($name)));
        $this->info($this->type . ' created successfully.');
        $this->line("<info>Created Service Interface: </info> $name");
    }

    /**
     * Set repository interface class name
     *
     * @return $this
     */
    private function setServiceInterface()
    {
        $name = ucwords(strtolower($this->getNameInput()));
        $this->serviceInterface = $name . 'ServiceInterface';
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

        return str_replace('DummyServiceInterface', $this->serviceInterface, $stub);
    }


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('stubs/ServiceInterface.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Contracts\Services';
    }
}
