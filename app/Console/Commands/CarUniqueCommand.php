<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CarUniqueCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
//        $cars = UserCar::whereNotNull('vin')->get();
//        foreach ($cars as $item) {
//            while (UserCar::where('id', '!=', $item->id)->where('vin', $item->vin)->exists()) {
//                $item->vin = floor(microtime(true) * 1000);
//                $item->save();
//            }
//        }
        return 0;
    }
}
