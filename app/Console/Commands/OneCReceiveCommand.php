<?php

namespace App\Console\Commands;

use App\Services\OneCService;
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
        Log::channel('1C')->info('cron test 1');

        $service = new OneCService();
        Log::channel('1C')->info('cron test 2');
        $service->receive();
        Log::channel('1C')->info('cron test 3');
        return 0;
    }
}
