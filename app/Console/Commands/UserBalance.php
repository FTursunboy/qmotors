<?php

namespace App\Console\Commands;

use App\Exports\UserBalanceExport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class UserBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::store(new UserBalanceExport(), 'balance/' . date('Y-m-d H:i:s') . '.xlsx');
        return 0;
    }
}
