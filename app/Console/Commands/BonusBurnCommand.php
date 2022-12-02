<?php

namespace App\Console\Commands;

use App\Services\BonusService;
use Illuminate\Console\Command;

class BonusBurnCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:burn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Burning bonuses which are burn_date=today';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        with(new BonusService())->burn();
    }
}
