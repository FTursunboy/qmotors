<?php

namespace App\Console\Commands;

use App\Models\TechCenter;
use App\Models\TechCenterNickName;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TelegramGetUpdatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:update';

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
        $nicknames = TechCenterNickName::pluck('nickname');

        $response = Http::get('https://api.telegram.org/bot6731404676:AAFa2P7DXrwnvvNMyihku-SIXPJMZ4Z2AQQ/getUpdates');

        if ($response->successful()) {
            $result = $response->json();

            foreach ($result['result'] as $res) {
                $telegramUsername = $res['message']['from']['username'];

                $lowercaseNicknames = $nicknames->map(function ($item) {
                    return strtolower($item);
                });

                if ($lowercaseNicknames->contains(strtolower($telegramUsername))) {
                    TechCenterNickName::where('nickname', $telegramUsername)
                        ->orWhere('nickname', strtolower($telegramUsername))
                        ->update(['telegram_id' => $res['message']['from']['id']]);
                }
            }
        }



    }
}
