<?php

namespace App\Console\Commands;

use App\Models\User\Gifts;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class StartGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'donate:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Быстрый старт';

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
        DB::table('users')->where('created_at', '<', '2022-01-02')->chunkById(100, function ($users) {
            foreach ($users as $user) {
                $game = Gifts::where('users_id', $user->id)->where('item', '1878')->where('item', '1194311')->first();
                if (!$game) {
                    Gifts::create([
                        'users_id' => $user->id,
                        'item' => 49426,
                        'countItem' => 50,
                        'title' => 'Эмблема Льда',
                        'status' => 0
                    ]);
                    Gifts::create([
                        'users_id' => $user->id,
                        'item' => 1194311,
                        'countItem' => 1,
                        'title' => 'Маунт',
                        'status' => 0
                    ]);
                }
            }
        });
        return 0;
    }
}
