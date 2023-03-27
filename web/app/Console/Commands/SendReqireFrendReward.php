<?php

namespace App\Console\Commands;

use App\Models\Characters;
use App\Models\Game\AccountPremium;
use App\Models\Payment\History;
use App\Models\User;
use App\Models\User\Gifts;
use App\Models\User\Referrals;
use App\Services\Text;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SendReqireFrendReward extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'donate:referrals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Referrals User Award';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private static function loadReward($item)
    {
        $userRefChar = Characters::where('id', $item->user_id)->orderBy('totaltime', 'desc')->first();
        if ($userRefChar) {
            if (Text::totalTimeReferral($userRefChar->totaltime) > '12.0') {
                    $game = User::whereId($item->ref_id)->first();
                    if (isset($game->wotlk)) {

                        $gifts = DB::table('account_gifts_items')->get();

                        foreach ($gifts as $gift) {
                            if ($gift->data_item === 0) {
                                Gifts::create([
                                    'users_id' => $item->ref_id,
                                    'title' => $gift->title,
                                    'item' => $gift->item_id,
                                    'countItem' => $gift->count_item,
                                    'status' => 0
                                ]);
                            }   else {
                                Gifts::create([
                                    'users_id' => $item->user_id,
                                    'title' => $gift->title,
                                    'item' => $gift->item_id,
                                    'countItem' => $gift->count_item,
                                    'status' => 0
                                ]);
                            }
                        }

                        DB::table('users')->whereId($item->ref_id)->update([
                            'referrer_count' => DB::raw('referrer_count + 1')
                        ]);

                        DB::table('referrals')->whereId($item->id)->update([
                            'status' => 1,
                            'countDone' => DB::raw('countDone + 1')
                        ]);

                    }
                }
        }

        $users = User::whereId($item->user_id)->first();

        if ($userRefChar) {
            if ($users->referrer_count >= 3) {
                if (Text::totalTimeReferral($userRefChar->totaltime) > '24.0') {
                    $gift = Gifts::where('item', '54860')->where('users_id', $item->ref_id)->first();
                    if (!$gift) {
                        Gifts::create([
                            'users_id' => $item->ref_id,
                            'title' => 'Прогулочная ракета X-53',
                            'item' => 54860, 
                            'countItem' => 1,
                            'status' => 0
                        ]);
                    }
                }
            }
        }

        if ($users->referrer_count >= 10 && $item->reward === 'vip') {
            $user = User::whereId($item->ref_id)->first();
            if (isset($user->wotlk)) {

                AccountPremium::updateOrCreate([
                    'id' => $user->wotlk->id,
                ],[
                    'setdate' => Carbon::now()->addDays(0)->timestamp,
                    'unsetdate' => Carbon::now()->addDays(30)->timestamp,
                    'active' => 1
                ]);

                DB::table('referrals')->whereId($item->id)->update([
                    'status' => 1,
                    'countDone' => DB::raw('countDone + 1')
                ]);

                History::create([
                    'user_id' => $user->id,
                    'service' => 'balance',
                    'services' => 'System',
                    'title' => 'Награда VIP за приглашенного',
                    'price' => $item->bonus,
                    'status' => '1',
                ]);
            }

        }

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('users')->chunkById(50, function ($referral) {
            foreach ($referral as $item) {
                $users = Referrals::where('ref_id', $item->id)->where('status', 0)->get();
                if($users) {
                    foreach ($users as $award) {
                        self::loadReward($award);
                    }
                }
            }
        });

        return 0;
    }
}
