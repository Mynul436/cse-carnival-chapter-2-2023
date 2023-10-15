<?php

namespace Modules\Chat\Console\Commands;

use Illuminate\Console\Command;

class ChatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ChatCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chat Command description';

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
