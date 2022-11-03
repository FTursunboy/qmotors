<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class OneCReceiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '1c:receive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Receiving data from 1C';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        Log::channel('1C')->info('cron test');

//        $service = new OneCService();
//        $service->receive();
        return 0;
    }
}
