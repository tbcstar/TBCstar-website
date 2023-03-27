<?php

namespace App\Services;

use App\Models\Game\Arena;
use App\Services\Achievements as Achievements;
use App\Services\Logs\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;

class Characters
{
    private static $account           = 0;
    private static $guid              = 0;
    private static $class             = 0;
    private static $class_text        = null;
    private static $class_key         = null;
    private static $name              = null;
    private static $race              = 0;
    private static $race_text         = null;
    private static $race_key          = null;
    private static $gender            = 0;
    private static $realmId           = 0;
    private static $realmName         = null;
    private static $realmSlug         = null;
    private static $m_server          = null;
    private static $totaltime         = null;
    private static $faction           = 0;
    private static $faction_text      = null;
    private static $guildId           = 0;
    private static $guildName         = null;
    private static $level             = null;
    private static $logout_time       = null;
    private static $totalHonorPoints  = 0;
    private static $totalKills        = 0;
    private static $health            = 0;
    private static $power1            = 0;
    private static $power2            = 0;
    private static $power3            = 0;
    private static $power4            = 0;
    private static $power5            = 0;
    private static $power6            = 0;
    private static $power7            = 0;
    private static $chosenTitle       = null;
    private static $talentGroupsCount = null;
    private static $activeTalentGroup = null;

    private static $m_items           = [];
    private static $equipmentCache    = null;
    private static $cache_item        = array();
    private static $item_level        = 0;
    private static $power_type        = 0;


    private static function CalculateAverageItemLevel() {
        if(!self::IsInventoryLoaded()) {
            if(!self::LoadInventory(true)) {
                self::$item_level = array('avgEquipped' => 0, 'avg' => 0);
                return true;
            }
        }
        $total_iLvl = 0;
        $maxLvl = 0;
        $minLvl = 500;
        $i = 0;
        self::$item_level = array('avgEquipped' => 0, 'avg' => 0);
        foreach(self::$m_items as $item) {
            if(!in_array($item->GetSlot(), array(3, 18))) {
                if($item->GetItemLevel() > 0) {
                    $total_iLvl += $item->GetItemLevel();
                    if($item->GetItemLevel() < $minLvl) {
                        $minLvl = $item->GetItemLevel();
                    }
                    if($item->GetItemLevel() > $maxLvl) {
                        $maxLvl = $item->GetItemLevel();
                    }
                    $i++;
                }
            }
        }
        if($i == 0) {
            // Prevent divison by zero.
            return true;
        }
        self::$item_level['avgEquipped'] = round(($maxLvl + $minLvl) / 2);
        self::$item_level['avg'] = round($total_iLvl / $i);
        return true;
    }

    public static function GetAverageItemLevel() {
        return array('avg' => self::GetAVGItemLevel(), 'avgEquipped' => self::GetAVGEquippedItemLevel());
    }

    public static function GetAVGEquippedItemLevel() {
        return self::$item_level['avgEquipped'];
    }

    public static function GetAVGItemLevel() {
        return self::$item_level['avg'];
    }

    private static function IsInventoryLoaded(): bool
    {
        return is_array(self::$m_items);
    }

    public static function LoadCharacter($name, $realm_id, $full = true, $initialBuild = true): int
    {
        if(!is_string($name) || $name == null) {
            Log::WriteError('%s : name must be a string (%s given.)!', __METHOD__, gettype($name));
            return 1;
        }
        if(!$realm_id || $realm_id == 0) {
            Log::WriteError('%s : realm ID must be > 0!', __METHOD__);
            return 1;
        }
        if(!isset(config('servers.realm')[$realm_id])) {
            Log::WriteError('%s : unable to find realm with ID #%d. Check your configs.', __METHOD__, $realm_id);
            return 1;
        }

        self::$name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");

        if(!self::LoadCharacterFieldsFromDB()) {
            return 1;
        }
        // Load Inventory
        self::LoadInventory(true);
        self::CalculateAverageItemLevel();
        self::SetPowerType();
        return 3;
    }

    private static function SetPowerType() {
        switch(self::$class) {
            case 1:
                self::$power_type = 1;
                break;
            case 4:
                self::$power_type = 3;
                break;
            case 6:
                self::$power_type = 6;
                break;

            case 3:
                self::$power_type = 2;
                break;

            default:
                self::$power_type = 0;
                break;
        }
        return true;
    }

    public static function data() {
        if (self::$level < 10) {
            return abort(512);
        }
        $date = strtotime(date('d.m.Y'));
        $lastLogin = strtotime(Text::lastLoginCharacters(self::$logout_time));
        $days_between = ceil(abs($lastLogin - $date) / 86400);

        Achievements::Initialize(self::$guid);

        if($days_between >= 60.0) {
            $isOutdated = true;
        } else {
            $isOutdated = false;
        }

        $arena2 = '';
        ///$arena2 = Arena::where('guid', self::$guid)->where('slot', 2)->first();
        $arena3 = '';
        ///$arena3 = Arena::where('guid', self::$guid)->where('slot', 3)->first();
        $battlegrounds = Arena::where('captainGuid', self::$guid)->where('type', 5)->first();
        $data = [
            "lqip" => [
                "fileName" => "armory_bg_covenant_venthyr.jpg",
                "base64" => "data => image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAgACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP4tIj8PFt7y5a4HnutlcaXYW90qW8ALOmoWF99oMUgdQyTW8sO9D5ezexclfOp1sQ4xoyjKM4OcKlaVNWqW5fZVafI5rldmpxkoyTl8KSPfxmGwzxHt6Lozo1YwqqhCpJToucW6mGqOrCm3Kk2lGceaD5dJ62Mkap4XUBTbWLEAAsbiUkkcZJBAJPXIAHoBXTaXWvK/W0Fa/l5HmuOrthY2u7e/La+n2j//2Q==","palette" => ["#651110","#ec1b11","#5e392d","#796c4c","#ce8d59","#764722"]],
            "character" => [
                "achievement" => Achievements::GetAchievementsPoints(),
                "avatar" => [
                    "url" => Utils::imageClass(self::$race, self::$gender)
                ],
                "averageItemLevel" => self::GetAVGEquippedItemLevel(),
                "bust" => [
                    "url" => "https://render-eu.worldofwarcraft.com/character/die-ewige-wacht/192/157998272-inset.jpg"],
                "class" => [
                    "enum" => self::$class_key,
                    "id" => self::$class,
                    "name" => self::$class_text,
                    "slug" => Str::slug(self::$class_key)
                ],
                "faction" => Utils::faction(self::$race),
                "gear" => Items::itemInfo(),
                "gender" => [
                    'enum' => __('characters.gender_'.self::$gender),
                    'id' => self::$gender,
                    'name' => __('characters.gender_name_'.self::$gender),
                    'slug' => Str::slug(__('characters.gender_'.self::$gender))
                ],
                "guild" => [
                    "name"=> self::$guildName ?? '',
                    "url"=> ''
                ],
                "lastUpdatedTimestamp" => [
                    "epoch" => 1622835492000,"iso8601" => "2021-06-04T19:38:12Z"],
                "level" => self::$level,
                "mythicKeystoneDungeons" => [],
                "name" => self::$name,
                "pve" => [],
                "pvp" => [
                    "honorableKills" => [
                        "tier" => 1000,
                        "value" => self::$totalKills
                    ],
                    "prestige" => [
                        "honorLevel" => self::$totalHonorPoints
                    ],
                    "ratings" => Utils::pvp($arena2, $arena3, $battlegrounds),
                    "region" => "eu"
                ],
                "race" => [
                    'enum' => mb_strtoupper(self::$race_key),
                    'id' => self::$race,
                    'name' => self::$race_text,
                    'slug' => mb_strtoupper(self::$race_key)
                ],
                "realm" => [
                    "name" => self::$realmName,"slug" => self::$realmSlug],
                "region" => "eu",
                "render" => [
                    "staticFallback" => [
                        "url" => Utils::renderBackground(self::$class, self::$race, self::$gender)
                    ],
                    "foregroundFallback" => [
                        "url" => Utils::renderRaw(self::$race, self::$gender)
                    ],
                    "background" => [
                        "url" => "https://render-eu.worldofwarcraft.com/profile-backgrounds/v2/armory_bg_covenant_kyrian.jpg",
                        "color" => "#07050c"
                    ],
                    "shadow" => [
                        "url" => "https://render-eu.worldofwarcraft.com/profile-foreground/foreground-shadow.png"
                    ],
                    "static" => [
                        "url" => Utils::renderBackground(self::$class, self::$race, self::$gender)
                    ],
                    "foreground" => [
                        "url" => Utils::renderRaw(self::$race, self::$gender)
                    ]
                ],
                "renderRaw" => [
                    "url" => Utils::renderRaw(self::$race, self::$gender)],
                "spec" => [],
                "specs" => [],
                "stats" => [],
                "title" => "",
                "url" => route('characters.show', [self::$realmSlug, mb_strtolower(self::$name)]),
                "achievementUrl" => [],
                "isOutdated" => $isOutdated,
                "prefix" => ""
            ],
            "summary" => [
                "character" => [
                    "achievement" => Achievements::GetAchievementsPoints(),
                    "avatar" => [
                        "url" => Utils::imageClass(self::$race, self::$gender)
                    ],
                    "averageItemLevel" => self::GetAVGEquippedItemLevel(),
                    "bust" => [
                        "url" => "https://render-eu.worldofwarcraft.com/character/die-ewige-wacht/192/157998272-inset.jpg"],
                    "class" => [
                        "enum" => __('characters.class_key_'.self::$class),
                        "id" => self::$class,
                        "name" => __('characters.class_'.self::$class),
                        "slug" => Str::slug(__('characters.class_'.self::$class))
                    ],
                    "faction" => Utils::faction(self::$race),
                    "gear" => Items::itemInfo(),
                    "gender" => [
                        'enum' => __('characters.gender_'.self::$gender),
                        'id' => self::$gender,
                        'name' => __('characters.gender_name_'.self::$gender),
                        'slug' => Str::slug(__('characters.gender_'.self::$gender))
                    ],
                    "guild" => [
                        "name"=> self::$guildName ?? '',
                        "url"=> ''
                    ],
                    "lastUpdatedTimestamp" => [
                        "epoch" => 1622835492000,"iso8601" => "2021-06-04T19:38:12Z"],
                    "level" => self::$level,
                    "mythicKeystoneDungeons" => [],
                    "name" => self::$name,
                    "pve" => [],
                    "pvp" => [
                        "honorableKills" => [
                            "tier" => 1000,
                            "value" => self::$totalKills
                        ],
                        "prestige" => [
                            "honorLevel" => self::$totalHonorPoints
                        ],
                        "ratings" => Utils::pvp($arena2, $arena3, $battlegrounds),
                        "region" => "eu"
                    ],
                    "race" => [
                        'enum' => mb_strtoupper(__('characters.key_race_'.self::$race)),
                        'id' => self::$race,
                        'name' => __('characters.race_'.self::$race),
                        'slug' => __('characters.key_race_'.self::$race)
                    ],
                    "realm" => [
                        "name" => self::$realmName,"slug" => self::$realmSlug],
                    "region" => "eu",
                    "render" => [
                        "staticFallback" => [
                            "url" => Utils::renderBackground(self::$class, self::$race, self::$gender)
                        ],
                        "foregroundFallback" => [
                            "url" => Utils::renderRaw(self::$race, self::$gender)
                        ],
                        "background" => [
                            "url" => "https://render-eu.worldofwarcraft.com/profile-backgrounds/v2/armory_bg_covenant_kyrian.jpg",
                            "color" => "#07050c"
                        ],
                        "shadow" => [
                            "url" => "https://render-eu.worldofwarcraft.com/profile-foreground/foreground-shadow.png"
                        ],
                        "static" => [
                            "url" => Utils::renderBackground(self::$class, self::$race, self::$gender)
                        ],
                        "foreground" => [
                            "url" => Utils::renderRaw(self::$race, self::$gender)
                        ]
                    ],
                    "renderRaw" => [
                        "url" => Utils::renderRaw(self::$race, self::$gender)],
                    "spec" => [],
                    "specs" => [],
                    "stats" => [],
                    "title" => "",
                    "url" => route('characters.show', [self::$realmSlug, mb_strtolower(self::$name)]),
                    "achievementUrl" => [],
                    "isOutdated" => $isOutdated,
                    "prefix" => ""
                ],
                "specs" => [],
                "pets" => [],
                "raids" => [],
                "pvp" => [
                    "honorableKills" => [
                        "tier" => 1000,
                        "value" => self::$totalKills
                    ],
                    "prestige" => [
                        "honorLevel" => self::$totalHonorPoints
                    ],
                    "ratings" => Utils::pvp($arena2, $arena3, $battlegrounds),
                    "region" => "eu"
                ],
                "region" => "eu",
                "mythicKeystoneDungeons" => []
            ]
        ];

        if(!isset($guildName))
        {
            unset($data['character']['guild']);
            unset($data['summary']['character']['guild']);
        }
        if(!isset($chosenTitle))
        {
            unset($data['character']['suffix']); /////  Тактик
            unset($data['character']['title']); //// Тактик {name}
            unset($data['summary']['character']['suffix']); /////  Тактик
            unset($data['summary']['character']['title']); //// Тактик {name}
        }
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    private static function LoadInventory($reload = false)
    {
        if(self::IsInventoryLoaded() && !$reload) {
            return;
        }

        $inv = DB::connection('WotlkChar100')->select("SELECT item, slot, bag FROM character_inventory WHERE bag = 0 AND slot < 19 AND guid = ?",  [self::$guid]);

        if(!$inv) {
            Log::WriteError('%s : unable to find any item for character %s (GUID: %d)!', __METHOD__, self::$name, self::$guid);
            return;
        }
        foreach($inv as $item) {

            $item->enchants = self::GetCharacterEnchant($item->slot);
            self::$m_items[$item->slot] = new Item();
            self::$m_items[$item->slot]->LoadFromDB($item, self::$guid);
        }
    }

    private static function LoadCharacterFieldsFromDB(): bool
    {
        if(!self::$name) {
            Log::WriteError('%s : name was not provided.', __METHOD__);
            return false;
        }

        $fields = DB::selectOne(/** @lang text */
            'SELECT account, guid, name, class, class_text, class_key, race, race_text, race_key, gender, level, realmId, totaltime, logout_time, realmName, realmSlug, faction, faction_text, guildId, guildName, totalHonorPoints, totalKills, health, power1, power2, power3, power4, power5, power6, power7, chosenTitle, talentGroupsCount, activeTalentGroup FROM characters WHERE BINARY name = ? LIMIT 1', [self::$name]);

        if(!$fields) {
            Log::WriteError('%s : character %s was not found in `characters` table!', __METHOD__, self::$name);
            return false;
        }
        foreach($fields as $field_name => $field_value) {
            self::${$field_name} = $field_value;
        }
        return true;
    }

    public static function GetCharacterEnchant($slot) {

        if(!is_array(self::$equipmentCache)) {
            Log::WriteError('%s : equipmentCache must be an array!', __METHOD__);
            return 0;
        }
        if($slot >= 19) {
            Log::WriteError('%s : wrong item slot ID: %d', __METHOD__, $slot);
            return false;
        }
        switch($slot) {
            case 0:
                return self::$equipmentCache[1];
                break;
            case 1:
                return self::$equipmentCache[3];
                break;
            case 2:
                return self::$equipmentCache[5];
                break;
            case 3:
                return self::$equipmentCache[7];
                break;
            case 4:
                return self::$equipmentCache[9];
                break;
            case 8:
                return self::$equipmentCache[17];
                break;
            case 6:
                return self::$equipmentCache[13];
                break;
            case 7:
                return self::$equipmentCache[15];
                break;
            case 5:
                return self::$equipmentCache[11];
                break;
            case 9:
                return self::$equipmentCache[19];
                break;
            case 10:
                return self::$equipmentCache[21];
                break;
            case 11:
                return self::$equipmentCache[23];
                break;
            case 12:
                return self::$equipmentCache[25];
                break;
            case 13:
                return self::$equipmentCache[27];
                break;
            case 14:
                return self::$equipmentCache[29];
                break;
            case 15:
                return self::$equipmentCache[31];
                break;
            case 16:
                return self::$equipmentCache[33];
                break;
            case 17:
                return self::$equipmentCache[35];
                break;
            case 18:
                return self::$equipmentCache[37];
                break;
            default:
                Log::WriteLog('%s : wrong item slot ID: %d', __METHOD__, $slot);
                return 0;
                break;
        }
    }

    public static function GetItem($slot) {
        return self::$m_items[$slot] ?? null;
    }

    public static function GetLevel() {
        return self::$level;
    }

    public static function GetEquippedItemInfo($slot, $advanced = false) {

        if(isset(self::$cache_item[$slot])) {
            // ... and return it.
            return self::$cache_item[$slot];
        }
        if(!isset(self::$m_items[$slot])) {
            // Slot is empty, just return false.
            return false;
        }
        $item = self::GetItem($slot);

        if(!$item || !$item->IsCorrect()) {
            Log::WriteError('%s : item handler for slot %d is broken.', __METHOD__, $slot);
            return false;
        }
        $info = DB::connection('WotlkWorld')->selectOne("SELECT Quality, displayid, socketColor_1, socketColor_2, socketColor_3 FROM item_template WHERE entry = ?", [$item->GetEntry()]);
        if(!$info) {
            Log::WriteError('%s : item #%d was not found in `item_template` table!', __METHOD__, $item->GetEntry());
            return false;
        }
        $item_data = array(
            'item_id'    => $item->GetEntry(),
            'name'       => Items::GetItemName($item->GetEntry()),
            'guid'       => $item->GetGUID(),
            'quality'    => $info->Quality,
            'item_level' => $item->GetItemLevel(),
            'icon'       => Items::GetItemIcon($item->GetEntry()),
            'slot_id'    => $item->GetSlot(),
            'enchid'     => $item->GetEnchantmentId(),
            'g0'         => $item->GetSocketInfo(1),
            'g1'         => $item->GetSocketInfo(2),
            'g2'         => $item->GetSocketInfo(3),
            'can_ench'   => !in_array($item->GetSlot(), array(3, 17, 18, 12,
                13, 1, 16, 10, 11, 1, 5))
        );
        if($advanced) {
            $item_data['enchant_text'] = '';
            $item_data['enchant_quality'] = 2;
            $item_data['enchant_item'] = 0;
            $enchantment_info = DB::WoW()->selectRow("
            SELECT
            `DBPREFIX_enchantment`.`text_%s` AS `text`,
            `DBPREFIX_spellenchantment`.`id` AS `spellId`
            FROM `DBPREFIX_enchantment`
            JOIN `DBPREFIX_spellenchantment` ON `DBPREFIX_spellenchantment`.`Value`=`DBPREFIX_enchantment`.`id`
            WHERE `DBPREFIX_enchantment`.`id` = %d LIMIT 1", WoW_Locale::GetLocale(), $item_data['enchid']);
            if(is_array($enchantment_info)) {
                $item_data['enchant_text'] = $enchantment_info['text'];
                $ench_spell = DB::WoW()->selectCell("SELECT `id` FROM `DBPREFIX_spellenchantment` WHERE `Value` = %d", $item_data['enchid']);
                if($ench_spell > 0) {
                    $item_data['enchant_item'] = DB::World()->selectCell("SELECT `entry` FROM `item_template` WHERE `spellid_1` = %d OR `spellid_2` = %d OR `spellid_3` = %d LIMIT 1", $ench_spell, $ench_spell, $ench_spell);
                    if($item_data['enchant_item'] > 0) {
                        $item_ench_name = Items::GetItemName($item_data['enchant_item']);
                        $matches = array();
                        $item_data['enchant_text'] = str_replace('- ', null, substr($item_ench_name, strpos($item_ench_name, ' - ')));
                    }
                }
            }
            for($socket_index = 0; $socket_index < 3; $socket_index++) {
                $item_data['gem' . $socket_index] = array();
                if(isset($item_data['g' . $socket_index]['enchant_id'])) {
                    $item_data['gem' . $socket_index] = Items::GetSocketInfo($item_data['g' . $socket_index]['enchant_id']);
                }
            }
        }
        $itemset_original = $item->GetOriginalItemSetID();
        $itemset_changed = $item->GetItemSetID();
        $itemsetID = 0;
        $pieces_string = null;
        if($itemset_original > 0) {
            $itemsetID = $itemset_original;
        }
        if($itemset_changed > 0) {
            $itemsetID = $itemset_changed;
        }
        if($itemsetID > 0) {
            $pieces = $item->GetItemSetPieces();
            $setpieces = explode(',', $pieces);
            if(isset($setpieces[1])) {
                $prev = false;
                foreach($setpieces as $piece) {
                    if(self::IsItemEquipped($piece)) {
                        if($prev) {
                            $pieces_string .= ',';
                        }
                        $pieces_string .= $piece;
                        $prev = true;
                    }
                }
            }
        }
        // Add to cache
        self::$cache_item[$slot] = $item_data;
        return $item_data;
    }

    public static function statsForClass(): array
    {
        switch(self::$class) {
            default:
                return [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => self::$health]
                    ],
                    [
                        "enum" => "MANA","slug" => "mana","value" => ["type" => "WHOLE","value" => 100000]
                    ],
                    [
                        "details" => [
                            "base" => [
                                "type" => "WHOLE","value" => 452
                            ],
                            "bonus" => [
                                "type" => "WHOLE","value" => 858
                            ],
                            "effective" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "rating" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "type" => "ENHANCED"
                        ],
                        "enum" => "INTELLECT",
                        "slug" => "intellect",
                        "value" => [
                            "type" => "WHOLE",
                            "value" => 1310
                        ]
                    ],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ];
                break;

            case "1":
                return [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => self::$health]
                    ],
                    [
                        "enum" => "RAGE","slug" => "rage","value" => ["type" => "WHOLE","value" => 100]
                    ],
                    [
                        "details" => [
                            "base" => [
                                "type" => "WHOLE","value" => 452
                            ],
                            "bonus" => [
                                "type" => "WHOLE","value" => 858
                            ],
                            "effective" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "rating" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "type" => "ENHANCED"
                        ],
                        "enum" => "STRENGTH",
                        "slug" => "strength",
                        "value" => [
                            "type" => "WHOLE","value" => 1305
                        ]
                    ],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ];
                break;

            case "3":
                return [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => self::$health]
                    ],
                    [
                        "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                    ],
                    [
                        "details" => [
                            "base" => [
                                "type" => "WHOLE","value" => 452
                            ],
                            "bonus" => [
                                "type" => "WHOLE","value" => 858
                            ],
                            "effective" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "rating" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "type" => "ENHANCED"
                        ],
                        "enum" => "AGILITY",
                        "slug" => "agility",
                        "value" => [
                            "type" => "WHOLE","value" => 1305
                        ]
                    ],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ];
                break;

            case "4":
                return [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => self::$health]
                    ],
                    [
                        "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                    ],
                    [
                        "details" => [
                            "base" => [
                                "type" => "WHOLE","value" => 452
                            ],
                            "bonus" => [
                                "type" => "WHOLE","value" => 858
                            ],
                            "effective" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "rating" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "type" => "ENHANCED"
                        ],
                        "enum" => "AGILITY",
                        "slug" => "agility",
                        "value" => [
                            "type" => "WHOLE","value" => 1305
                        ]
                    ],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ];
                break;

            case "6":
                return [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => self::$health]
                    ],
                    [
                        "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                    ],
                    [
                        "details" => [
                            "base" => [
                                "type" => "WHOLE","value" => 452
                            ],
                            "bonus" => [
                                "type" => "WHOLE","value" => 858
                            ],
                            "effective" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "rating" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "type" => "ENHANCED"
                        ],
                        "enum" => "AGILITY",
                        "slug" => "agility",
                        "value" => [
                            "type" => "WHOLE","value" => 1305
                        ]
                    ],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ];
                break;

            case "7":
                return [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => self::$health]
                    ],
                    [
                        "enum" => "MAELSTROM","slug" => "maelstrom","value" => ["type" => "WHOLE","value" => 10000]
                    ],
                    [
                        "details" => [
                            "base" => [
                                "type" => "WHOLE","value" => 452
                            ],
                            "bonus" => [
                                "type" => "WHOLE","value" => 858
                            ],
                            "effective" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "rating" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "type" => "ENHANCED"
                        ],
                        "enum" => "AGILITY",
                        "slug" => "agility",
                        "value" => [
                            "type" => "WHOLE",
                            "value" => 1310
                        ]
                    ],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ];
            break;

            case "12":
                return [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => self::$health]
                    ],
                    [
                        "enum" => "FURY","slug" => "fury","value" => ["type" => "WHOLE","value" => 120]
                    ],
                    [
                        "details" => [
                            "base" => [
                                "type" => "WHOLE","value" => 452
                            ],
                            "bonus" => [
                                "type" => "WHOLE","value" => 858
                            ],
                            "effective" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "rating" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "type" => "ENHANCED"
                        ],
                        "enum" => "AGILITY",
                        "slug" => "agility",
                        "value" => [
                            "type" => "WHOLE","value" => 1305
                        ]
                    ],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ];
            break;

            case "11":
                return [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => self::$health]
                    ],
                    [
                        "enum" => "MANA","slug" => "mana","value" => ["type" => "WHOLE","value" => 10000]
                    ],
                    [
                        "details" => [
                            "base" => [
                                "type" => "WHOLE","value" => 452
                            ],
                            "bonus" => [
                                "type" => "WHOLE","value" => 858
                            ],
                            "effective" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "rating" => [
                                "type" => "WHOLE","value" => 1310
                            ],
                            "type" => "ENHANCED"
                        ],
                        "enum" => "AGILITY",
                        "slug" => "agility",
                        "value" => [
                            "type" => "WHOLE",
                            "value" => 1310
                        ]
                    ],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ];
            break;
        }
    }

    public static function statsChar(): array
    {
        return [
            "overview" => self::statsForClass()
        ];
    }

}
