<?php

namespace App\Console\Commands;

use App\Models\Bonus;
use Carbon\Carbon;
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
        $bonuses = Bonus::whereNotIn('bonus_accrual_id', [null, 0])->whereDate('burn_date', date('Y-m-d'))->where('bonus_type', '!=', 'utilization')->get();
        foreach ($bonuses as $bonus) {
            $accrual = $bonus->replicate();
            $accrual->bonus_accrual_id = $bonus->id;
            $accrual->burn_date = null;
            $accrual->bonus_type = 'utilization';
            $accrual->created_at = Carbon::now();
            $accrual->save();
        }
    }
}
