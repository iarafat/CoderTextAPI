<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Exception\InvalidArgumentException;


class LayersMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:layers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Layers for Model; Repository, RepositoryInterface, Service, ServiceInterface.';

    protected $type = 'Repository';
    protected $typeRepositoryInterface = 'RepositoryInterface';
    protected $typeService = 'Service';
    protected $typeServiceInterface = 'ServiceInterface';

    private $repositoryClass;
    private $repositoryInterface;
    private $serviceClass;
    private $serviceInterface;

    private $model;
    private $modelVariable;


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->setRepositoryClass();
        $pathRepository = $this->getPath($this->repositoryClass);
        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');
            return false;
        }




    }

    protected function getStub()
    {
        // TODO: Implement getStub() method.
    }

    private function setRepositoryClass()
    {
        $this->modelVariable = strtolower($this->argument('name'));
        $this->model = ucwords($this->modelVariable);

        $modelClass = $this->parseName($this->model);
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
