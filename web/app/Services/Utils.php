<?php

namespace App\Services;

use App\Models\Characters;
use App\Models\Game\Classes;
use App\Services\Parser\Images;

class Utils {

    public static function pvp($arena2, $arena3, $battlegrounds): array
    {
        return [
            "battlegrounds" => self::ratingBg($battlegrounds),
            "2v2" => self::rating2v2($arena2),
            "3v3" => self::rating3v3($arena3)
        ];
    }

    private static function rating2v2($arena2): array
    {
        $data = [];
        if ($arena2) {
            $data = [
                "lossCount" => $arena2->seasonGames - $arena2->seasonWins,
                "rating" => $arena2->rating,
                "tier" => [
                    "id" => 1,
                    "name" => self::imageRating($arena2->rating)['name'],
                    "icon" => [
                        "url" => self::imageRating($arena2->rating)['images']
                    ]
                ],
                "winCount" => $arena2->seasonWins,
                "total" => $arena2->seasonGames,
                "winLoss" => self::percentageOf($arena2->seasonGames, $arena2->seasonWins)
            ];
        } else {
            $data = [
                "lossCount" => 0,
                "rating" => 0,
                "tier" => [
                    "id" => 1,
                    "name" => self::imageRating(0)['name'],
                    "icon" => [
                        "url" => self::imageRating(0)['images']
                    ]
                ],
                "winCount" => 0,
                "total" => 0,
                "winLoss" => self::percentageOf(0, 0)
            ];
        }
        return $data;
    }

    private static function rating3v3($arena3): array
    {
        $data = [];
        if ($arena3) {
            $data = [
                "lossCount" => $arena3->seasonGames - $arena3->seasonWins,
                "rating" => $arena3->rating,
                "tier" => [
                    "id" => 1,
                    "name" => self::imageRating($arena3->rating)['name'],
                    "icon" => [
                        "url" => self::imageRating($arena3->rating)['images']
                    ]
                ],
                "winCount" => $arena3->seasonWins,
                "total" => $arena3->seasonGames,
                "winLoss" => self::percentageOf($arena3->seasonGames, $arena3->seasonWins)
            ];
        } else {
            $data = [
                "lossCount" => 0,
                "rating" => 0,
                "tier" => [
                    "id" => 1,
                    "name" => self::imageRating(0)['name'],
                    "icon" => [
                        "url" => self::imageRating(0)['images']
                    ]
                ],
                "winCount" => 0,
                "total" => 0,
                "winLoss" => self::percentageOf(0, 0)
            ];
        }
        return $data;
    }

    private static function ratingBg($battlegrounds): array
    {
        $data = [];
        if ($battlegrounds) {
            $data = [
                "lossCount" => $battlegrounds->seasonGames - $battlegrounds->seasonWins,
                "rating" => $battlegrounds->rating,
                "tier" => [
                    "id" => 1,
                    "name" => self::imageRating($battlegrounds->rating)['name'],
                    "icon" => [
                        "url" => self::imageRating($battlegrounds->rating)['images']
                    ]
                ],
                "winCount" => $battlegrounds->seasonWins,
                "total" => $battlegrounds->seasonGames,
                "winLoss" => self::percentageOf($battlegrounds->seasonGames, $battlegrounds->seasonWins)
            ];
        } else {
            $data = [
                "lossCount" => 0,
                "rating" => 0,
                "tier" => [
                    "id" => 1,
                    "name" => self::imageRating(0)['name'],
                    "icon" => [
                        "url" => self::imageRating(0)['images']
                    ]
                ],
                "winCount" => 0,
                "total" => 0,
                "winLoss" => self::percentageOf(0, 0)
            ];
        }
        return $data;
    }

    public static function renderRaw($race, $gender): string
    {
        if(!Images::Exists(public_path('uploads/shadow/profile-raw/'. strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".png") ) ) {
            Images::Download(
                'https://render.worldofwarcraft.com/eu/shadow/profile-raw/' .
                strtolower(__('characters.key_race_'.$race)) . '-' .
                strtolower(__('characters.gender_'.$gender)) . '.png',
                public_path('uploads/shadow/profile-raw/'. strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".png")
            );
        }
        return asset('uploads/shadow/profile-raw/'.
            strtolower(__('characters.key_race_'.$race)) . "-" .
            strtolower(__('characters.gender_'.$gender)) . ".png");
    }

    public static function renderBackground($class, $race, $gender): string
    {
        if(!Images::Exists(public_path('uploads/shadow/profile-background/'. strtolower(__('characters.class_key_'.$class)) . "-" . strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".jpg") ) ) {
            Images::Download(
                'https://render.worldofwarcraft.com/eu/shadow/profile-background/' .
                strtolower(__('characters.class_key_'.$class)) . '-' .
                strtolower(__('characters.key_race_'.$race)) . '-' .
                strtolower(__('characters.gender_'.$gender)) . '.jpg',
                public_path('uploads/shadow/profile-background/'. strtolower(__('characters.class_key_'.$class)) . "-" . strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".jpg")
            );
        }
        return asset('uploads/shadow/profile-background/'.strtolower(__('characters.class_key_'.$class)) . "-" .
            strtolower(__('characters.key_race_'.$race)) . "-" .
            strtolower(__('characters.gender_'.$gender)) . ".jpg");
    }
    public static function instanceCharacters($characters){
        $characters = explode('|', $characters);
        $data = [];
        foreach ($characters as $item) {
            if(!empty($item)){
                $char = Characters::whereGuid($item)->first();
                $data[] = $char;

            }
        }
        return $data;
    }

    public static function percentageOf( $max, $min){
        $percent = $max / 100;
        if($percent == 0) {
            return 0;
        }
        $progressPercent = $min / $percent;
        if($progressPercent > 100) {
            $progressPercent = 100;
        }
        return $progressPercent / 100;
    }

    public static function classes($id) {
        return Classes::where('guid', $id)->select(['name', 'slug'])->firstOrFail();
    }

    public static function imageRating($rating): array
    {
        if ($rating > 1370  && $rating <= 1570) {
            return [
                'tier' => '9',
                'name' => 'Боец',
                'images' => asset('cms/template_resource/FQHOIXM3MSHQ1528483047541.png')
            ];
        }
        elseif ($rating > 1570  && $rating <= 1770) {
            return [
                'tier' => '11',
                'name' => 'Претендент',
                'images' => asset('cms/template_resource/Q4TDZMWJS1DC1528483047584.png')
            ];
        }
        elseif ($rating > 1770  && $rating <= 2070) {
            return [
                'tier' => '12',
                'name' => 'Фаворит',
                'images' => asset('cms/template_resource/RI4P9I2JXXXL1528483047769.png')
            ];
        }
        elseif ($rating > 2070  && $rating <= 2370) {
            return [
                'tier' => '13',
                'name' => 'Дуэлянт',
                'images' => asset('cms/template_resource/9WPOSOBTK7GY1528483047820.png')
            ];
        }
        elseif ($rating > 2370) {
            return [
                'tier' => '14',
                'name' => 'Ветеран',
                'images' => asset('cms/template_resource/O3AI2CT4Q06V1528483048012.png')
            ];
        }
        return [
            'tier' => '8',
            'name' => 'Без ранга',
            'images' => asset('cms/template_resource/RJ6XE5WS8D6G1528483047503.png')
        ];
    }

    public static function Images($patch) {
        return str_replace('\\', '\\\\', $patch);
    }

    public static function ImagesLogo($patch) {
        return str_replace('\\', '/', $patch);
    }

    public static function GetPercent($min, $max)
    {
        $percent = $max / 100;
        if($percent == 0) {
            return 0;
        }
        $progressPercent = $min / $percent;
        if($progressPercent > 100) {
            $progressPercent = 100;
        }
        return $progressPercent;
    }

    public static function imageClass($race, $gender): string
    {
        $name = __('characters.icon_race_'. $race);
        $gend = __('characters.icon_gender_'.$gender);
        return asset('/static/components/GameIcon/'. $name . '_' . $gend . '.jpg');
    }
    public static function iconClass($race, $gender): string
    {
        $name = __('characters.icon_race_'. $race);
        $gend = __('characters.icon_gender_'.$gender);
        return __($name . '_' . $gend);
    }
    public static function imageRace($race) {
        $horde_races    = [2, 5, 6, 8, 9, 10, 16, 17, 20];
        $alliance_races = [1, 3, 4, 7, 11, 12, 14, 15, 18];
        $neutral_races = [24];
        if(in_array($race, $horde_races)) {
            return asset('/static/components/Logo/Logo-hordeEmblem.e6d11863f6c65b2a875091c1ac01cb3f.png');
        }
        elseif(in_array($race, $neutral_races)) {
            return asset('/static/components/Logo/Logo-hordeEmblem.e6d11863f6c65b2a875091c1ac01cb3f.png');
        }
        elseif(in_array($race, $alliance_races)) {
            return asset('/static/components/Logo/Logo-allianceEmblem.cd827b18a7766edbf05f09d66bc10e22.png');
        } else {
            return false;
        }
    }
    public static function factionArena($capitan) {
        $capitan = Characters::whereGuid($capitan)->first();
        return self::faction($capitan->race)['slug'];
    }
    public static function faction($race) {
        $horde_races    = [2, 5, 6, 8, 9, 10, 16, 17, 20];
        $alliance_races = [1, 3, 4, 7, 11, 12, 14, 15, 18];
        $neutral_races = [24];
        if(in_array($race, $horde_races)) {
            return [
                'enum' => 'HORDE',
                'id' => 1,
                'name' => 'Орда',
                'slug' => 'horde',
                'images' => '/static/components/Icon/svg/horde.0a721bba8f062cd956f3e0c723d2b34b.svg#horde'
            ];
        }
        elseif(in_array($race, $neutral_races)) {
            return '';
        }
        elseif(in_array($race, $alliance_races)) {
            return [
                'enum' => 'ALLIANCE',
                'id' => 0,
                'name' => 'Альянс',
                'slug' => 'alliance',
                'images' => '/static/components/Icon/svg/alliance.f42675c36dac66ceab3ac9a774c188bd.svg#alliance'
            ];
        } else {
            return 'Не известно';
        }
    }

}
