<?php

namespace App\Console\Commands;

use App\Services\OneCService;
use Illuminate\Console\Command;

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
        $service = new OneCService();
        $service->receive();
        return 0;
    }
}
