<?php

namespace Modules\T\Console\Commands;

use Illuminate\Console\Command;

class TCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'T Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
