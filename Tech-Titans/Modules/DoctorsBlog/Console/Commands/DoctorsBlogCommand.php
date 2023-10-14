<?php

namespace Modules\DoctorsBlog\Console\Commands;

use Illuminate\Console\Command;

class DoctorsBlogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:DoctorsBlogCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DoctorsBlog Command description';

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
