<?php

namespace App\Services;

use App\Services\Parser\Images;
use Illuminate\Support\Facades\DB;

class Items {

    public static function GetItemName($entry) {
        return DB::connection('WotlkWorld')->selectOne("SELECT locale, Name FROM item_template_locale WHERE locale = ? AND ID = ?",
            ['ruRU', $entry]);
    }

    public static function GetItemIcon($entry) {
        $icon = DB::selectOne("SELECT icon FROM icons WHERE displayid = ?", [$entry]);
        if ($icon) {
            if(!Images::Exists(public_path('uploads/item/'.$icon->icon.'.jpg') ) ) {
                Images::Download(
                    'https://render.worldofwarcraft.com/eu/icons/56/'.$icon->icon.'.jpg',
                    public_path('uploads/item/'.$icon->icon.'.jpg')
                );
            }
            return $icon->icon;
        }
        return 'no_item';
    }

    /**
     * Returns multiplier for SSV mask
     * @category Items class
     * @access   public
     * @param    array $ssv
     * @param    int $mask
     * @return   int
     **/
    public function GetSSDMultiplier($ssv, $mask) {
        if(!is_array($ssv)) {
            return 0;
        }
        if($mask & 0x4001F) {
            if($mask & 0x00000001) {
                return $ssv['ssdMultiplier_0'];
            }
            if($mask & 0x00000002) {
                return $ssv['ssdMultiplier_1'];
            }
            if($mask & 0x00000004) {
                return $ssv['ssdMultiplier_2'];
            }
            if($mask & 0x00000008) {
                return $ssv['ssdMultiplier2'];
            }
            if($mask & 0x00000010) {
                return $ssv['ssdMultiplier_3'];
            }
            if($mask & 0x00040000) {
                return $ssv['ssdMultiplier3'];
            }
        }
        return 0;
    }

    /**
     * Returns armor mod for SSV mask
     * @category Items class
     * @access   public
     * @param    array $ssv
     * @param    int $mask
     * @return   int
     **/
    public function GetArmorMod($ssv, $mask) {
        if(!is_array($ssv)) {
            return 0;
        }
        if($mask & 0x00F001E0) {
            if($mask & 0x00000020) {
                return $ssv['armorMod_0'];
            }
            if($mask & 0x00000040) {
                return $ssv['armorMod_1'];
            }
            if($mask & 0x00000080) {
                return $ssv['armorMod_2'];
            }
            if($mask & 0x00000100) {
                return $ssv['armorMod_3'];
            }
            if($mask & 0x00100000) {
                return $ssv['armorMod2_0']; // cloth
            }
            if($mask & 0x00200000) {
                return $ssv['armorMod2_1']; // leather
            }
            if($mask & 0x00400000) {
                return $ssv['armorMod2_2']; // mail
            }
            if($mask & 0x00800000) {
                return $ssv['armorMod2_3']; // plate
            }
        }
        return 0;
    }

    /**
     * Returns DPS mod for SSV mask
     * @category Items class
     * @access   public
     * @param    array $ssv
     * @param    int $mask
     * @return   int
     **/
    public function GetDPSMod($ssv, $mask) {
        if(!is_array($ssv)) {
            return 0;
        }
        if($mask & 0x7E00) {
            if($mask & 0x00000200) {
                return $ssv['dpsMod_0'];
            }
            if($mask & 0x00000400) {
                return $ssv['dpsMod_1'];
            }
            if($mask & 0x00000800) {
                return $ssv['dpsMod_2'];
            }
            if($mask & 0x00001000) {
                return $ssv['dpsMod_3'];
            }
            if($mask & 0x00002000) {
                return $ssv['dpsMod_4'];
            }
            if($mask & 0x00004000) {
                return $ssv['dpsMod_5'];   // not used?
            }
        }
        return 0;
    }

    /**
     * Returns Spell Bonus for SSV mask
     * @category Items class
     * @access   public
     * @param    array $ssv
     * @param    int $mask
     * @return   int
     **/
    public function GetSpellBonus($ssv, $mask) {
        if(!is_array($ssv)) {
            return 0;
        }
        if($mask & 0x00008000) {
            return $ssv['spellBonus'];
        }
        return 0;
    }

    /**
     * Returns feral bonus for SSV mask
     * @category Items class
     * @access   public
     * @param    array $ssv
     * @param    int $mask
     * @return   int
     **/
    public function GetFeralBonus($ssv, $mask) {
        if(!is_array($ssv)) {
            return 0;
        }
        if($mask & 0x00010000) {
            return 0;   // not used?
        }
        return 0;
    }

    /**
     * Generates random enchantments for $item_entry and $item_guid (if provided)
     * @category Items class
     * @access   public
     * @param    int $item_entry
     * @param    int $owner_guid
     * @param    int $item_guid
     * @return   array
     **/
    public function GetRandomPropertiesData($item_entry, $owner_guid, $item_guid = 0, $rIdOnly = false, $serverType = 1, $item = null, $item_data = null) {
        // I have no idea how it works but it works :D
        // Do not touch anything in this method (at least until somebody will explain me what the fuck am I did here).
        $enchId = 0;
        $use = 'property';
        switch($serverType) {
            case SERVER_MANGOS:
                if($item_guid > 0) {
                    if(is_object($item) && $item->IsCorrect()) {
                        if(is_array($item_data) && $item_data['RandomProperty'] > 0) {
                            $enchId = $item->GetItemRandomPropertyId();
                        }
                        elseif(is_array($item_data) && $item_data['RandomSuffix'] > 0) {
                            $suffix_enchants = $item->GetRandomSuffixData();
                            if(!is_array($suffix_enchants) || !isset($suffix_enchants[0]) || $suffix_enchants[0] == 0) {
                                WoW_Log::WriteError('%s : suffix_enchants not found', __METHOD__);
                                return false;
                            }
                            $enchId = DB::Wow()->selectCell("SELECT `id` FROM `DBPREFIX_randomsuffix` WHERE `ench_1` = %d AND `ench_2` = %d AND `ench_3` = %d LIMIT 1", $suffix_enchants[0], $suffix_enchants[1], $suffix_enchants[2]);
                            $use = 'suffix';
                        }
                    }
                    else {
                        $enchId = self::GetItemDataField(ITEM_FIELD_RANDOM_PROPERTIES_ID, 0, $owner_guid, $item_guid);
                    }
                }
                else {
                    $enchId = self::GetItemDataField(ITEM_FIELD_RANDOM_PROPERTIES_ID, $item_entry, $owner_guid);
                }
                break;
            case SERVER_TRINITY:
                if($item_guid > 0) {
                    if(is_object($item) && $item->IsCorrect()) {
                        $enchId = $item->GetItemRandomPropertyId();
                        if($enchId < 0) {
                            $use = 'suffix';
                            $enchId = abs($enchId);
                        }
                    }
                    else {
                        $enchId = DB::Characters()->selectCell("SELECT `randomPropertyId` FROM `item_instance` WHERE `guid`=%d", $item_guid);
                    }
                }
                else {
                    $item_guid = self::GetItemGUIDByEntry($item_entry, $owner_guid);
                    $enchId = DB::Characters()->selectCell("SELECT `randomPropertyId` FROM `item_instance` WHERE `guid`=%d", $item_guid);
                }
                break;
        }
        if($rIdOnly == true) {
            return $enchId;
        }
        $return_data = array();
        $table = 'randomproperties';
        if($use == 'property') {
            $rand_data = DB::Wow()->selectRow("SELECT `name_%s` AS `name`, `ench_1`, `ench_2`, `ench_3` FROM `DBPREFIX_randomproperties` WHERE `id`=%d", Wow_Locale::GetLocale(), $enchId);
        }
        elseif($use == 'suffix') {
            $table = 'randomsuffix';
        }
        if($table == 'randomproperties') {
            if(!$rand_data) {
                WoW_Log::WriteLog('%s : unable to get rand_data FROM `%s_%s` for id %d (itemGuid: %d, ownerGuid: %d)', __METHOD__, $this->wow->armoryconfig['db_prefix'], $table, $enchId, $item_guid, $owner_guid);
                return false;
            }
            $return_data['suffix'] = $rand_data['name'];
            $return_data['data'] = array();
            for($i = 1; $i < 4; $i++) {
                if($rand_data['ench_' . $i] > 0) {
                    $return_data['data'][$i] = DB::Wow()->selectCell("SELECT `text_%s` FROM `DBPREFIX_enchantment` WHERE `id`=%d", Wow_Locale::GetLocale(), $rand_data['ench_' . $i]);
                }
            }
        }
        elseif($table == 'randomsuffix') {
            $enchant = DB::Wow()->selectRow("SELECT `id`, `name_%s` AS `name`, `ench_1`, `ench_2`, `ench_3`, `pref_1`, `pref_2`, `pref_3` FROM `DBPREFIX_randomsuffix` WHERE `id`=%d", Wow_Locale::GetLocale(), $enchId);
            if(!$enchant) {
                return false;
            }
            $return_data['suffix'] = $enchant['name'];
            $return_data['data'] = array();
            $item_data = DB::World()->selectRow("SELECT `InventoryType`, `ItemLevel`, `Quality` FROM `item_template` WHERE `entry`=%d", $item_entry);
            $points = self::GetRandomPropertiesPoints($item_data['ItemLevel'], $item_data['InventoryType'], $item_data['Quality']);
            $return_data = array(
                'suffix' => $enchant['name'],
                'data' => array()
            );
            $k = 1;
            for($i = 1; $i < 4; $i++) {
                if(isset($enchant['ench_' . $i]) && $enchant['ench_' . $i] > 0) {
                    $cur = DB::Wow()->selectCell("SELECT `text_%s` FROM `DBPREFIX_enchantment` WHERE `id` = %d", Wow_Locale::GetLocale(), $enchant['ench_' . $i]);
                    $return_data['data'][$k] = str_replace('$i', round(floor($points * $enchant['pref_' . $i] / 10000), 0), $cur);
                }
                $k++;
            }
        }
        return $return_data;
    }

    /**
     * Returns random properties points for itemId
     * @author   DiSlord aka Chestr
     * @category Items class
     * @access   public
     * @param    int $itemLevel
     * @param    int $type
     * @param    int $quality
     * @param    int $itemId = 0
     * @return   mixed
     **/
    public function GetRandomPropertiesPoints($itemLevel, $type, $quality, $itemId = 0) {
        if($itemLevel == 0 && $type == 0 && $quality == 0 && $itemId > 0) {
            $data = DB::World()->selectRow("SELECT `ItemLevel`, `type`, `Quality` FROM `item_template` WHERE `entry`=%d", $itemId);
            $itemLevel = $data['ItemLevel'];
            $type = $data['type'];
            $quality = $data['Quality'];
        }
        if($itemLevel < 0 || $itemLevel > 300) {
            return false;
        }
        $field = null;
        switch($quality) {
            case 2:
                $field .= 'uncommon';
                break;
            case 3:
                $field .= 'rare';
                break;
            case 4:
                $field .= 'epic';
                break;
            default:
                return false;
                break;
        }
        switch($type) {
            case  0: // INVTYPE_NON_EQUIP:
            case 18: // INVTYPE_BAG:
            case 19: // INVTYPE_TABARD:
            case 24: // INVTYPE_AMMO:
            case 27: // INVTYPE_QUIVER:
            case 28: // INVTYPE_RELIC:
                return 0;
            case  1: // INVTYPE_HEAD:
            case  4: // INVTYPE_BODY:
            case  5: // INVTYPE_CHEST:
            case  7: // INVTYPE_LEGS:
            case 17: // INVTYPE_2HWEAPON:
            case 20: // INVTYPE_ROBE:
                $field .= '_0';
                break;
            case  3: // INVTYPE_SHOULDERS:
            case  6: // INVTYPE_WAIST:
            case  8: // INVTYPE_FEET:
            case 10: // INVTYPE_HANDS:
            case 12: // INVTYPE_TRINKET:
                $field .= '_1';
                break;
            case  2: // INVTYPE_NECK:
            case  9: // INVTYPE_WRISTS:
            case 11: // INVTYPE_FINGER:
            case 14: // INVTYPE_SHIELD:
            case 16: // INVTYPE_CLOAK:
            case 23: // INVTYPE_HOLDABLE:
                $field .= '_2';
                break;
            case 13: // INVTYPE_WEAPON:
            case 21: // INVTYPE_WEAPONMAINHAND:
            case 22: // INVTYPE_WEAPONOFFHAND:
                $field .= '_3';
                break;
            case 15: // INVTYPE_RANGED:
            case 25: // INVTYPE_THROWN:
            case 26: // INVTYPE_RANGEDRIGHT:
                $field .= '_4';
                break;
            default:
                return 0;
        }
        return DB::Wow()->selectCell("SELECT `%s` FROM `DBPREFIX_randompropertypoints` WHERE `itemlevel`=%d", $field, $itemLevel);
    }

    public function GetSocketInfo($socket) {
        $gem = DB::Wow()->selectRow("SELECT `text_%s` AS `text`, `gem` AS `item` FROM `DBPREFIX_enchantment` WHERE `id`=%d", WoW_Locale::GetLocale(), $socket);
        $gem['icon'] = self::GetItemIcon($gem['item']);
        $gem['color'] = DB::WoW()->selectCell("SELECT `color` FROM `DBPREFIX_gemproperties` WHERE `spellitemenchantement` = %d", $socket);
        $gem['quality'] = DB::World()->selectRow("SELECT `Quality` FROM `item_template` WHERE `entry` = %d", $gem['item']);
        $gem['name'] = self::GetItemName($gem['item']);
        return $gem;
    }

    public function GetTemplateSocketsCount($entry) {
        $data = DB::World()->selectRow("SELECT `SocketColor_1`, `SocketColor_2`, `SocketColor_3` FROM `item_template` WHERE `entry` = %d LIMIT 1", $entry);
        if(!$data) {
            WoW_Log::WriteError('%s : item #%d was not found in `item_template` table!', __METHOD__, $entry);
            return 0;
        }
        $count = 0;
        for($i = 1; $i < 4; ++$i) {
            if($data['SocketColor_' . $i] != 0) {
                ++$count;
            }
        }
        return $count;
    }

    public function IsGemMatchesSocketColor($gem_color, $socket_color) {
        if($socket_color == $gem_color) {
            return true;
        }
        elseif($socket_color == 2 && in_array($gem_color, array(6, 10, 14))) {
            return true;
        }
        elseif($socket_color == 4 && in_array($gem_color, array(6, 12, 14))) {
            return true;
        }
        elseif($socket_color == 8 && in_array($gem_color, array(10, 12, 14))) {
            return true;
        }
        elseif($socket_color == 0) {
            // Extra socket
            return true;
        }
        else {
            return false;
        }
    }

    public function AllowableClasses($mask) {
        $mask &= 0x5DF;
        if($mask == 0x5DF || $mask == 0) {
            return true;
        }
        $classes_data = array();
        $i = 1;
        while($mask) {
            if($mask & 1) {
                $classes_data[$i] = Data_Classes::$classes[$i];
            }
            $mask >>= 1;
            $i++;
        }
        return $classes_data;
    }

    public function AllowableRaces($mask) {
        $mask &= 0x7FF;
        if($mask == 0x7FF || $mask == 0) {
            return true;
        }
        $races_data = array();
        $i = 1;
        while($mask) {
            if($mask & 1) {
                $races_data[$i] = Data_Races::$races[$i];
            }
            $mask >>= 1;
            $i++;
        }
        return $races_data;
    }

    public function IsMultiplyItemSet($itemSetID) {
        if($itemSetID >= 843 && $itemSetID != 881 && $itemSetID != 882) {
            return true;
        }
        $setID = DB::WoW()->selectCell("SELECT `id` FROM `DBPREFIX_itemsetdata` WHERE `original`=%d LIMIT 1", $itemSetID);
        if($setID > 160) {
            return true;
        }
        return false;
    }

    public function GetItemSetBonusInfo($itemsetdata) {
        if(in_array(WoW_Locale::GetLocale(), array('ru', 'en'))) {
            $tmp_locale = WoW_Locale::GetLocale();
        }
        else {
            $tmp_locale = 'en';
        }
        $itemSetBonuses = array();
        for($i = 1; $i < 9; $i++) {
            if($itemsetdata['bonus' . $i] > 0) {
                $threshold = $itemsetdata['threshold' . $i];
                $spell_tmp = array();
                $spell_tmp = DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_spell` WHERE `id`=%d", $itemsetdata['bonus' . $i]);
                if(!isset($spell_tmp['Description_' . $tmp_locale]) || empty($spell_tmp['Description_' . $tmp_locale])) {
                    // try to find en_gb locale
                    if(isset($spell_tmp['Description_en']) && !empty($spell_tmp['Description_en'])) {
                        $tmp_locale = 'en';
                    }
                    else {
                        continue;
                    }
                }
                $itemSetBonuses[$threshold]['desc'] = self::SpellReplace($spell_tmp, WoW_Utils::ValidateSpellText($spell_tmp['Description_' . $tmp_locale]));
                $itemSetBonuses[$threshold]['desc'] = str_replace('&quot;', '"', $itemSetBonuses[$threshold]['desc']);
                $itemSetBonuses[$threshold]['threshold'] = $threshold;
            }
        }
        sort($itemSetBonuses); // Correct display itemset bonuses
        return $itemSetBonuses;
    }

    /**
     * Spell Description handler
     * @author   DiSlord aka Chestr
     * @category Items class
     * @access   public
     * @param    array $spell
     * @param    string $text
     * @return   array
     **/
    public function SpellReplace($spell, $text) {
        $letter = array('${','}');
        $values = array( '[',']');
        $text = str_replace($letter, $values, $text);
        $signs = array('+', '-', '/', '*', '%', '^');
        $data = $text;
        $pos = 0;
        $npos = 0;
        $str = null;
        $cacheSpellData=array(); // Spell data for spell
        $lastCount = 1;
        while(false !== ($npos = strpos($data, '$', $pos))) {
            if($npos != $pos) {
                $str .= substr($data, $pos, $npos-$pos);
            }
            $pos = $npos + 1;
            if('$' == substr($data, $pos, 1)) {
                $str .= '$';
                $pos++;
                continue;
            }
            if(!preg_match('/^((([+\-\/*])(\d+);)?(\d*)(?:([lg].*?:.*?);|(\w\d*)))/', substr($data, $pos), $result)) {
                continue;
            }
            $pos += strlen($result[0]);
            $op = $result[3];
            $oparg = $result[4];
            $lookup = $result[5]? $result[5]:$spell['id'];
            $var = $result[6] ? $result[6]:$result[7];
            if(!$var) {
                continue;
            }
            if($var[0] == 'l') {
                $select = explode(':', substr($var, 1));
                $str .= @$select[$lastCount == 1 ? 0 : 1];
            }
            elseif($var[0] == 'g') {
                $select = explode(':', substr($var, 1));
                $str .= $select[0];
            }
            else {
                $spellData = @$cacheSpellData[$lookup];
                if($spellData == 0) {
                    if($lookup == $spell['id']) {
                        $cacheSpellData[$lookup] = self::GetSpellData($spell);
                    }
                    else {
                        $cacheSpellData[$lookup] = self::GetSpellData(DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_spell` WHERE `id`=%d", $lookup));
                    }
                    $spellData = @$cacheSpellData[$lookup];
                }
                if($spellData && $base = @$spellData[strtolower($var)]) {
                    if($op && is_numeric($oparg) && is_numeric($base)) {
                        $equation = $base.$op.$oparg;
                        @eval("\$base = $equation;");
                    }
                    if(is_numeric($base)) {
                        $lastCount = $base;
                    }
                }
                else {
                    $base = $var;
                }
                $str .= $base;
            }
        }
        $str .= substr($data, $pos);
        $str = @preg_replace_callback("/\[.+[+\-\/*\d]\]/", array(self, 'MyReplace'), $str);
        return $str;
    }

    /**
     * Spell Description handler
     * @author   DiSlord aka Chestr
     * @category Items class
     * @access   public
     * @param    array $spell
     * @return   array
     **/
    public function GetSpellData($spell) {
        // Basepoints
        $s1 = abs($spell['EffectBasePoints_1'] + $spell['EffectBaseDice_1']);
        $s2 = abs($spell['EffectBasePoints_2'] + $spell['EffectBaseDice_2']);
        $s3 = abs($spell['EffectBasePoints_3'] + $spell['EffectBaseDice_3']);
        if($spell['EffectDieSides_1']>$spell['EffectBaseDice_1'] && ($spell['EffectDieSides_1']-$spell['EffectBaseDice_1'] != 1)) {
            $s1 .= ' - ' . abs($spell['EffectBasePoints_1'] + $spell['EffectDieSides_1']);
        }
        if($spell['EffectDieSides_2']>$spell['EffectBaseDice_2'] && ($spell['EffectDieSides_2']-$spell['EffectBaseDice_2'] != 1)) {
            $s2 .= ' - ' . abs($spell['EffectBasePoints_2'] + $spell['EffectDieSides_2']);
        }
        if($spell['EffectDieSides_3']>$spell['EffectBaseDice_3'] && ($spell['EffectDieSides_3']-$spell['EffectBaseDice_3'] != 1)) {
            $s3 .= ' - ' . abs($spell['EffectBasePoints_3'] + $spell['EffectDieSides_3']);
        }
        $d = 0;
        if($spell['DurationIndex']) {
            if($spell_duration = DB::WoW()->selectRow("SELECT * FROM `DBPREFIX_spell_duration` WHERE `id`=%d", $spell['DurationIndex'])) {
                $d = $spell_duration['duration_1']/1000;
            }
        }
        // Tick duration
        $t1 = $spell['EffectAmplitude_1'] ? $spell['EffectAmplitude_1'] / 1000 : 5;
        $t2 = $spell['EffectAmplitude_1'] ? $spell['EffectAmplitude_2'] / 1000 : 5;
        $t3 = $spell['EffectAmplitude_1'] ? $spell['EffectAmplitude_3'] / 1000 : 5;

        // Points per tick
        $o1 = @intval($s1 * $d / $t1);
        $o2 = @intval($s2 * $d / $t2);
        $o3 = @intval($s3 * $d / $t3);
        $spellData['t1'] = $t1;
        $spellData['t2'] = $t2;
        $spellData['t3'] = $t3;
        $spellData['o1'] = $o1;
        $spellData['o2'] = $o2;
        $spellData['o3'] = $o3;
        $spellData['s1'] = $s1;
        $spellData['s2'] = $s2;
        $spellData['s3'] = $s3;
        $spellData['m1'] = $s1;
        $spellData['m2'] = $s2;
        $spellData['m3'] = $s3;
        $spellData['x1'] = $spell['EffectChainTarget_1'];
        $spellData['x2'] = $spell['EffectChainTarget_2'];
        $spellData['x3'] = $spell['EffectChainTarget_3'];
        $spellData['i']  = $spell['MaxAffectedTargets'];
        $spellData['d']  = WoW_Utils::GetTimeText($d);
        $spellData['d1'] = WoW_Utils::GetTimeText($d);
        $spellData['d2'] = WoW_Utils::GetTimeText($d);
        $spellData['d3'] = WoW_Utils::GetTimeText($d);
        $spellData['v']  = $spell['MaxTargetLevel'];
        $spellData['u']  = $spell['StackAmount'];
        $spellData['a1'] = WoW_Utils::GetRadius($spell['EffectRadiusIndex_1']);
        $spellData['a2'] = WoW_Utils::GetRadius($spell['EffectRadiusIndex_2']);
        $spellData['a3'] = WoW_Utils::GetRadius($spell['EffectRadiusIndex_3']);
        $spellData['b1'] = $spell['EffectPointsPerComboPoint_1'];
        $spellData['b2'] = $spell['EffectPointsPerComboPoint_2'];
        $spellData['b3'] = $spell['EffectPointsPerComboPoint_3'];
        $spellData['e']  = $spell['EffectMultipleValue_1'];
        $spellData['e1'] = $spell['EffectMultipleValue_1'];
        $spellData['e2'] = $spell['EffectMultipleValue_2'];
        $spellData['e3'] = $spell['EffectMultipleValue_3'];
        $spellData['f1'] = $spell['DmgMultiplier_1'];
        $spellData['f2'] = $spell['DmgMultiplier_2'];
        $spellData['f3'] = $spell['DmgMultiplier_3'];
        $spellData['q1'] = $spell['EffectMiscValue_1'];
        $spellData['q2'] = $spell['EffectMiscValue_2'];
        $spellData['q3'] = $spell['EffectMiscValue_3'];
        $spellData['h']  = $spell['procChance'];
        $spellData['n']  = $spell['procCharges'];
        $spellData['z']  = "<home>";
        return $spellData;
    }

    /**
     * Replaces square brackets with NULL text
     * @author   DiSlord aka Chestr
     * @category Items class
     * @access   public
     * @param    array $matches
     * @return   int
     **/
    public function MyReplace($matches) {
        $text = str_replace( array('[',']'), array('', ''), $matches[0]);
        //@eval("\$text = abs(".$text.");");
        return intval($text);
    }
    // End of CSWOWD functions

    public function IsUniqueLoot($itemEntry) {
        $item_count = DB::World()->selectCell("SELECT COUNT(`entry`) FROM `creature_loot_template` WHERE `item`=%d", $itemEntry);
        if(!$item_count) {
            return false;
        }
        if($item_count > 1) {
            return false;
        }
        return true;
    }

    /**
     * @param int $entry
     **/
    public function GetItemInfo($entry) {
        return DB::World()->selectRow("SELECT `entry`, `name`, `displayid`, `Quality`, `class`, `subclass`, `InventoryType`, `ItemLevel` FROM `item_template` WHERE `entry`=%d", $entry);
    }

    /**
     * @param array $item_info
     * @param int   $item_entry = 0
     **/
    public function GetBreadCrumbsForItem($item_info, $item_entry = 0) {
        if($item_entry > 0 || !is_array($item_info)) {
            $item_info = DB::World()->selectRow("SELECT `class` AS `classId`, `subclass` AS `subClassId`, `InventoryType` AS `invType` FROM `item_template` WHERE `entry` = %d LIMIT 1", $item_entry);
        }
        if(!$item_info || !is_array($item_info)) {
            return false;
        }
        $itemsubclass = null;
        if(isset($item_info['classId']) && isset($item_info['subClassId'])) {
            $itemsubclass = DB::Wow()->selectRow("SELECT `subclass_name_%s` AS `subclass`, `class_name_%s` AS `class` FROM `DBPREFIX_item_subclass` WHERE `subclass` = %d AND `class` = %d LIMIT 1", WoW_Locale::GetLocale(), WoW_Locale::GetLocale(), $item_info['subClassId'], $item_info['classId']);
        }
        elseif(isset($item_info['classId'])) {
            $itemsubclass = DB::Wow()->selectRow("SELECT `class_name_%s` AS `class` FROM `DBPREFIX_item_subclass` WHERE `class` = %d LIMIT 1", WoW_Locale::GetLocale(), $item_info['classId']);
        }
        elseif(isset($item_info['subClassId'])) {
            $itemsubclass = DB::Wow()->selectRow("SELECT `subclass_name_%s` AS `subclass` FROM `DBPREFIX_item_subclass` WHERE `subclass` = %d LIMIT 1", WoW_Locale::GetLocale(), $item_info['subClassId']);
        }
        if(!$itemsubclass || !is_array($itemsubclass)) {
            return false;
        }
        $breadcrumbs = array();
        $global_url = sprintf('%s/wow/%s/item/', WoW::GetWoWPath(), WoW_Locale::GetLocale());
        $index = 0;
        if(isset($item_info['classId'])) {
            $global_url .= '?classId=' . $item_info['classId'];
            $breadcrumbs[$index] = array(
                'caption' => $itemsubclass['class'],
                'link' => $global_url,
                'last' => true
            );
            ++$index;
        }
        if(isset($item_info['subClassId'])) {
            if(strpos($global_url, '?classId=') > 0) {
                $global_url .= '&amp;subClassId=' . $item_info['subClassId'];
            }
            else {
                $global_url .= '?subClassId=' . $item_info['subClassId'];
            }
            $breadcrumbs[$index] = array(
                'caption' => $itemsubclass['subclass'],
                'link' => $global_url,
                'last' => true
            );
            if($index > 0) {
                $breadcrumbs[$index - 1]['last'] = false;
            }
            ++$index;
        }
        if(isset($item_info['invType'])) {
            if(strpos($global_url, '?') > 0) {
                $global_url .= '&amp;invType=' . $item_info['invType'];
            }
            else {
                $global_url .= '?invType=' . $item_info['invType'];
            }
            $breadcrumbs[$index] = array(
                'caption' => WoW_Locale::GetString('template_item_invtype_' . $item_info['invType']),
                'link' => $global_url,
                'last' => true
            );
            if($index > 0) {
                $breadcrumbs[$index - 1]['last'] = false;
            }
            ++$index;
        }
        return $breadcrumbs;
    }

    public function GetItemsForTable($page, $classId, $subClassId, $invType) {
        if(WoWConfig::$Realms[1]['type'] == SERVER_MANGOS) {
            $sql_query = 'SELECT `entry`, `name`, `displayid`, `ItemLevel`, `class`, `subclass`, `InventoryType`, `Quality`, `RequiredLevel`, `Flags`, `Flags2` FROM `item_template` WHERE';
        }
        else {
            $sql_query = 'SELECT `entry`, `name`, `displayid`, `ItemLevel`, `class`, `subclass`, `InventoryType`, `Quality`, `RequiredLevel`, `Flags`, `FlagsExtra` AS `Flags2` FROM `item_template` WHERE';
        }
        $sql_query_count = 'SELECT COUNT(*) FROM `item_template` WHERE';
        $smthng_added = false;
        if($classId >= 0) {
            if($smthng_added) {
                $sql_query .= ' AND';
                $sql_query_count .= ' AND';
            }
            $sql_query .= ' `class` = ' . $classId;
            $sql_query_count .= ' `class` = ' . $classId;
            $smthng_added = true;
        }
        if($subClassId >= 0) {
            if($smthng_added) {
                $sql_query .= ' AND';
                $sql_query_count .= ' AND';
            }
            $sql_query .= ' `subclass` = ' . $subClassId;
            $sql_query_count .= ' `subclass` = ' . $subClassId;
            $smthng_added = true;
        }
        if($invType >= 0) {
            if($smthng_added) {
                $sql_query .= ' AND';
                $sql_query_count .= ' AND';
            }
            $sql_query .= ' `InventoryType` = ' . $invType;
            $sql_query_count .= ' `InventoryType` = ' . $invType;
            $smthng_added = true;
        }
        if(!$smthng_added) {
            $sql_query .= ' 1';
            $sql_query_count .= ' 1';
        }
        $items = DB::World()->select("%s ORDER BY `Quality` DESC, `ItemLevel` DESC LIMIT %d, 50", $sql_query, (($page - 1) * 50));
        if(!$items) {
            return false;
        }
        $count_items = DB::World()->selectCell('%s', $sql_query_count);
        $item_ids = array();
        $item_displayids = array();
        foreach($items as $item) {
            $item_displayids[] = $item['displayid'];
            $item_ids[] = $item['entry'];
        }
        $icons = DB::WoW()->select("SELECT `displayid`, `icon` FROM `DBPREFIX_icons` WHERE `displayid` IN (%s)", $item_displayids);
        if(!$icons) {
            return false;
        }
        if(WoW_Locale::GetLocaleID() != LOCALE_EN) {
            $names = DB::World()->select("SELECT `entry`, `name_loc%d` AS `name` FROM `locales_item` WHERE `entry` IN (%s)", WoW_Locale::GetLocaleID(), $item_ids);
            if(is_array($names)) {
                $new_names = array();
                foreach($names as $name) {
                    $new_names[$name['entry']] = $name['name'];
                }
                unset($names, $name);
            }
        }
        unset($item_ids);
        $new_icons = array();
        foreach($icons as $icon) {
            $new_icons[$icon['displayid']] = $icon['icon'];
        }
        unset($icons, $icon);
        $size = sizeof($items);
        for($i = 0; $i < $size; ++$i) {
            $items[$i]['icon'] = $new_icons[$items[$i]['displayid']];
            if(isset($new_names) && is_array($new_names)) {
                if(isset($new_names[$items[$i]['entry']])) {
                    $items[$i]['name'] = $new_names[$items[$i]['entry']];
                }
            }
            $items[$i]['type'] = DB::WoW()->selectCell("SELECT `subclass_name_%s` FROM `DBPREFIX_item_subclass` WHERE `class` = %d AND `subclass` = %d", WoW_Locale::GetLocale(), $items[$i]['class'], $items[$i]['subclass']);
            $items[$i]['source'] = '';
            if($items[$i]['Flags2'] & ITEM_FLAGS2_ALLIANCE_ONLY) {
                $items[$i]['faction'] = FACTION_HORDE;
            }
            elseif($items[$i]['Flags2'] & ITEM_FLAGS2_HORDE_ONLY) {
                $items[$i]['faction'] = FACTION_ALLIANCE;
            }
            else {
                $items[$i]['faction'] = -1;
            }
            if($items[$i]['Flags'] & ITEM_FLAGS_HEROIC) {
                $items[$i]['heroic'] = 1;
            }
            else {
                $items[$i]['heroic'] = 0;
            }
        }
        unset($new_icons);
        if(isset($new_names)) {
            unset($new_names);
        }
        return array(
            'count' => $count_items,
            'items' => $items
        );
    }

    private function GetItemSourceFromdDB($item_entry) {
        if($item_entry <= 0) {
            WoW_Log::WriteError('%s : entry must be > than 0 (%d given)!', __METHOD__, $item_entry);
            return false;
        }
        $source_info = DB::WoW()->selectRow("SELECT `source`, `areaKey`, `areaUrl`, `isHeroic` FROM `DBPREFIX_source` WHERE `item` = %d", $item_entry);
        if(!$source_info) {
            WoW_Log::WriteError('%s : item #%d was not found in DBPREFIX_source table!', __METHOD__, $item_entry);
            return false;
        }
        // Parse
        switch($source_info['source']) {
            default:
                return;
            case 'sourceType.dungeon':
                if($source_info['areaKey'] == '') {
                    return false;
                }
                $boss_entry = DB::World()->selectCell("SELECT `entry` FROM `creature_loot_template` WHERE `item` = %d", $item_entry);
                if($boss_entry > 0) {
                    $name = DB::World()->selectCell("SELECT `name` FROM `creature_template` WHERE `entry` = %d", $boss_entry);
                    if(WoW_Locale::GetLocale() != LOCALE_EN) {
                        $name_loc = DB::World()->selectCell("SELECT `name_loc%d` FROM `locales_creature` WHERE `entry` = %d", WoW_Locale::GetLocaleID(), $boss_entry);
                        return $name_loc ? $name_loc : $name;
                    }
                    return $name;
                }
                break;
        }
        return false;
    }

    public function GetItemTabsNames($entry) {
        if($entry <= 0) {
            WoW_Log::WriteError('%s : wrong item entry (%d)!', __METHOD__, $entry);
            return false;
        }
        /*
            Possible tabs:
                Dropped from creature...
                Contained in object...
                Sold by vendor...
                Currency for item...
                Reward from quest...
                Skinned from...
                Pick pocketed from...
                Mined from...
                Created by spell...
                Reagent for spell...
                Disenchants into...
        */
        $item_tabs = array();
        // WARNING: do not query something here! Only checks!

        // creature_loot_template
        if($count = DB::World()->selectCell("SELECT COUNT(*) FROM `creature_loot_template` WHERE `item` = %d", $entry)) {
            $item_tabs[] = array(
                'type'  => 'dropCreatures',
                'count' => $count
            );
        }
        // gameobject_loot_template
        if($count = DB::World()->selectCell("SELECT COUNT(*) FROM `gameobject_loot_template` WHERE `item` = %d", $entry)) {
            $item_tabs[] = array(
                'type'  => 'dropGameObjects',
                'count' => $count
            );
        }
        // npc_vendor
        if($count = DB::World()->selectCell("SELECT COUNT(*) FROM `npc_vendor` WHERE `item` = %d", $entry)) {
            $item_tabs[] = array(
                'type'  => 'vendors',
                'count' => $count
            );
        }
        // wow_extended_cost
        if($count = DB::WoW()->selectCell("SELECT COUNT(*) FROM `DBPREFIX_extended_cost` WHERE `item1` = %d OR `item2` = %d OR `item3` = %d OR `item4` = %d OR `item5` = %d", $entry, $entry, $entry, $entry, $entry)) {
            $item_tabs[] = array(
                'type'  => 'currencyForItems',
                'count' => $count
            );
        }
        // quest_template
        if($count = DB::World()->selectCell("SELECT COUNT(*) FROM `quest_template` WHERE `RewChoiceItemId1` = %d OR `RewChoiceItemId2` = %d OR `RewChoiceItemId3` = %d OR `RewChoiceItemId4` = %d OR `RewChoiceItemId5` = %d OR `RewChoiceItemId6` = %d OR `RewItemId1` = %d OR `RewItemId2` = %d OR `RewItemId3` = %d OR `RewItemId4` = %d", $entry, $entry, $entry, $entry, $entry, $entry, $entry, $entry, $entry, $entry)) {
            $item_tabs[] = array(
                'type'  => 'rewardFromQuests',
                'count' => $count
            );
        }
        // skinning_loot_template
        if($count = DB::World()->selectCell("SELECT COUNT(*) FROM `skinning_loot_template` WHERE `item` = %d", $entry)) {
            $item_tabs[] = array(
                'type'  => 'skinnedFromCreatures',
                'count' => $count
            );
        }
        // pickpocketing_loot_template
        if($count = DB::World()->selectCell("SELECT COUNT(*) FROM `pickpocketing_loot_template` WHERE `item` = %d", $entry)) {
            $item_tabs[] = array(
                'type'  => 'pickPocketCreatures',
                'count' => $count
            );
        }
        // wow_spell (created)
        if($count = DB::WoW()->selectCell("SELECT COUNT(*) FROM `DBPREFIX_spell` WHERE `EffectItemType_1` = %d OR `EffectItemType_2` = %d OR `EffectItemType_3` = %d", $entry, $entry, $entry)) {
            $item_tabs[] = array(
                'type'  => 'createdBySpells',
                'count' => $count
            );
        }
        // wow_spell (reagent)
        if($count = DB::WoW()->selectCell("SELECT COUNT(*) FROM `DBPREFIX_spell` WHERE `Reagent_1` = %d OR `Reagent_2` = %d OR `Reagent_3` = %d OR `Reagent_4` = %d OR `Reagent_5` = %d OR `Reagent_6` = %d OR `Reagent_7` = %d OR `Reagent_8` = %d", $entry, $entry, $entry, $entry, $entry, $entry, $entry, $entry)) {
            $item_tabs[] = array(
                'type'  => 'reagentForSpells',
                'count' => $count
            );
        }
        // disenchant_loot_template
        if($count = DB::World()->selectCell("SELECT COUNT(*) FROM `disenchant_loot_template` WHERE `item` = %d", $entry)) {
            $item_tabs[] = array(
                'type'  => 'disenchantItems',
                'count' => $count
            );
        }
        $item_tabs[] = array(
            'type'  => 'comments',
            'count' => 0
        );
        return $item_tabs;
    }

    public function GetItemTabContents($entry, $tab_type, &$item_tabs) {
        if($entry <= 0) {
            WoW_Log::WriteError('%s : wrong item entry (%d)!', __METHOD__, $entry);
            return false;
        }
        if(!in_array($tab_type, $item_tabs)) {
            WoW_Log::WriteError('%s : empty tab for item #%d (%s), ignore.', __METHOD__, $entry, $tab_type);
            return false;
        }
        $allowed_types = array(
            'dropCreatures',
            'dropGameObjects',
            'vendors',
            'currencyForItems',
            'rewardFromQuests',
            'skinnedFromCreatures',
            'pickPocketCreatures',
            'minedFromCreatures',
            'createdBySpells',
            'reagentForSpells',
            'disenchantItems'
        );
        if(!in_array($tab_type, $allowed_types)) {
            WoW_Log::WriteError('%s : wrong tab type for item #%d: %s, ignore.', __METHOD__, $entry, $tab_type);
            return false;
        }
        $item_tabs = array();
        $item_tabs['table_headers'] = array(); // Table headers
        $item_tabs['table_contents'] = array(); // Table contents

        // Generate headers
        // Generate contents
        switch($tab_type) {
            case 'dropCreatures':
                /*$item_tabs['table_headers'] = array(
                    array(
                        'class' => '-link',
                        'type' => 'name'
                    ),
                    array(
                        'class' => '-link',
                        'type' => 'type',
                    ),
                    array(
                        'class' => 'link numeric',
                        'type' => 'level',
                    ),
                    array(
                        'class' => '-link',
                        'type' => 'zone'
                    ),
                    array(
                        'class' => '-link numeric',
                        'type' => 'droprate'
                    )
                );
                $creature_loot = DB::World()->select("
                SELECT
                `a`.`entry` AS `id`,
                `a`.`name`,
                `a`.`minlevel` AS `minLevel`,
                `a`.`maxlevel` AS `maxLevel`,
                `a`.`rank` AS `classification`,
                `a`.`KillCredit1`,
                `a`.`KillCredit2`,
                `a`.`type`,
                `b`.`ChanceOrQuestChance`,
                `b`.`groupid`,
                `b`.`mincountOrRef`,
                `b`.`item`
                FROM `creature_template` AS `a`
                JOIN `creature_loot_template` AS `b` ON `b`.`entry` = `a`.`entry`
                WHERE `b`.`item` = %d", $entry);
                if(!$creature_loot) {
                    return false;
                }
                foreach($creature_loot as $creature) {
                    if(WoW_Utils::IsBossCreature($creature)) {
                        $drop_percent = WoW_Utils::GenerateLootPercent($creature['id'], 'creature_loot_template', $creature['item']);
                        $drop_rate = WoW_Utils::GetDropRate($drop_percent);
                        $item_tabs['table_contents'][] = array(
                            array(
                                'td' => '',
                                'text' => $creature['name']
                            ),
                            array(
                                'td' => '',
                                'text' => WoW_Locale::GetString('creature_type_' . $creature['type'])
                            ),
                            array(
                                'td' => '',
                                'text' => $creature['maxLevel']
                            ),
                            array(
                                'td' => ' data-raw=""',
                                'text' => '',
                            ),
                            array(
                                'td' => ' data-raw="' . $drop_rate . '"',
                                'text' => WoW_Locale::GetString('template_item_drop_rate_' . $drop_rate)
                            )
                        );
                    }
                }*/
                break;
        }
        return $item_tabs;
    }

    public function GetItemSource($entry) {
        $source_info = DB::WoW()->selectRow("SELECT `source`, `areaKey` FROM `DBPREFIX_item_sources` WHERE `item` = %d", $entry);
        if(!$source_info) {
            return false;
        }
        switch($source_info['source']) {
            case 'sourceType.none':
                return false;
            case 'sourceType.vendor':
            case 'sourceType.questReward':
            case 'sourceType.creatureDrop':
                return self::FindItemSourceInfo($entry, $source_info['source']);
        }
        return false;
    }

    public function FindItemSourceInfo($entry, $type) {
        $source_info = false;
        switch($type) {
            case 'sourceType.questReward':
                $source_info = DB::World()->selectRow("
                SELECT
                `a`.`entry` AS `questId`,
                `a`.`Title`,
                `a`.`ZoneOrSort` AS `questZone`,
                %s
                FROM `quest_template` AS `a`
                %s
                WHERE
                `a`.`RewChoiceItemId1` = %d OR `a`.`RewChoiceItemId2` = %d OR `a`.`RewChoiceItemId3` = %d OR `a`.`RewChoiceItemId4` = %d OR `a`.`RewChoiceItemId5` = %d OR `a`.`RewChoiceItemId6` = %d OR
                `a`.`RewItemId1` = %d OR `a`.`RewItemId2` = %d OR `a`.`RewItemId3` = %d OR `a`.`RewItemId4` = %d
                LIMIT 1",
                    (WoW_Locale::GetLocale() != LOCALE_EN ? '`b`.`Title_loc' . WoW_Locale::GetLocaleId() . '` AS `Title_Loc`' : 'NULL'),
                    (WoW_Locale::GetLocale() != LOCALE_EN ? 'LEFT JOIN `locale_quest` AS `b` ON `b`.`entry` = `a`.`entry`' : null),
                    $entry, $entry, $entry, $entry, $entry, $entry, $entry, $entry, $entry, $entry
                );
                if(!$source_info) {
                    return false;
                }
                if(WoW_Locale::GetLocale() != LOCALE_EN && $source_info['Title_Loc'] != null) {
                    $source_info['Title'] = $source_info['Title_Loc'];
                }
                break;
            case 'sourceType.creatureDrop':
                $source_info = DB::World()->selectRow("
                SELECT
                `a`.`entry` AS `npcId`,
                `b`.`name`,
                %s
                FROM
                LEFT JOIN `creature_template` AS `b` ON `b`.`entry` = `a`.`entry`
                %s
                WHERE
                `b`.`item` = %d
                LIMIT 1",
                    (WoW_Locale::GetLocale() != LOCALE_EN ? '`c`.`name_loc`' . WoW_Locale::GetLocaleId() . '` AS `name_loc`' : 'NULL'),
                    (WoW_Locale::GetLocale() != LOCALE_EN ? 'LEFT JOIN `locale_creature` AS `c` ON `c`.`entry` = `a`.`entry`' : null),
                    $entry
                );
                if($source_info && WoW_Locale::GetLocale() != LOCALE_EN && $source_info['name_loc'] != null) {
                    $source_info['name'] = $source_info['name_loc'];
                }
                break;
            case 'sourceType.vendor':
                break;
        }
        $source_info['type'] = $type;
        return $source_info;
    }

    public static function itemInfo() {
        $item_slots = array(
            '0'      => array('modal' => 'head',  'name' => 'Голова', 'type' => 'HEAD'),
            '1'      => array('modal' => 'neck',  'name' => 'Шея', 'type' => 'NECK'),
            '2'      => array('modal' => 'shoulder',  'name' => 'Плечи', 'type' => 'SHOULDER'),
            '14'     => array('modal' => 'back',  'name' => 'Спина', 'type' => 'BACK'),
            '4'      => array('modal' => 'chest',  'name' => 'Грудь', 'type' => 'CHEST'),
            '3'      => array('modal' => 'shirt',  'name' => 'Рубашка', 'type' => 'SHIRT'),
            '18'     => array('modal' => 'tabard',  'name' => 'Гербовая накидка', 'type' => 'TABARD'),
            '8'      => array('modal' => 'wrist',  'name' => 'Запястья', 'type' => 'WRIST'),
            '9'      => array('modal' => 'hand',  'name' => 'Кисти рук', 'type' => 'HANDS'),
            '5'      => array('modal' => 'waist',  'name' => 'Пояс', 'type' => 'WAIST'),
            '6'      => array('modal' => 'leg',  'name' => 'Ноги', 'type' => 'LEGS'),
            '7'      => array('modal' => 'foot',  'name' => 'Ступни', 'type' => 'FEET'),
            '10'     => array('modal' => 'leftFinger',  'name' => 'Кольцо', 'type' => 'FINGER_1'),
            '11'     => array('modal' => 'rightFinger',  'name' => 'Кольцо', 'type' => 'FINGER_2'),
            '12'     => array('modal' => 'leftTrinket',  'name' => 'Аксессуар', 'type' => 'TRINKET_1'),
            '13'     => array('modal' => 'rightTrinket',  'name' => 'Аксессуар', 'type' => 'TRINKET_2'),
            '15'     => array('modal' => 'weapon',  'name' => 'Правая рука', 'type' => 'MAIN_HAND'),
            '16'     => array('modal' => 'offhand',  'name' => 'Левая рука', 'type' => 'OFF_HAND')
        );
        $collect = [];
        foreach($item_slots as $slot => $data) {
            $item = Characters::GetEquippedItemInfo($slot);
            if($item == false) {
                continue;
            } else {

                $proto = new ItemPrototype();
                $proto->LoadItem($item['item_id']);

                $armor = $proto->armor;
                $ssv = 80;
                if($ssv && $proto->ScalingStatValue > 0) {
                    if($ssvarmor = (new Items)->GetArmorMod($ssv, $proto->ScalingStatValue)) {
                        $armor = $ssvarmor;
                    }
                }

                $collect[$data['modal']] = [
                    "weapon" => (new Items)->ItemWeapon($proto),
                    "armor" => [
                        "value" => $armor
                    ],
                    "binding" => (new Items)->itemBinding(1),
                    "context" => 11,
                    "id" => $item['item_id'],
                    "description" => $proto->description,
                    "inventory_type" => [
                        "name" => $data['name'],
                        "type" => $data['type']
                    ],
                    "is_subclass_hidden" => false,
                    "item" => [
                        "id" => $item['item_id']
                    ],
                    "item_class" => (new Items)->ItemClass($item['quality'], 3),
                    "item_subclass" => (new Items)->ItemSubClass($item['quality']),
                    "level" => [
                        "display_string" => __('characters.item_level', ['level' => $item['item_level']]),
                        "value" => $item['item_level']
                    ],
                    "media" => [
                        "content" => [
                            "assets" => [
                                [
                                    "key" => "icon",
                                    "value" => asset('uploads/item/' . $item['icon'] . '.jpg')
                                ]
                            ],
                            "dataRegion" => [
                                "value" => "eu"
                            ]
                        ],
                        "id" => $item['item_id'],
                    ],
                    "modified_appearance_id" => 105940,
                    "name" => $item['name']->Name,
                    "quality" => (new Items)->itemQuality($item['quality']),
                    "quantity" => 1,
                    "requirements" => 80,
                    "set" => [],
                    "slot" => [
                        "name" => $data['name'],
                        "type" => $data['type']
                    ],
                    "stats" => (new Items)->ItemStats($proto->ItemStat),
                    "unique_equipped" => (new Items)->itemUnique(1)
                ];

            }
        }

        return $collect;

    }

    public function ItemStats($item): array
    {
        $data = [];
        $i = 0;
        foreach ($item as &$value) {
            if($value['type'] > 0) {
                $data[] = [
                    "display" => [
                        "color" => [
                            "a" => 1,
                            "b" => __('characters.'.$value['type']. '_b'),
                            "g" => __('characters.'.$value['type']. '_g'),
                            "r" => __('characters.'.$value['type']. '_r')
                        ],
                        "display_string" => __('characters.template_item_stat_'.$value['type'], ['stat' => $value['value']])
                    ]
                    ,"type" => [
                        "name" => __('characters.'.$value['type']),
                        "type" => __('characters.'.$value['type']. '_key')
                    ],
                    "value" => $value['value']
                ];
            }
            $i++;
        }
        return $data;
    }

    public function ItemWeapon($proto): array
    {
        if($proto->class === 2) {
            ///$ssd = DB::selectOne("SELECT * FROM ssd WHERE entry = ?", [$proto->ScalingStatDistribution]);
            $ssv = DB::selectOne("SELECT * FROM ssv WHERE level = ?", [80]);
            // Weapon. Calculate damage and DPS.
            $minDmg = $proto->Damage[0]['min'];
            $maxDmg = $proto->Damage[0]['max'];
            $dps = 0;
            // SSV Check.
            if($ssv) {
                if($extraDPS = self::GetDPSMod($ssv, $proto->ScalingStatValue)) {
                    $average = $extraDPS * $proto->delay / 1000;
                    $minDmg = 0.7 * $average;
                    $maxDmg = 1.3 * $average;
                    $dps = round(($maxDmg + $minDmg) / (2 * ($proto->delay / 1000)));
                }
            }
            for($i = 0; $i <= 1; $i++) {
                $d_type = $proto->Damage[$i]['type'];
                $d_min  = $proto->Damage[$i]['min'];
                $d_max  = $proto->Damage[$i]['max'];
                if(($d_max > 0) && ($proto->class != 6)) {
                    $delay = $proto->delay / 1000;
                    if($delay > 0) {
                        $dps += round(($d_max + $d_min) / (2 * $delay), 1);
                    }
                    if($i > 1) {
                        $delay = 0;
                    }
                }
            }
            return [
                "attack_speed" => [
                    "display_string" => "Скорость " . $proto->delay / 1000,
                    "value" => $proto->delay / 1000
                ],
                "damage" => [
                    "damage_class" => [
                        "name" => "физический",
                        "type" => "PHYSICAL"
                    ],
                    "display_string" => "Урон: {$minDmg} - {$maxDmg}",
                    "max_value" => $minDmg,
                    "min_value" => $maxDmg
                ],
                "dps" => [
                    "display_string" => "({$dps} ед. урона в секунду)",
                    "value" => $dps
                ]
            ];
        }
        return [];
    }

    public function ItemItems($item) {
        if($item) {
            $itemSet = DB::table('itemset')
                ->where('ID', $item)
                ->select('ItemID_1', 'ItemID_2','ItemID_3','ItemID_4','ItemID_5','ItemID_6','ItemID_7','ItemID_8','ItemID_9','ItemID_10','ItemID_11','ItemID_12','ItemID_13','ItemID_14','ItemID_15','ItemID_16','ItemID_17')
                ->first();
            $data = [];
            $i = 0;
            foreach ($itemSet as &$value) {
                if ($value > 0) {
                    $item_data = DB::connection('mysql')
                        ->table('item_prototypes')
                        ->where('entry', $value)
                        ->select('entry', 'Display_Lang')
                        ->first();
                    $data[] = [
                        "is_equipped" => true,
                        "item" => [
                            "id" => $item_data->entry,
                            "name" => $item_data->Display_Lang
                        ]
                    ];

                }
                $i++;
            }
            return $data;
        }
        return [];
    }

    public function ItemClass($quality, $inventory) {
        $data = DB::table('item_subclass_name')->where('class', $quality)->where('subclass', $inventory)->first();
        if($data) {
            return [
                "id" => $data->class,
                "name" => $data->class_name
            ];
        }
        return [];
    }

    public function ItemSubClass($material) {
        $data = DB::table('item_material_name')->where('material', $material)->first();
        if($data) {
            return [
                "id" => $data->material,
                "name" => $data->name
            ];
        }
        return [];
    }

    public function itemLevel($level) {
        if($level != 0) {
            return [
                "level" => [
                    "display_string" => __('characters.requirements_level', ['level' => $level]),
                    "value" => $level
                ]
            ];
        }
        return [];
    }

    public function itemLimitCategory($bonus = 0) {
        $data = [];
        if ($bonus) {
            $bonus = str_replace(' ', '', $bonus);
            $bonus = str_split($bonus, 4);
            foreach ($bonus as $item ) {
                if ($item === '4213' || $item === '3630' || $item === '3570' || $item === '1707' || $item === '1676') {
                    $data = __('characters.display_string_'.$item);
                }
            }
        }
        return $data;
    }

    public function itemNameDescription($bonus = 0) {
        $data = [];
        if ($bonus) {
            $bonus = str_replace(' ', '', $bonus);
            $bonus = str_split($bonus, 4);
            foreach ($bonus as $item ) {
                if ($item === '3531' || $item === '1550' || $item === '738' || $item === '31' || $item === '737' || $item === '4213' || $item === '3630' || $item === '1704' || $item === '741' || $item === '1687' || $item === '3570' || $item === '3459' || $item === '1707' || $item === '1676' || $item === '731') {
                    continue;
                }
                $data = [
                    "color" => [
                        "a" => __('characters.display_color_a_'.$item),
                        "b" => __('characters.display_color_b_'.$item),
                        "g" => __('characters.display_color_g_'.$item),
                        "r" => __('characters.display_color_r_'.$item)
                    ],
                    "display_string" => __('characters.display_string_'.$item)
                ];
            }
        }
        return $data;
    }

    public function itemUnique($data) {
        if($data != 0) {
            return __(__('characters.unique'));
        }
        return '';
    }

    public function itemQuality($data) {
        return [
            "name" => __('characters.quality_name_'.$data),
            "type" => __('characters.quality_type_'.$data)
        ];
    }

    public function itemBinding($data) {
        if($data != 0) {
            return [
                "name" => __('characters.bonding_' . $data),
                "type" => "ON_ACQUIRE"
            ];
        }
        return [];
    }

    public function itemSet($ItemSet){
        if($ItemSet) {
            $item = DB::table('itemset')
                ->where('ID', $ItemSet)
                ->first();
            return [
                "display_string" => $item->Name_Lang . " (2/".$item->Count.")",
                "effects" => [
                    [
                        "display_string" => "Комплект: Универсальность увеличивает наносимый урон и силу исцеления еще на 40% при нахождении на аренах, полях боя и в режиме войны.",
                        "is_active" => true,
                        "required_count" => 2
                    ]
                ],
                "item_set" => [
                    "id" => $item->ID,
                    "name" => $item->Name_Lang
                ],
                "items" =>  self::ItemItems($ItemSet)
            ];
        }
        return [];
    }
}
