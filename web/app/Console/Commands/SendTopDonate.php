<?php

namespace App\Console\Commands;

use App\Models\HistoryPayment;
use App\Models\Payment\History;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SendTopDonate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'donate:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send top donate bonuses';

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
        $top_donaters = Cache::get('top_donaters');
        if (!empty($top_donaters)) {
            $item = $top_donaters[0];
            if ($item->bonuses > 0) {
                $donate = new History;
                $donate->user_id = $item->account_id;
                $donate->title = 'Награда за 1 место в донате';
                $donate->service = 'balance';
                $donate->services = 'system';
                $donate->price = 10;
                $donate->status = 1;
                $donate->save();
                $user = User::whereId($item->account_id)->first();
                DB::connection('WotlkAuth')
                    ->table('account_donate')
                    ->where('id', $user->wotlk->id)
                    ->update([
                        'bonuses' => DB::raw('bonuses + 10')
                ]);
            }
        }

    }
}
