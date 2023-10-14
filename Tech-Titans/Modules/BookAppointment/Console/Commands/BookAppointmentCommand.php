<?php

namespace Modules\BookAppointment\Console\Commands;

use Illuminate\Console\Command;

class BookAppointmentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:BookAppointmentCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'BookAppointment Command description';

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
