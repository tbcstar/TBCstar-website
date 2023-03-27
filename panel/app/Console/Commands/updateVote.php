<?php

namespace App\Console\Commands;

use App\Models\Game\AccountDonate;
use App\Models\Payment\History;
use App\Models\User;
use App\Models\User\Votes;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class updateVote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vote:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление списка голосов';

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
        $url = file(config('app.mmotop_stats'));
        foreach ($url as $item) {
            $vote = explode("\t", $item);
            if ((count($vote) < 5) OR ($vote[3] == '')) {
                continue;
            }
            $check = Votes::where('votes_id', $vote[0])->first();
            if ($check === NULL) {
                Votes::create([
                    'votes_id' => $vote[0],
                    'name' => $vote[3],
                    'balance' => '1',
                    'vote' => $vote[4],
                    'ip' => $vote[2],
                    'voted_at' => $vote[1]
                ]);
            }
        }
        $data = Votes::where('complete', 0)->get();

        if ($data) {
            foreach ($data as $item) {
                $game = User::where('username', $item->name)->first();
                if ($game) {
                    AccountDonate::updateOrCreate([
                        'id' => $game->id,
                    ],[
                        'votes' => DB::raw('votes + 1')
                    ]);

                    Votes::where('id', $item->id)->update(['complete' => 1]);

                    History::create([
                        'user_id' => $game->id,
                        'service' => 'vote',
                        'title' => 'Голосование за сервер',
                        'price' => $item->balance,
                        'status' => '1',
                    ]);
                }
            }
        }

        return 0;
    }
}
