<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class FilterPhone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filter:phone';

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
        User::withoutEvents(function () {
//            do {
            $data = User::where('phone_number', 'not like', '%' . '+' . '%')->orWhere('phone_number', 'not like', '%' . '(' . '%')->orderBy('id')->limit(2000)->get();
//            dd($data->count());
            try {
                foreach ($data as $item) {
                    $item->phone_number = buildPhone($item->phone_number);
                    $item->additional_phone_number = buildPhone($item->additional_phone_number);
                    $item->save();
                }

            } catch (\Throwable $e) {
            }
//            } while ($data->count() > 0);
        });
        return 0;
    }
}
