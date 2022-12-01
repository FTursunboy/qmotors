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
        $data = User::where('phone_number', 'like', '%' . '+' . '%')->orderBy('id')->get();
        foreach ($data as $item) {
            $item->phone_number = filterPhone3(filterPhone($item->phone_number));
            $item->additional_phone_number = filterPhone3(filterPhone($item->additional_phone_number));
            $item->save();
        }
        return 0;
    }
}
