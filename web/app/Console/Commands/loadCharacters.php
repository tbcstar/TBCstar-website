<?php

namespace App\Console\Commands;

use App\Models\Characters;
use App\Models\Game\Wotlk;
use App\Services\Utils;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class loadCharacters extends Command
{
    /**
     * @var mixed
     */
    private static mixed $active_character;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'characters:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load characters from world game server';

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
      foreach(config('servers.realm') as $realm_info) {
            DB::connection($realm_info['connectionChatacters'])->table('characters')->orderBy('guid')->chunk(200, function ($characters) use ($realm_info) {
                $active_set = false;
                $index = 0;
                foreach ($characters as $item) {
                    Characters::updateOrCreate([
                        'guid' => $item->guid,
                    ],[
                        'index' => $index,
                        'account' => $item->account,
                        'name' => $item->name,
                        'class' => $item->class,
                        'class_text' => __('characters.class_' . $item->class),
                        'class_key' => __('characters.class_key_' . $item->class),
                        'race' => $item->race,
                        'race_text' => __('characters.race_' . $item->race),
                        'race_key' => __('characters.key_race_' . $item->race),
                        'gender' => $item->gender,
                        'level' => $item->level,
                        'logout_time' => $item->logout_time,
                        'totaltime' => $item->totaltime,
                        'totalHonorPoints' => $item->totalHonorPoints,
                        'totalKills' => $item->totalKills,
                        'health' => $item->health,
                        'power1' => $item->power1,
                        'power2' => $item->power2,
                        'power3' => $item->power3,
                        'power4' => $item->power4,
                        'power5' => $item->power5,
                        'power6' => $item->power6,
                        'power7' => $item->power7,
                        'chosenTitle' => $item->chosenTitle,
                        'talentGroupsCount' => $item->talentGroupsCount,
                        'activeTalentGroup' => $item->activeTalentGroup,
                        'realmName' => $realm_info['name'],
                        'realmSlug' => $realm_info['slug'],
                        'realmId' => $realm_info['id'],
                        'isActive' => $active_set ? 0 : 1,
                        'faction' => Utils::faction($item->race)['name'] ?? 'unknown',
                        'faction_text' => Utils::faction($item->race)['slug'] ?? 'unknown'
                    ]);
                    if (!$active_set) {
                        self::$active_character = $item;
                        $active_set = true;
                    }
                    ++$index;
                }
            });
        }        
	return 0;
    }
}
