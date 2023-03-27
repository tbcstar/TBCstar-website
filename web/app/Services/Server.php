<?php

    namespace App\Services;

    use Illuminate\Support\Facades\{Cache, DB};
    use App\Services\Text;
    use Illuminate\Support\Str;

    class Server {

        private static $realmsStatusCache = array();

        public static function playersAccount()
        {
            return static::getAccountsPlayers();
        }

        public static function playersOnline()
        {
            return static::getOnlinePlayers();
        }

        public static function status()
        {
            return static::getServerStatus();
        }

        public static function statusSL()
        {
            return static::getServerStatusSL();
        }

        public static function statusWotlk()
        {
            return static::getServerStatusWotlk();
        }
        public static function getServerStatusSL() {
            $server = [];
            foreach (config('servers.realm') as $item) {

                $errNo = 0;
                $errStr = 0;

                if($item['type'] === 'sl') {
                    $server[] = [
                        "name" => $item['name'],
                        "slug" => $item['slug'],
                        "locale" => "ru-RU",
                        "timezone" => self::getOnline($item['id']),
                        "online" => (bool)(@fsockopen($item['ip'], $item['port'], $errNo, $errStr, 1)),
                        "category" => "Русский",
                        "type" => [
                            "id" => "1",
                            "name" => $item['type_server'],
                            "slug" => "обычный",
                            "enum" => "NORMAL",
                            "__typename" => "RealmTypeEnum"
                        ],
                        "population" => [
                            "id" => "2",
                            "name" => "Средняя",
                            "slug" => "средняя",
                            "enum" => "MEDIUM",
                            "__typename" => "RealmPopulationEnum"
                        ],
                        "__typename" => "Realm"
                    ];
                }
            }
            return [
                "data" => [
                    "GameVersions" => [
                        [
                            "name" => "Все миры",
                            "slug" => "world-of-warcraft",
                            "key" => "mainline",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Shadowlands",
                            "slug" => "shadowlands",
                            "key" => "sl",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Wrath of the Lich King",
                            "slug" => "wrath-of-the-lich-king",
                            "key" => "wotlk",
                            "__typename" => "GameVersion"
                        ]
                    ],
                    "Regions" => [
                        ["name" => "Европа","slug" => "europe","key" => "eu","__typename" => "Region"]
                    ],
                    "Realms" => $server
                ]
            ];
        }

        public static function getServerStatusWotlk() {
            $server = [];
            foreach (config('servers.realm') as $item) {

                $errNo = 0;
                $errStr = 0;

                if($item['type'] === 'wotlk') {
                    $server[] = [
                        "name" => $item['name'],
                        "slug" => $item['slug'],
                        "locale" => "ru-RU",
                        "timezone" => self::getOnline($item['id']),
                        "online" => (bool)(@fsockopen($item['ip'], $item['port'], $errNo, $errStr, 1)),
                        "category" => "Русский",
                        "type" => [
                            "id" => "1",
                            "name" => $item['type_server'],
                            "slug" => "обычный",
                            "enum" => "NORMAL",
                            "__typename" => "RealmTypeEnum"
                        ],
                        "population" => [
                            "id" => "2",
                            "name" => "Средняя",
                            "slug" => "средняя",
                            "enum" => "MEDIUM",
                            "__typename" => "RealmPopulationEnum"
                        ],
                        "__typename" => "Realm"
                    ];
                }
            }
            return [
                "data" => [
                    "GameVersions" => [
                        [
                            "name" => "Все миры",
                            "slug" => "world-of-warcraft",
                            "key" => "mainline",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Shadowlands",
                            "slug" => "shadowlands",
                            "key" => "sl",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Wrath of the Lich King",
                            "slug" => "wrath-of-the-lich-king",
                            "key" => "wotlk",
                            "__typename" => "GameVersion"
                        ]
                    ],
                    "Regions" => [
                        ["name" => "Европа","slug" => "europe","key" => "eu","__typename" => "Region"]
                    ],
                    "Realms" => $server
                ]
            ];
        }

        public static function getServerStatus() {
            $server = [];
            foreach (config('servers.realm') as $item) {

                $errNo = 0;
                $errStr = 0;

               $server[] = [
                   "name" => $item['name'],
                   "slug" => $item['slug'],
                   "locale" => "ru-RU",
                   "timezone" => self::getOnlinePlayers($item['id']),
                   "online" => (bool)(@fsockopen($item['ip'], $item['port'], $errNo, $errStr, 1)),
                   "category" => "Русский",
                   "type" => [
                       "id" => "1",
                       "name" => $item['type_server'],
                       "slug" => "обычный",
                       "enum" => "NORMAL",
                       "__typename" => "RealmTypeEnum"
                   ],
                   "population" => [
                       "id" => "2",
                       "name" => "Средняя",
                       "slug" => "средняя",
                       "enum" => "MEDIUM",
                       "__typename" => "RealmPopulationEnum"
                   ],
                   "__typename" => "Realm"
               ];
            }
            return [
                "data" => [
                    "GameVersions" => [
                        [
                            "name" => "Все миры",
                            "slug" => "world-of-warcraft",
                            "key" => "mainline",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Shadowlands",
                            "slug" => "shadowlands",
                            "key" => "sl",
                            "__typename" => "GameVersion"
                        ],
                        [
                            "name" => "Wrath of the Lich King",
                            "slug" => "wrath-of-the-lich-king",
                            "key" => "wotlk",
                            "__typename" => "GameVersion"
                        ]
                    ],
                    "Regions" => [
                        ["name" => "Европа","slug" => "europe","key" => "eu","__typename" => "Region"]
                    ],
                    "Realms" => $server
                ]
            ];
        }

        public static function getServer() {
            return config('servers.realm');
        }

        public static function GetRealmIDByName($realmName)
        {
            return self::FindRealm(urldecode($realmName));
        }

        public static function GetRealmNameBySlug($realmName)
        {
            return self::FindRealmSlug(urldecode($realmName));
        }

        public static function FindRealmSlug($rName) {
            foreach(config('servers.realm') as $realm) {
                if(strtolower($realm['slug']) == strtolower($rName)) {
                    return $realm['name'];
                }
            }
            return 0;
        }

        public static function FindRealm($rName) {
            foreach(config('servers.realm') as $realm) {
                if(strtolower($realm['slug']) == strtolower($rName)) {
                    return $realm['id'];
                }
            }
            return 0;
        }

        public static function IsRealmBySlug($realmName): bool
        {
            foreach(config('servers.realm') as $realm) {
                if($realm['slug'] == $realmName) {
                    return true;
                }
            }
            return false;
        }

        public static function IsRealm($realmName): bool
        {
            foreach(config('servers.realm') as $realm) {
                if($realm['name'] == $realmName) {
                    return true;
                }
            }
            return false;
        }

        public static function IsRealmByType($realmName)
        {
            foreach(config('servers.realm') as $realm) {
                if($realm['slug'] == $realmName) {
                    return $realm['type'];
                }
            }
            return false;
        }

        private static function getOnlinePlayers($id)
        {
            $WotlkOnline = DB::connection('WotlkAuth')->table('realmlist')->where('id', $id)->get();
            return ceil($WotlkOnline[0]->online) ;
        }

        private static function getOnline($id) {
            $Statement = DB::connection('WotlkAuth')->table('realmlist')->where('id', $id)->get();
            return ceil($Statement[0]->online);
        }

        private static function extractFaction($race): string
        {
            $horde = array(2, 5, 6, 8, 10);

            return in_array($race, $horde) ? 'horde' : 'alliance';
        }

        private static function getAccountsPlayers()
        {
            return DB::connection('WotlkAuth')->table('account')->get()->count();
        }
    }
