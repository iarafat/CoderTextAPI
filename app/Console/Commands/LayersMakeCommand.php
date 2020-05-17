<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;


class LayersMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:layers {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Layers for Model; Repository, RepositoryInterface, Service, ServiceInterface.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->argument('name')) {
            throw new InvalidArgumentException('Missing required argument model name');
        }

        // calling the layers generator classes.
        # Repository Interface
        $this->call(RepositoryInterfaceMakeCommand::class, [
                        'name' => $this->argument('name')
                    ]);
        $this->line('');

        # Repository
        $this->call(RepositoryMakeCommand::class, [
                        'name' => $this->argument('name')
                    ]);
        $this->line('');

        # Service Interface
        $this->call(ServiceInterfaceMakeCommand::class, [
                        'name' => $this->argument('name')
                    ]);
        $this->line('');

        # Service
        $this->call(ServiceMakeCommand::class, [
                        'name' => $this->argument('name')
                    ]);
    }
}
