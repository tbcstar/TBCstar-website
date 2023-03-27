<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class updateUserInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:userInfo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление пользователей но новый формат БД';

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
        DB::connection('auth')->table('account')->select('id', 'email')->chunkById(100, function ($account) {
            foreach ($account as $item) {
                UserData::where('email', $item->email)->update(['user_id' => $item->id]);
            }
        });
        return 0;
    }
}
