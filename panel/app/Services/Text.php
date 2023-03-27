<?php

    namespace App\Services;

    use DateTime;
    use JsonException;

    class Text {

        public static function encode($data): string
        {

            if(version_compare (PHP_VERSION , "7.2" , ">=") )
            $encodedData = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_IGNORE);
            else {
                // another $data parser or no
                $encodedData = json_encode($data, JSON_UNESCAPED_UNICODE);
            }

            if (JSON_ERROR_NONE !== json_last_error() || false === $encodedData) {
                throw new JsonException(sprintf('Could not encode value into JSON format. Error was: "%s".', json_last_error_msg()));
            }

            return $encodedData;
        }

        public static function banTime($date) {
            if (is_null($date)) {
                return "Не известно";
            }
            return self::rusDateLastLogin(DateTime::createFromFormat('Y-m-d H:i:s', $date)->getTimestamp());
        }

        public static function convertDateLastLogin($date) {
            if (is_null($date)) {
                return "Не известно";
            }
            return self::rusDateLastLogin(DateTime::createFromFormat('Y-m-d H:i:s', $date)->getTimestamp());
        }

        /**
         * @throws \Exception
         */
        public static function rusDateLastLogin($str, $gtr = FALSE ) {
            $locale = "ru";
            if($gtr) {
                $months = array('Янв.', 'Фев.', 'Март.', 'Апр.', 'Мая', 'Июня', 'Июля', 'Авг.', 'Сен.', 'Окт.', 'Нояб.', 'Дек.');
            }   else {
                $months = array('Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря');
            }
            $newDatetime = new Datetime('@'.$str);
            $month = $newDatetime->format('n');
            if($locale == 'ru') {
                return  $newDatetime->format('d '.$months[$month-1].'') .' '. $newDatetime->format('Y') . 'г. в '. $newDatetime->format('h:i');
            } else {
                return $album_data = $newDatetime->format('M d') . ", " . $newDatetime->format('Y');
            }
        }

        public static function convertDate($date) {
            return DateTime::createFromFormat('Y-m-d H:i:s', $date->joindate)->getTimestamp();
        }
        public static function totalTimeReferral($time) {
            $time = intval ($time/60);
            $min = $time%60;
            $time = intval ($time/60);
            $hours = $time%24;

            if ($hours != 0)
                $hours = $hours.".";
            else
                $hours = "";
            if ($min != 0)
                $min = $min."";
            else
                $min = "0";

            return $hours.$min;
        }

        public static function totalTime($time) {
            $time = intval ($time/60);
            $min = $time%60;
            $time = intval ($time/60);
            $hours = $time%24;
            $time = intval($time/24);
            $days = $time;

            if ($days != 0)
                $days = $days." д.";
            else
                $days = "";
            if ($hours != 0)
                $hours = $hours." ч.";
            else
                $hours = "";
            if ($min != 0)
                $min = $min." м.";
            else
                $min = "0 Минут";

            return $days. ' ' . $hours. ' ' . $min;
        }

        /**
         * @throws \Exception
         */
        public static function rusDate($str, $gtr = FALSE ) {
            $locale = "ru";
            if($gtr) {
                $months = array('Янв.', 'Фев.', 'Март.', 'Апр.', 'Мая', 'Июня', 'Июля', 'Авг.', 'Сен.', 'Окт.', 'Нояб.', 'Дек.');
            }   else {
                $months = array('Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря');
            }
            $newDatetime = new Datetime($str);
            $month = $newDatetime->format('n');
            if($locale == 'ru') {
                return '<span class="LocalizedDateMount" data-props="{&quot;format&quot;:&quot;LL&quot;,&quot;iso8601&quot;:&quot;'.$str.'&quot;}" queryselectoralways="55">
                                        <time datetime="'.$str.'">' . $newDatetime->format('d '.$months[$month-1].'') .' '. $newDatetime->format('Y') . ' г.</time>
                                    </span> в
                                    <span class="LocalizedDateMount" data-props="{&quot;format&quot;:&quot;LT z&quot;,&quot;iso8601&quot;:&quot;'.$str.'&quot;}" queryselectoralways="55">
                                        <time datetime="'.$str.'">' . $newDatetime->format('h:i') . ' MSK</time>
                                    </span>';
            } else {
                return $album_data = $newDatetime->format('M d') . ", " . $newDatetime->format('Y');
            }
        }

        public static function rusDateLogs($str) {
            $newDatetime = new Datetime('@'.$str);
            return $newDatetime->format('d.m.Y H:m');
        }

        public static function HumanDatePrecise($date) {
            $r = false;
            $a = preg_split("/[:\.\s-]+/", $date);
            $d = time() - strtotime($date);
            if ($d > 0) {
                if ($d < 3600) {
                    switch (floor($d / 60)) {
                        case 0:
                        case 1:
                            return "только что";
                            break;
                        case 2:
                            return "2 мин. назад";
                            break;
                        case 3:
                            return "3 мин. назад";
                            break;
                        case 4:
                            return "4 мин. назад";
                            break;
                        case 5:
                            return "5 мин. назад";
                            break;
                        default:
                            return floor($d / 60) . ' мин. назад';
                            break;
                    }
                } elseif ($d < 18000) {
                    switch (floor($d / 3600)) {
                        case 0:
                        case 1:
                            return "1 ч. назад";
                            break;
                        case 2:
                            return "2 ч. назад";
                            break;
                        case 3:
                            return "3 ч. назад";
                            break;
                        case 4:
                            return "4 ч. назад";
                            break;
                        default:
                            return floor($d / 3600) . ' ч. назад';
                            break;
                    }
                } elseif ($d < 172800) {
                    if (date('d') == $a[2]) {
                        return "сегодня в {$a[3]}:{$a[4]}";
                    }
                    if (date('d', time() - 86400) == $a[2]) {
                        return "вчера в {$a[3]}:{$a[4]}";
                    }
                    if (date('d', time() - 172800) == $a[2]) {
                        return "позавчера в {$a[3]}:{$a[4]}";
                    }
                }
            }

            $r = "{$a[2]}.{$a[1]}";
            if ($a[0] != date('Y') OR $d > 0) {
                $r .= '.' . $a[0];
            }
            $r .= " {$a[3]}:{$a[4]}";
            return $r;
        }

        public static function lastLoginCharacters($timestamp) {
            $date = new DateTime();
            $date->setTimestamp($timestamp);
            return $date->format('d.m.Y  H:m');
        }

        public static function lastLogin($timestamp) {
            $date = new DateTime();
            $date->setTimestamp($timestamp);
            return $date->format('d.m.Y ' . ' в ' . 'H:i');
        }

        public static function getTimeDiff($timestamp) {
            $seconds = time() - $timestamp;
            $howLongAgo = "";
            $days = intval(intval($seconds) / (3600*24));
            if($days> 0)
                $howLongAgo .= str_replace(' ', '', "$days d").' ';
            $hours = (intval($seconds) / 3600) % 24;
            if($hours > 0)
                $howLongAgo .= str_replace(' ', '', "$hours h").' ';
            $minutes = (intval($seconds) / 60) % 60;
            if($minutes > 0)
                $howLongAgo .= str_replace(' ', '', "$minutes m").' ';
            $seconds = intval($seconds) % 60;
            if ($seconds > 0)
                $howLongAgo .= str_replace(' ', '', "$seconds s").' ';

            return $howLongAgo;
        }

        public static function time_difference($endtime){
            $days= (date("j",$endtime)-1);
            $months =(date("n",$endtime)-1);
            $years =(date("Y",$endtime)-1970);
            $hours =date("G",$endtime);
            $mins =date("i",$endtime);
            $secs =date("s",$endtime);
            $diff = $days . $hours . $mins . $secs;
            return $diff;
        }

        public static function MythicTime($endtime): string
        {
            $seconds = floor($endtime / 1000);
            $minutes = floor($seconds / 60);
            $milliseconds = $endtime % 1000;
            $seconds = $seconds % 60;
            $minutes = $minutes % 60;

            $format = '%02u:%02u.%03u';
            $time = sprintf($format, $minutes, $seconds, $milliseconds);
            return substr(rtrim($time, '0'), 0, 5);
        }

    }
